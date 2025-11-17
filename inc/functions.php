<?php
require_once __DIR__ . '/config.php';


function start_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function is_logged_in() {
    start_session();
    return isset($_SESSION['logged']) && $_SESSION['logged'] === true;
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function esc($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function contacts_file() {
    return __DIR__ . '/../data/contacts.json';
}

function read_contacts() {
    $file = contacts_file();
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    $arr = json_decode($json, true);
    return is_array($arr) ? $arr : [];
}

function write_contacts(array $contacts) {
    $file = contacts_file();
    $dir = dirname($file);

    if (!is_dir($dir)) mkdir($dir, 0755, true);

    $tmp = tempnam($dir, 'c_');
    file_put_contents($tmp, json_encode($contacts, JSON_PRETTY_PRINT)); 
    rename($tmp, $file);

    return true;
}


function get_sosmed_details(string $url): array {
    if (empty($url)) {
        return ['icon' => 'bi-link-45deg', 'name' => 'Link'];
    }
    $url_lower = strtolower($url);

    if (strpos($url_lower, 'instagram.com') !== false) {
        return ['icon' => 'bi-instagram', 'name' => 'Instagram'];
    } elseif (strpos($url_lower, 'facebook.com') !== false) {
        return ['icon' => 'bi-facebook', 'name' => 'Facebook'];
    } elseif (strpos($url_lower, 'twitter.com') !== false || strpos($url_lower, 'x.com') !== false) {
        return ['icon' => 'bi-twitter-x', 'name' => 'X (Twitter)'];
    } elseif (strpos($url_lower, 'linkedin.com') !== false) {
        return ['icon' => 'bi-linkedin', 'name' => 'LinkedIn'];
    } elseif (strpos($url_lower, 'github.com') !== false) {
        return ['icon' => 'bi-github', 'name' => 'GitHub'];
    } else {
        return ['icon' => 'bi-globe', 'name' => 'Website'];
    }
}

function validate_contact_data(array $data, &$errors) {
    if (empty($data['name'])) {
        $errors[] = "Nama wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['name'])) {
        $errors[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    if (empty($data['email'])) {
        $errors[] = "Email wajib diisi.";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (!empty($data['phone'])) {
        if (!preg_match("/^[0-9\s\+\-]+$/", $data['phone'])) {
            $errors[] = "Nomor Telepon hanya boleh mengandung angka, spasi, plus, atau strip.";
        } else {
            $phone_digits = preg_replace("/[^0-9]/", "", $data['phone']);
            if (strlen($phone_digits) > 15) {
                $errors[] = "Nomor Telepon maksimal 15 digit.";
            }
        }
    }
    
    foreach ($data['socials'] as $url) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errors[] = "Satu atau lebih link Sosial Media tidak valid: " . esc($url);
        }
    }
}

function set_flash_message(string $key, string $message) {
    start_session();
    $_SESSION['flash'][$key] = $message;
}

function get_flash_message(string $key): ?string {
    start_session();
    if (isset($_SESSION['flash'][$key])) {
        $msg = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $msg;
    }
    return null;
}
?>
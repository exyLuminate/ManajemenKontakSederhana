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
    file_put_contents($tmp, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    rename($tmp, $file);

    return true;
}

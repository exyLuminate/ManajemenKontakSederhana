<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$id = $_POST['id'] ?? '';
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$socials_raw = trim($_POST['socials'] ?? '');

$contacts = read_contacts();
$found = false;

foreach ($contacts as &$c) {
    if ($c['id'] === $id) {
        $c['name'] = $name;
        $c['email'] = $email;
        $c['phone'] = $phone;

        $lines = preg_split('/\r\n|\r|\n/', $socials_raw);
        $c['socials'] = array_filter(array_map('trim', $lines));

        $found = true;
        break;
    }
}

unset($c);

if (!$found) die("Kontak tidak ditemukan.");

write_contacts($contacts);

redirect('index.php');

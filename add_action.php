<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$socials_raw = trim($_POST['socials'] ?? '');

if ($name === '') {
    die('Nama wajib diisi.');
}

$socials = [];
if ($socials_raw !== '') {
    $lines = preg_split('/\r\n|\r|\n/', $socials_raw);
    foreach ($lines as $ln) {
        $ln = trim($ln);
        if ($ln !== '') $socials[] = $ln;
    }
}

$contacts = read_contacts();

$new = [
    'id' => uniqid("c_", true),
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'socials' => $socials
];

$contacts[] = $new;

write_contacts($contacts);

redirect('index.php');

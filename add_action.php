<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$socials_raw = trim($_POST['socials'] ?? '');

$lines = preg_split('/\r\n|\r|\n/', $socials_raw);
$socials = array_filter(array_map('trim', $lines));

$data = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'socials' => $socials
];

$errors = [];
validate_contact_data($data, $errors);

if (!empty($errors)) {
    start_session();
    $_SESSION['old_data'] = $data;
    set_flash_message('danger', implode('<br>', $errors));
    redirect('add.php');
}

$contacts = read_contacts();

$new = [
    'id' => uniqid("c_", true),
    'name' => esc($name), 
    'email' => esc($email),
    'phone' => esc($phone),
    'socials' => array_map('esc', $socials) 
];

$contacts[] = $new;

write_contacts($contacts);

set_flash_message('success', "Kontak '{$new['name']}' berhasil ditambahkan!");

redirect('index.php');
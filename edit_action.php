<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$id = $_POST['id'] ?? '';
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$socials_raw = trim($_POST['socials'] ?? '');

$lines = preg_split('/\r\n|\r|\n/', $socials_raw);
$socials = array_filter(array_map('trim', $lines));

$data = [
    'id' => $id, 
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'socials' => $socials
];

$errors = [];
validate_contact_data($data, $errors);

if (!empty($errors)) {
    // Jika validasi GAGAL, simpan error dan data lama di session
    set_flash_message('danger', implode('<br>', $errors));
    start_session();
    $_SESSION['old_data'] = $data;
    
    // Redirect kembali ke halaman edit dengan ID yang sama
    redirect('edit.php?id=' . esc($id));
}

// Jika Validasi Sukses: Baca, Edit, Tulis
$contacts = read_contacts();
$found = false;

foreach ($contacts as &$c) {
    if ($c['id'] === $id) {
        $c['name'] = esc($name); 
        $c['email'] = esc($email);
        $c['phone'] = esc($phone);
        $c['socials'] = array_map('esc', $socials); 

        $found = true;
        break;
    }
}
unset($c);

if (!$found) {
    set_flash_message('danger', "Kontak tidak ditemukan.");
    redirect('index.php');
}

write_contacts($contacts);

set_flash_message('success', "Kontak '{$name}' berhasil diperbarui.");

redirect('index.php');
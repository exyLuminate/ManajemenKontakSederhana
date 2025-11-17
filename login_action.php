<?php
require_once __DIR__ . '/inc/functions.php';

start_session();

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username !== ADMIN_USER) {
    set_flash_message('danger', 'Username atau password salah.');
    redirect('login.php');
}

if (!password_verify($password, ADMIN_PASS_HASH)) {
    set_flash_message('danger', 'Username atau password salah.');
    redirect('login.php');
}

$_SESSION['logged'] = true;

redirect('index.php');
<?php
require_once __DIR__ . '/inc/functions.php';

start_session();

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username !== ADMIN_USER) {
    die("Username salah.");
}

if (!password_verify($password, ADMIN_PASS_HASH)) {
    die("Password salah.");
}

$_SESSION['logged'] = true;

redirect('index.php');

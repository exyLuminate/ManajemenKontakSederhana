<?php
require_once __DIR__ . '/inc/functions.php';
require_login();

$id = $_POST['id'] ?? '';

$contacts = read_contacts();
$contacts = array_values(array_filter($contacts, fn($c) => $c['id'] !== $id));

write_contacts($contacts);

redirect('index.php');

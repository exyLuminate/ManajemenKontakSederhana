<?php
require_once __DIR__ . '/inc/functions.php';

start_session();
session_unset();
session_destroy();

redirect('login.php');

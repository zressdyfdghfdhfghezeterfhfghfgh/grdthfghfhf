<?php
session_start();

function csrf_token() {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['token'];
}

function check_csrf() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['token']) || !hash_equals($_SESSION['token'], $_POST['token'])) {
            die('Invalid CSRF token');
        }
    }
}
?>

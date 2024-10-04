<?php
session_start();

function is_logged_in()
{
    return isset($_SESSION["user_id"]);
}

function require_login()
{
    if (!is_logged_in()) {
        header("Location: login.php");
        exit();
    }
}

function logout()
{
    session_destroy();
    header("Location: login.php");
    exit();
}

// Logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    logout();
}
?>
<?php
/**
 * Admin Authentication Helper Functions
 */

function requireAdminLogin() {
    session_start();

    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header('Location: /admin/index.php');
        exit;
    }
}

function isAdminLoggedIn() {
    session_start();
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function logoutAdmin() {
    session_start();
    session_unset();
    session_destroy();
    header('Location: /admin/index.php');
    exit;
}

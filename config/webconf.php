<?php session_start();

// If logged in
if (isset($_SESSION['user_id'])) {
    if (!isset($_GET['p'])) {
        $page = 'main';
    } else {
        $page = $_GET['p'];
    }
}
// If not logged in
else {
    if (
        isset($_GET['p']) &&
        in_array($_GET['p'],
        ['login',
        'logout',
        'register',
        'register-alert',
        'landing',
        'accountmanager',
        'create_account'])
    ) {
        $page = $_GET['p'];
    } else {
        $page = 'landing';
    }
}

$servertitle = 'Hajimaaa' . ' | ' . ucwords($page);

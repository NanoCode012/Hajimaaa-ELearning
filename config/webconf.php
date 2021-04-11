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
        in_array($_GET['p'], ['login', 'logout', 'register', 'landing', 'accountmanager', 'grd-ass-nd','grd-ass-d','std-d','std-nd'])
    ) {
        $page = $_GET['p'];
    } else {
        $page = 'landing';
    }
}

$servertitle = 'Hajimaaa' . ' | ' . ucwords($page);

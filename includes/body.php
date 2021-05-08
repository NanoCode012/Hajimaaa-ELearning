<?php
if (file_exists('pages/' . $page . '.php')) {
    // To sync url with page
    if (!isset($_GET['p']) || $_GET['p'] != $page) {

        # Save POST/FILES variable if it is not empty
        if (!empty($_POST)) $_SESSION['POST'] = $_POST;
        if (!empty($_FILES)) $_SESSION['FILES'] = $_FILES;

        header('Location: index.php?p=' . $page);
        exit();
    } else {

        # Retrive POST/FILES variable from SESSION if it is set
        if (isset($_SESSION['POST'])) $_POST = $_SESSION['POST'];
        if (isset($_SESSION['FILES'])) $_FILES = $_SESSION['FILES'];

        include 'pages/' . $page . '.php';
    }
} else {
    include 'pages/404.php';
}
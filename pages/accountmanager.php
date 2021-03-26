<?php
session_destroy();
session_start();
$_SESSION['user_id'] = 1;
header('Location: ?p=main');
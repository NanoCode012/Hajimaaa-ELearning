<?php

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$accSel = $_POST["accSel"];

if($password == $cpassword) {

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users`(`username`, `password`, `firstname`, `lastname`, `user_type`) VALUES (?, ?, ?, ?, ?)";
    $db_w->prepare($sql)->execute([$username, $password_hash, $firstname, $lastname, $accSel]);
    header("Location: ?p=login");
    exit();
}
else {
    header("Location: ?p=register-alert");
    exit();
}


?>

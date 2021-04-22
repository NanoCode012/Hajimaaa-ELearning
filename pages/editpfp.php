<?php

$current_user_id = $_SESSION['user_id'];

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$title = $_POST["title"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$about = $_POST["about"];

$sql = "UPDATE `users` SET
username = ?,
firstname = ?,
lastname = ?,
title = ?,
email = ?,
phone = ?,
address = ?,
city = ?,
state = ?,
zip = ?,
about = ?
WHERE user_id = ?";

$params = array($username, $firstname, $lastname, $title, $email, $phone, $address, $city,
$state, $zip, $about, $current_user_id);

$db_w->prepare($sql)->execute($params);
header("Location: ?p=profile");
exit();

?>

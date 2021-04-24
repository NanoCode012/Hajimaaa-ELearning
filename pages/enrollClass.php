<?php

$code = $_POST["class_secret"];

$sql = 'SELECT class_id FROM class WHERE class_secret=?';
$stmt = $db_r->prepare($sql);
$stmt->execute([$code]);
$class = $stmt->fetch();
$class_id = $class["class_id"];

$current_user = $_SESSION['user_id'];

$sql2 = "INSERT INTO `class_enrolled`(`user_id`, `class_id`) VALUES (?, ?)";
$db_w->prepare($sql2)->execute([$current_user, $class_id]);

header("Location: ?p=courseListStudent");

?>

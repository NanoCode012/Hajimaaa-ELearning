<?php

$user_type = $_SESSION["user_type"];

$class_id = $_GET["class_id"];
$current_user = $_SESSION["user_id"];

$sql = "DELETE FROM `class_enrolled` WHERE `class_id`=? AND `user_id`=? ";
$params = array($class_id, $current_user);
$db_w->prepare($sql)->execute($params);

if ($user_type == 0) {
  header("Location: ?p=courseListStudent");
  exit();
} elseif ($user_type == 1) {
  header("Location: ?p=courseListTeacher");
  exit();
} else {
  header("Location: ?p=courseListStudent");
  exit();
}

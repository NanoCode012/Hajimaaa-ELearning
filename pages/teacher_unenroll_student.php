<?php

$class_id = $_GET["class_id"];
$user_id = $_GET["user_id"];

$sql = "DELETE FROM `class_enrolled` WHERE `class_id`=? AND `user_id`=? ";
$params = array($class_id, $user_id);
$db_w->prepare($sql)->execute($params);

header("location:javascript://history.go(-1)");
exit();

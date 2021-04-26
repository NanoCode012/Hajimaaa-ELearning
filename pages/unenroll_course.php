<?php

$class_id = $_GET["class_id"];
$current_user = $_SESSION["user_id"];

$sql = "DELETE FROM `class_enrolled` WHERE `class_id`=? AND `user_id`=? ";
$params = array($class_id, $current_user);
$db_w->prepare($sql)->execute($params);

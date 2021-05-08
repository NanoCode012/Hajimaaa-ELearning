<?php

$class_id = $_GET["class_id"];

//delete class from classes table
$sql = "DELETE FROM `class` WHERE `class_id`=?";
$db_w->prepare($sql)->execute([$class_id]);

//delete class from classes_enrolled
$sql2 = "DELETE FROM `class_enrolled` WHERE `class_id`=?";
$db_w->prepare($sql2)->execute([$class_id]);

//delete class from $categories
$sql3 = "DELETE FROM `categories` WHERE `class_id`=?";
$db_w->prepare($sql3)->execute([$class_id]);

//header back to courseListTeacher
header("location: ?p=courseListTeacher");
exit();
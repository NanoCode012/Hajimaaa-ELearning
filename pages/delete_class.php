<?php

$class_id = $_GET["class_id"];

//delete class from classes table
$sql = "DELETE FROM `class` WHERE `class_id`=?";
$params = array($class_id);
$db_w->prepare($sql)->execute($params);

//delet class from classes_enrolled
$sql2 = "DELETE FROM `class_enrolled` WHERE `class_id`=?";
$params2 = array($class_id);
$db_w->prepare($sql2)->execute($params2);

//header back to courseListTeacher
header("location: ?p=courseListTeacher");
exit();
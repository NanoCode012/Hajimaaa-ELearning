<?php

$course_title = $_POST["course_title"];
$course_description = $_POST["course_description"];
$category = $_POST["category"];

$target_file = json_encode($_FILES["course_cover"]["tmp"]);

/*
$target_dir = "course_images";
$target_file = $target_dir . '/' . basename($_FILES["course_cover"]["name"]);
$filename = $_FILES["course_cover"]['tmp_name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($filename, $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["cover_img"]["name"])). " has been uploaded.";
    //echo $target_file . "\n";
}
else {
    echo "Sorry, there was an error uploading your file.";
}
*/

?>

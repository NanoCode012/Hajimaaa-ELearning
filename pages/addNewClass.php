<?php

function izrand($length = 10, $numeric = false) {

    $random_string = "";
    while(strlen($random_string)<$length && $length > 0) {
        if($numeric === false) {
            $randnum = mt_rand(0,61);
            $random_string .= ($randnum < 10) ?
                chr($randnum+48) : ($randnum < 36 ?
                    chr($randnum+55) : chr($randnum+61));
        } else {
            $randnum = mt_rand(0,9);
            $random_string .= chr($randnum+48);
        }
    }
    return $random_string;
}

$categories = $_POST["categorySelect"];

$course_title = $_POST["course_title"];
$course_code = $_POST["course_code"];
$course_description = $_POST["course_description"];
$category = 'sth';

$instructor_id = $_SESSION['user_id'];

$sqll = 'SELECT firstname, lastname FROM users WHERE user_id=?';
$stmtt = $db_r->prepare($sqll);
$stmtt->execute([$instructor_id]);
$instructor = $stmtt->fetch();
$instructor_fname = $instructor["firstname"];
$instructor_lname = $instructor["lastname"];
$instructor_fullname = $instructor_fname . " " . $instructor_lname;

$class_secret = izrand();
$unique = false;

while ($unique == false) {
  $sql = 'SELECT COUNT(*) FROM class WHERE class_secret=?';
  $stmt = $db_r->prepare($sql);
  $stmt->execute([$class_secret]);
  $class = $stmt->fetch();
  if ($class) {
      $count_code = $class["COUNT(*)"];
  }
  if($count_code == 0) {
    $unique = true;
  } else if ($unique > 0) {
    $class_secret = izrand();
  }
}

$target_dir = 'assets/files/course_images';
$target_file = $target_dir . '/' . $class_secret . ".png";
$filename = $_FILES["course_cover"]['tmp_name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($filename, $target_file)) {
  include 'includes/utils/gcloud.php';
  $gstorage = new GStorage();
  $gstorage->upload($target_file, "course_images/" . $class_secret . ".png");
}
else {
    echo "Sorry, there was an error uploading your file.";
}

$gstorage_path = "course_images/" . $class_secret . ".png";

$sql = "INSERT INTO `class`(`instructor_id`, `class_name`, `class_code`, `class_description`, `class_instructor`, `class_secret`, `course_img_path`, `categories`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$db_w->prepare($sql)->execute([$instructor_id, $course_title, $course_code, $course_description, $instructor_fullname, $class_secret, $gstorage_path, $category]);

/* append categories */

$sql = "SELECT `class_id` FROM `class` WHERE `class_name`= ? AND `class_secret`= ? ";
$stmt = $db_r->prepare($sql);
$stmt->execute([$course_title, $class_secret]);
$class = $stmt->fetch();
$class_id = $class["class_id"];

foreach ($categories as $category) {
    //echo "$category\n";
    $category = $category."";
    $sql = "INSERT INTO `categories`(`class_id`, `category_name`) VALUES (?, ?)";
    $db_w->prepare($sql)->execute([$class_id, $category]);
}

header("Location: ?p=courseListTeacher");

?>

<?php

$code = $_POST["class_secret"];

$sql = 'SELECT class_id FROM class WHERE class_secret=?';
$stmt = $db_r->prepare($sql);
$stmt->execute([$code]);
$class = $stmt->fetch();

if ($class) {

  $class_id = $class["class_id"];
  $current_user = $_SESSION['user_id'];


  $sql1 = 'SELECT COUNT(*) FROM class_enrolled WHERE user_id=? AND class_id=?';
  $stmt1 = $db_r->prepare($sql1);
  $stmt1->execute([$current_user, $class_id]);
  $enrolled = $stmt1->fetch();
  $num_enrolled = $enrolled["COUNT(*)"];

  if($num_enrolled > 0) {
    header("location: ?p=courseListStudent-enrolled-error-duplicate");
    exit();
  } else {
    $sql2 = "INSERT INTO `class_enrolled`(`user_id`, `class_id`) VALUES (?, ?)";
    $db_w->prepare($sql2)->execute([$current_user, $class_id]);
    header("Location: ?p=courseListStudent");
    exit();
  }
} else {
  header("Location: ?p=courseListStudent-enrolled-error-wrong");
}

?>

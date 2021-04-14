<?php

session_start();
$current_user_id = $_SESSION['user_id'];

$sql = 'SELECT user_type FROM users WHERE user_id=?';
$stmt = $db_r->prepare($sql);
$stmt->execute([$current_user_id]);
$user = $stmt->fetch();

if ($user) {
  $account_type = $user["user_type"];
  if ($account_type == 0) {
    header("Location: ?p=courseListStudent");
  } else if ($account_type == 1) {
    header("Location: ?p=courseListTeacher");
  }
}

?>

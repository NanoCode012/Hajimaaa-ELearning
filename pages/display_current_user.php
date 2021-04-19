<?php

$current_user_id = $_SESSION['user_id'];

$sql = 'SELECT user_id, user_type, username, firstname, lastname, email FROM users WHERE user_id=?';
$stmt = $db_r->prepare($sql);
$stmt->execute([$current_user_id]);
$user = $stmt->fetch();

$user_id = $user["user_id"];
$db_username = $user["username"];

$email = $user["email"];
if ($email == null) {
  print("yeah baby its empty\n");
}

print($db_username);

$sql2 = 'SELECT COUNT(user_id) FROM class_enrolled WHERE user_id=?';
$stmt2 = $db_r->prepare($sql2);
$stmt2->execute([$current_user_id]);
$classes_enrolled = $stmt2->fetch();
$num_class = $classes_enrolled["COUNT(user_id)"];
print($num_class);

?>

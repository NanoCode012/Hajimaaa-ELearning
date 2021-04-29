<?php
if (isset($_POST['submit'])) {
    $pid = $_POST['post_id'];
    $comment = $_POST['comment'];
    $uid = $_SESSION['user_id'];
    $q0 = "INSERT INTO `comments` (`post_id`,`comment`,`user_id`) VALUES (?,?,?)";
    $db_w->prepare($q0)->execute([$pid, $comment, $uid]);
    header("Location: ?p=view-post&post_id=" . $pid . "&class_id=" . $_GET['class_id']);
}
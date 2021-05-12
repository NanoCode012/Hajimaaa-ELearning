<?php
if (isset($_POST['Create'])) {

    //$post_type=$_POST['inlineRadioOptions'];
    $post_type = 0;
    $class_id = $_POST['class_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // echo "Post";
    //Simply insert into posts
    $q0 = "INSERT INTO `posts` (`post_type`, `class_id`, `user_id`, `title`, `description`) VALUES (?, ?, ?, ?, ?)";
    $db_w->prepare($q0)->execute([$post_type, $class_id, $_SESSION['user_id'], $title, $description]);
    header("Location: ?p=now-teacher&class_id=" . $class_id);
}
exit();

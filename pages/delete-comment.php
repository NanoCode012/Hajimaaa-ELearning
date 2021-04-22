<?php
$id = $_GET['comment_id'] ?? "";
if (isset($id)) {
    $q0 = "DELETE FROM `comments` WHERE (`comment_id` = ?)";
    $db_w->prepare($q0)->execute([$id]);
    header("Location: ?p=view-post&post_id=" . $_GET['post_id']);
}
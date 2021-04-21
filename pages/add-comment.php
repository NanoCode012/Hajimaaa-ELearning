<?php
if(isset($_POST['submit'])){
  $post_id=$_GET['post_id']??"";
  $comment=$_POST['comment']??"";
  $user_id=$_GET['user_id']??"";
  $q0="INSERT INTO `comments` (`pid`,`comment`,`uid`) VALUES (?,?,?)";
  $db_w->prepare($q0)->execute([$post_id,$comment,$user_id]);
  header("Location: ?p=view-post");
}
?>

<?php
if(isset($_POST['submit'])){
  $pid=$_SESSION['post_id'];
  $comment=$_POST['comment']??"";
  $uid=$_SESSION['user_id'];
  $q0="INSERT INTO `comments` (`pid`,`comment`,`uid`) VALUES (?,?,?)";
  $db_w->prepare($q0)->execute([$pid,$comment,$uid]);
  header("Location: ?p=view-post");
}
?>

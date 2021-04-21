<?php
    if(isset($_POST['Create'])){
        
        //$post_type=$_POST['inlineRadioOptions'];
        $post_type=0;
        $title=$_POST['title'];
        $description=$_POST['description'];
        
        if($post_type=='0'){
            echo "Post";
            //Simply insert into posts
            $q0="INSERT INTO `posts` (`post_type`, `class_id`, `title`, `description`) VALUES (?, ?, ?, ?)";
            $db_w->prepare($q0)->execute([$post_type, '1', $title, $description]);
            header("Location: ?p=now-teacher");
        }
    }

?>
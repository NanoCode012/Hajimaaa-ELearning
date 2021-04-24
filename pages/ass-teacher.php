<?php

// error_reporting(0);

if (!isset($_SESSION['user_id']))
    {
header('location:?p=login');
}
else{

if(isset($_POST['create']))
{

$title=$_POST['title'];
$description=$_POST['description'];
$sqlp="INSERT INTO  posts(class_id,title,description,post_type) VALUES(1,:title,:description,2)";
$queryp = $db_w->prepare($sqlp);
$queryp->bindParam(':title',$title,PDO::PARAM_STR);
$queryp->bindParam(':description',$description,PDO::PARAM_STR);
$queryp->execute();
$lastInsertId = $db_w->lastInsertId();

$chapter=$_POST['chapter'];
$due_date=$_POST['due_date'];
$a_marks=$_POST['a_marks'];
$sqla="INSERT INTO  assignments(post_id,chapter,due_date,a_marks) VALUES(:lastInsertId,:chapter,:due_date,:a_marks)";
$querya = $db_w->prepare($sqla);
$querya->bindParam(':chapter',$chapter,PDO::PARAM_STR);
$querya->bindParam(':due_date',$due_date,PDO::PARAM_STR);
$querya->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
$querya->bindParam(':a_marks',$a_marks,PDO::PARAM_STR);
$querya->execute();
$lastInsertId = $db_w->lastInsertId();




$countfiles = count($_FILES['files']['name']);
function getSalt() {
     $charset = '0123456789';
     $randStringLen = 4;

     $randString = "";
     for ($i = 0; $i < $randStringLen; $i++) {
         $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
     }

     return $randString;
}

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['files']['name'][$i];
   $extension = substr($filename,strlen($filename)-4,strlen($filename));
   $salt = getSalt();
   $filename=md5($filename+$salt).$extension;
   move_uploaded_file($_FILES["files"]["tmp_name"][$i],"uploads/".$filename);
   // $new_path="assets/files/assignments".$filename;
   // $tmp_dir=$_FILES["files"]["tmp_name"][$i];
   // upload($tmp_dir, $new_path);

   $sql1="INSERT INTO  files(file_name,assignments_id) VALUES(:filename,:lastInsertId)";
   $query1 = $db_w->prepare($sql1);
   $query1->bindParam(':filename',$filename,PDO::PARAM_STR);
   $query1->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
   $query1->execute();


 }



$lastInsertId = $db_w->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Assignment created successfully";
header('location:?p=ass-teacher');
}
else
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:?p=ass-teacher');
}

}
?>


<body class="red-skin gray">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <?php include 'includes/nav.php'; ?>
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <!-- ============================ Dashboard: My Order Start ================================== -->
        <section class="gray pt-0">

            <div class="container">



                <!-- Row -->
                <div class="row">




                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!--style="margin: auto; width: 50%;"-->

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                <div class="dashboard_container">

                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                          <?php

                                          $sql1 = "SELECT class_name,class_instructor from class where class_id=1;";
                                          $query1 = $db_r -> prepare($sql1);
                                          $query1->execute();
                                          $results1=$query1->fetchAll(PDO::FETCH_OBJ);

                                          if($results1)
                                          {
                                          foreach($results1 as $result1)
                                          {               ?>
                                            <h1><?php echo htmlentities($result1->class_name);?></h1>
                                            <h4 class="edu_title">Dr. <?php echo htmlentities($result1->class_instructor);?></h4>
                                            <?php

                                            $sql2 = "SELECT email from users where user_id=2;";
                                            $query2 = $db_r -> prepare($sql2);
                                            $query2->execute();
                                            $results2=$query2->fetchAll(PDO::FETCH_OBJ);

                                            if($results2)
                                            {
                                            foreach($results2 as $result2)
                                            {               ?>
                                            <span class="dashboard_instructor"><?php echo htmlentities($result2->email);?></span>
                                          <?php }}}} ?>
                                        </div>


                                    </div>
                                </div>



                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <!-- tabs-->

                                        <div class="tabs">
                                            <div class="tab-header">
                                                <div>
                                                    <a href="?p=now-teacher">Now</a>
                                                </div>
                                                <div class="active">
                                                    <a href="?p=ass-teacher">Assignments</a>
                                                </div>
                                                <div>
                                                    <a href="?p=lectureteacher">Lecture Notes</a>
                                                </div>

                                            </div>
                                            <div class="tab-indicator" style="left: calc(33.3333%);"></div>

                                            <div class="tab-body">
                                                <div class="active">


                                                </div>
                                                <div class="active">


                                                </div>
                                                <div class="active">


                                                </div>
                                            </div>
                                        </div>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <!-- /tabs-->
                        <!-- /Row -->


                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <!-- Course Style 1 For Student -->
                                <!-- due this week -->

                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4>Due this week</h4>
                                        </div>
                                        <div class="dashboard_fl_2">
                                            <ul class="mb0">
                                                <li class="list-inline-item">

                                                </li>
                                                <li class="list-inline-item">

                                                    <button type="button" class="btn btn-sm pop-login" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Create an assignment</button>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">

                                        <!-- Single Course -->


<?php


$sql = "SELECT a.assignment_id,a.chapter,p.title,p.description from assignments a,posts p where a.post_id=p.post_id and YEARWEEK(a.due_date) = YEARWEEK(NOW()) and class_id=1";
$query = $db_r -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>


                                        <div onclick="location.href='#';" style="cursor: pointer;"
                                            class="dashboard_single_course ass_hover_effect">


                                            <div class="dashboard_single_course_caption">
                                                <div class="dashboard_single_course_head">
                                                    <div class="dashboard_single_course_head_flex">
                                                        <span class="dashboard_instructor"><?php echo htmlentities($result->chapter);?></span>
                                                        <h4 class="dashboard_course_title"><?php echo htmlentities($result->title);?></h4>

                                                    </div>
                                                    <div class="dc_head_right">
                                                        <h4 class="dc_price_rate theme-cl"></h4>
                                                    </div>
                                                </div>
                                                <div class="dashboard_single_course_des">
                                                    <p><?php echo htmlentities($result->description);?></p>
                                                </div>
                                                <div class="dashboard_single_course_progress">
                                                    <div class="dashboard_single_course_progress_1">

                                                      <?php
                                                      $assid = htmlentities($result->assignment_id);
                                                      $sql0 = "SELECT count(DISTINCT student_id) as no_of_students_submitted from student_files where assignment_id = ". $assid;
                                                      $query0 = $db_r -> prepare($sql0);
                                                      $query0->execute();
                                                      $results0=$query0->fetchAll(PDO::FETCH_OBJ);

                                                      if($query0->rowCount() > 0)
                                                      {
                                                      foreach($results0 as $result0)
                                                      {               ?>
                                                        <label><?php echo htmlentities($result0->no_of_students_submitted);?> Students Submitted</label>
                                                        <?php }} ?>

                                                    </div>
                                                    <div class="dashboard_single_course_progress_2">
                                                        <ul class="m-0">
                                                          <?php

                                                          $sql1 = "SELECT count(user_id) as no_of_students from class_enrolled where class_id=1";
                                                          $query1 = $db_r -> prepare($sql1);
                                                          $query1->execute();
                                                          $results1=$query1->fetchAll(PDO::FETCH_OBJ);

                                                          if($query1->rowCount() > 0)
                                                          {
                                                          foreach($results1 as $result1)
                                                          {               ?>
                                                            <li class="list-inline-item"><i class="ti-user mr-1"></i><?php echo htmlentities($result1->no_of_students);?> Assigned</li>

                                                            <?php }} ?>
                                                                <?php

                                                                $sql2 = "SELECT count(file_id) as no_of_files from files where CHAR_LENGTH(file_name)!=32 and assignments_id = ". $assid;
                                                                $query2 = $db_r -> prepare($sql2);
                                                                $query2->execute();
                                                                $results2=$query2->fetchAll(PDO::FETCH_OBJ);

                                                                if($query2->rowCount() > 0)
                                                                {
                                                                foreach($results2 as $result2)
                                                                {               ?>

                                                            <li class="list-inline-item"><i class="far fa-file mr-1"></i><?php echo htmlentities($result2->no_of_files);?> Files</li>

                                                            <?php }} ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

<?php }} ?>







                                    </div>
                                </div>

                                <!-- due next week -->
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4>Due next week</h4>
                                        </div>
                                        <div class="dashboard_fl_2">
                                            <ul class="mb0">
                                                <li class="list-inline-item">

                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">

                                        <!-- Single Course -->

                                        <?php

                                        $sql = "SELECT a.assignment_id,a.chapter,p.title,p.description from assignments a,posts p where a.post_id=p.post_id and YEARWEEK(a.due_date) = YEARWEEK(NOW()+INTERVAL 7 DAY) and class_id=1";
                                        $query = $db_r -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);

                                        if($query->rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {               ?>

                                          <div onclick="location.href='#';" style="cursor: pointer;"
                                              class="dashboard_single_course ass_hover_effect">


                                              <div class="dashboard_single_course_caption">
                                                  <div class="dashboard_single_course_head">
                                                      <div class="dashboard_single_course_head_flex">
                                                          <span class="dashboard_instructor"><?php echo htmlentities($result->chapter);?></span>
                                                          <h4 class="dashboard_course_title"><?php echo htmlentities($result->title);?></h4>

                                                      </div>
                                                      <div class="dc_head_right">
                                                          <h4 class="dc_price_rate theme-cl"></h4>
                                                      </div>
                                                  </div>
                                                  <div class="dashboard_single_course_des">
                                                      <p><?php echo htmlentities($result->description);?></p>
                                                  </div>
                                                  <div class="dashboard_single_course_progress">
                                                      <div class="dashboard_single_course_progress_1">

                                                        <?php
                                                        $assid = htmlentities($result->assignment_id);
                                                        $sql0 = "SELECT count(DISTINCT student_id) as no_of_students_submitted from student_files where assignment_id = ". $assid;
                                                        $query0 = $db_r -> prepare($sql0);
                                                        $query0->execute();
                                                        $results0=$query0->fetchAll(PDO::FETCH_OBJ);

                                                        if($query0->rowCount() > 0)
                                                        {
                                                        foreach($results0 as $result0)
                                                        {               ?>
                                                          <label><?php echo htmlentities($result0->no_of_students_submitted);?> Students Submitted</label>
                                                          <?php }} ?>

                                                      </div>
                                                      <div class="dashboard_single_course_progress_2">
                                                          <ul class="m-0">
                                                            <?php

                                                            $sql1 = "SELECT count(user_id) as no_of_students from class_enrolled where class_id=1";
                                                            $query1 = $db_r -> prepare($sql1);
                                                            $query1->execute();
                                                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);

                                                            if($query1->rowCount() > 0)
                                                            {
                                                            foreach($results1 as $result1)
                                                            {               ?>
                                                              <li class="list-inline-item"><i class="ti-user mr-1"></i><?php echo htmlentities($result1->no_of_students);?> Assigned</li>

                                                              <?php }} ?>
                                                                  <?php

                                                                  $sql2 = "SELECT count(file_id) as no_of_files from files where CHAR_LENGTH(file_name)!=32 and assignments_id = ". $assid;
                                                                  $query2 = $db_r -> prepare($sql2);
                                                                  $query2->execute();
                                                                  $results2=$query2->fetchAll(PDO::FETCH_OBJ);

                                                                  if($query2->rowCount() > 0)
                                                                  {
                                                                  foreach($results2 as $result2)
                                                                  {               ?>

                                                              <li class="list-inline-item"><i class="far fa-file mr-1"></i><?php echo htmlentities($result2->no_of_files);?> Files</li>

                                                              <?php }} ?>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
<?php }} ?>




                                    </div>
                                </div>

                                <!-- due in more than two weeks -->
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4>Due in more than two weeks</h4>
                                        </div>
                                        <div class="dashboard_fl_2">
                                            <ul class="mb0">
                                                <li class="list-inline-item">

                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">

                                        <!-- Single Course -->


                                        <?php

                                        $sql = "SELECT a.assignment_id,a.chapter,p.title,p.description from assignments a,posts p where a.post_id=p.post_id and YEARWEEK(a.due_date) = YEARWEEK(NOW()+INTERVAL 14 DAY) and class_id=1";
                                        $query = $db_r -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);

                                        if($query->rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {               ?>


                                          <div onclick="location.href='#';" style="cursor: pointer;"
                                              class="dashboard_single_course ass_hover_effect">


                                              <div class="dashboard_single_course_caption">
                                                  <div class="dashboard_single_course_head">
                                                      <div class="dashboard_single_course_head_flex">
                                                          <span class="dashboard_instructor"><?php echo htmlentities($result->chapter);?></span>
                                                          <h4 class="dashboard_course_title"><?php echo htmlentities($result->title);?></h4>

                                                      </div>
                                                      <div class="dc_head_right">
                                                          <h4 class="dc_price_rate theme-cl"></h4>
                                                      </div>
                                                  </div>
                                                  <div class="dashboard_single_course_des">
                                                      <p><?php echo htmlentities($result->description);?></p>
                                                  </div>
                                                  <div class="dashboard_single_course_progress">
                                                      <div class="dashboard_single_course_progress_1">

                                                        <?php
                                                        $assid = htmlentities($result->assignment_id);
                                                        $sql0 = "SELECT count(DISTINCT student_id) as no_of_students_submitted from student_files where assignment_id = ". $assid;
                                                        $query0 = $db_r -> prepare($sql0);
                                                        $query0->execute();
                                                        $results0=$query0->fetchAll(PDO::FETCH_OBJ);

                                                        if($query0->rowCount() > 0)
                                                        {
                                                        foreach($results0 as $result0)
                                                        {               ?>
                                                          <label><?php echo htmlentities($result0->no_of_students_submitted);?> Students Submitted</label>
                                                          <?php }} ?>

                                                      </div>
                                                      <div class="dashboard_single_course_progress_2">
                                                          <ul class="m-0">
                                                            <?php

                                                            $sql1 = "SELECT count(user_id) as no_of_students from class_enrolled where class_id=1";
                                                            $query1 = $db_r -> prepare($sql1);
                                                            $query1->execute();
                                                            $results1=$query1->fetchAll(PDO::FETCH_OBJ);

                                                            if($query1->rowCount() > 0)
                                                            {
                                                            foreach($results1 as $result1)
                                                            {               ?>
                                                              <li class="list-inline-item"><i class="ti-user mr-1"></i><?php echo htmlentities($result1->no_of_students);?> Assigned</li>

                                                              <?php }} ?>
                                                                  <?php

                                                                  $sql2 = "SELECT count(file_id) as no_of_files from files where CHAR_LENGTH(file_name)!=32 and assignments_id = ". $assid;
                                                                  $query2 = $db_r -> prepare($sql2);
                                                                  $query2->execute();
                                                                  $results2=$query2->fetchAll(PDO::FETCH_OBJ);

                                                                  if($query2->rowCount() > 0)
                                                                  {
                                                                  foreach($results2 as $result2)
                                                                  {               ?>

                                                              <li class="list-inline-item"><i class="far fa-file mr-1"></i><?php echo htmlentities($result2->no_of_files);?> Files</li>

                                                              <?php }} ?>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

<?php }} ?>


                                    </div>
                                </div>
                                <!-- /due in more than two weeks -->


                            </div>
                        </div>
                        <!-- /Row -->

                    </div>

                </div>
                <!-- Row -->

            </div>
        </section>

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- popup window -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content popupform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create an assignment</h5>

                </div>
                <div class="modal-body">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Chapter:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name" name="chapter">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Post title:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name" name="title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Post description:</label>
                            <textarea class="form-control popuptarea" id="message-text" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Score out of:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name" name="a_marks">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Upload files:</label>
                            <div class="choose_file">

                                <label for="choose_file">
                                    <input type="file" id="choose_file" name="files[]" multiple>
                                    <span>Choose Files</span>
                                </label>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="exampleFormControlFile1">Submission type:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">File</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Text</label>
                            </div>
                        </div> -->

                        <div class="form-group">

                        <label for="start">Due date:</label>
                        <input type="datetime-local" id="start" name="due_date" value="2018-07-22" min="2018-01-01" max="2022-12-31">

                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-theme-2 popupbtn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-theme popupbtn" name="create">Create an assignment</button>
                </div>
</form>
            </div>
        </div>
    </div>

    <!--JS for tabs-->
    <script>
    let tabHeader = document.getElementsByClassName("tab-header")[0];
    let tabIndicator = document.getElementsByClassName("tab-indicator")[0];
    let tabBody = document.getElementsByClassName("tab-body")[0];

    let tabsPane = tabHeader.getElementsByTagName("div");

    for (let i = 0; i < tabsPane.length; i++) {
        tabsPane[i].addEventListener("click", function() {
            tabHeader.getElementsByClassName("active")[0].classList.remove("active");
            tabsPane[i].classList.add("active");
            tabBody.getElementsByClassName("active")[0].classList.remove("active");
            tabBody.getElementsByTagName("div")[i].classList.add("active");

            tabIndicator.style.left = `calc(calc(100% / 3) * ${i})`;
        });
    }
    </script>
    <!--JS for tabs-->
<?php } ?>

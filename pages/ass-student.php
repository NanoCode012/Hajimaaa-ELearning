<?php

$user_id = $_SESSION["user_id"];
$class_id = $_GET['class_id'];

include_once 'includes/utils/gcloud.php';
$gstorage = new GStorage();

if (isset($_POST['create'])) {

    $countfiles = count($_FILES['files']['name']);
    function getSalt()
    {
        $charset = '0123456789';
        $randStringLen = 4;

        $randString = "";
        for ($i = 0; $i < $randStringLen; $i++) {
            $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
        }

        return $randString;
    }

    for ($i = 0; $i < $countfiles; $i++) {
        $filename = $_FILES['files']['name'][$i];
        // $extension = substr($filename, strlen($filename) - 4, strlen($filename));
        // $salt = getSalt();
        // $filename = $filename . $extension;

        if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], "assets/files/student_files/" . $filename)) {
            $gstorage->upload("assets/files/student_files/" . $filename, "student_files/" . $filename);
        }
        // $new_path="assets/files/student_files".$filename;
        // $tmp_dir=$_FILES["files"]["tmp_name"][$i];
        // upload($tmp_dir, $new_path);
        $text_answer = $_POST['text_answer'];
        $assignment_id = $_POST['assignment_id'];
        $filepath = 'student_files/' . $filename;

        $sqlp = "INSERT INTO student_files(student_id,assignment_id,text_answer,file_name,file_path) VALUES(:user_id,:assignment_id,:text_answer,:filename,:filepath)";
        $queryp = $db_w->prepare($sqlp);
        $queryp->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $queryp->bindParam(':assignment_id', $assignment_id, PDO::PARAM_STR);
        $queryp->bindParam(':text_answer', $text_answer, PDO::PARAM_STR);
        $queryp->bindParam(':filename', $filename, PDO::PARAM_STR);
        $queryp->bindParam(':filepath', $filepath, PDO::PARAM_STR);
        $queryp->execute();
        $lastInsertId = $db_w->lastInsertId();
    }

    // Looping all files

    $lastInsertId = $db_w->lastInsertId();
    if ($lastInsertId) {
        $_SESSION['msg'] = "Assignment created successfully";
        header('location:?p=ass-student&class_id=' . $class_id);
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again";
        header('location:?p=ass-student&class_id=' . $class_id);
    }
}
?>

<body class="red-skin gray">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div id="preloader">
        <div class="preloader"><span></span><span></span>
        </div>
    </div> -->

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
                                <?php include 'includes/classhead.php'; ?>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <!-- tabs-->
                                        <div class="tabs">
                                            <div class="tab-header">
                                                <div>
                                                    <a href="?p=now-student&class_id=<?= $_GET['class_id'] ?>">Now</a>
                                                </div>
                                                <div class="active">
                                                    <a
                                                        href="?p=ass-student&class_id=<?= $_GET['class_id'] ?>">Assignments</a>
                                                </div>
                                                <div>
                                                    <a href="?p=lecturestudent&class_id=<?= $_GET['class_id'] ?>">Lecture
                                                        Notes</a>
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
                        <div class="custom-tab customize-tab tabs_creative">
                            <ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">To-Do</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Completed</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
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
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="dashboard_container_body">
                                                <!-- Single Course -->
                                                <?php
                                                $sql = "SELECT DISTINCT a.assignment_id,a.chapter,p.title,p.description from assignments a,posts p where a.post_id=p.post_id and YEARWEEK(a.due_date) = YEARWEEK(NOW()) and class_id=:class_id and a.assignment_id not in (SELECT DISTINCT assignment_id from student_files) ";
                                                $query = $db_r->prepare($sql);
                                                $query->bindParam(':class_id', $class_id, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $y = array();
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                        $assid = htmlentities($result->assignment_id);
                                                ?>
                                                <script>
                                                $data = json_encode($data);
                                                </script>
                                                <div onclick="location.href='#';" style="cursor: pointer; "
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    class="dashboard_single_course ass_hover_effect join-button pop-login"
                                                    data-type="edit"
                                                    data-service="<?= htmlentities($result->assignment_id) ?>">
                                                    <div class="dashboard_single_course_caption">
                                                        <div class="dashboard_single_course_head">
                                                            <div class="dashboard_single_course_head_flex">
                                                                <span
                                                                    class="dashboard_instructor"><?php echo htmlentities($result->chapter); ?></span>
                                                                <h4 class="dashboard_course_title">
                                                                    <?php echo htmlentities($result->title); ?></h4>
                                                            </div>
                                                            <div class="dc_head_right">
                                                                <h4 class="dc_price_rate theme-cl"></h4>
                                                            </div>
                                                        </div>
                                                        <div class="dashboard_single_course_des">
                                                            <p><?php echo htmlentities($result->description); ?></p>
                                                        </div>
                                                        <div class="dashboard_single_course_progress">
                                                            <div class="dashboard_single_course_progress_1">
                                                                <?php
                                                                        $assid = htmlentities($result->assignment_id);

                                                                        $sql0 = "SELECT due_date from assignments where assignment_id = " . $assid;
                                                                        $query0 = $db_r->prepare($sql0);
                                                                        $query0->execute();
                                                                        $results0 = $query0->fetchAll(PDO::FETCH_OBJ);

                                                                        if ($query0->rowCount() > 0) {
                                                                            foreach ($results0 as $result0) {               ?>
                                                                <label>Due
                                                                    <?php echo htmlentities($result0->due_date); ?></label>
                                                                <?php }
                                                                        } ?>
                                                            </div>
                                                            <!-- <div class="dashboard_single_course_progress_2">
                                                                <ul class="m-0">
                                                                        <?php
                                                                        // $sql2 = "SELECT count(file_id) as no_of_files from files where CHAR_LENGTH(file_name)!=32 and assignments_id = ". $assid;
                                                                        // $query2 = $db_r -> prepare($sql2);
                                                                        // $query2->execute();
                                                                        // $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                                                        //
                                                                        // if($query2->rowCount() > 0)
                                                                        // {
                                                                        // foreach($results2 as $result2)
                                                                        // {
                                                                        ?>
                                                                    <li class="list-inline-item"><i class="far fa-file mr-1"></i><?php //echo htmlentities($result2->no_of_files);
                                                                                                                                    ?> Files</li>
                                                                    <?php //}}
                                                                    ?>
                                                                </ul>
                                                            </div> -->
                                                            <div class="dashboard_single_course_progress_2">
                                                                <ul class="m-0">

                                                                    <?php
                                                                            $sqlf = "SELECT file_name,file_path from files where assignments_id=" . $assid;
                                                                            $queryf = $db_r->prepare($sqlf);
                                                                            $queryf->execute();
                                                                            $resultsf = $queryf->fetchAll(PDO::FETCH_OBJ);
                                                                            if ($queryf->rowCount() > 0) {
                                                                                $x = 0;
                                                                                foreach ($resultsf as $resultf) {
                                                                                    $x++;

                                                                                    if (!file_exists('assets/files/assignments/' . $resultf->file_name)) {
                                                                                        $gstorage->download($resultf->file_path, 'assets/files/assignments/' . $resultf->file_name);
                                                                                    }
                                                                            ?>
                                                                    <a class="list-inline-item " target="_blank"
                                                                        href="assets/files/assignments/<?php echo $resultf->file_name; ?>"><i
                                                                            class="far fa-file mr-1"></i> View File
                                                                        <?php echo $x; ?></a>

                                                                    <?php }
                                                                            } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }
                                                } ?>
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
                                                $sql = "SELECT a.assignment_id,a.chapter,p.title,p.description from assignments a,posts p where a.post_id=p.post_id and YEARWEEK(a.due_date) = YEARWEEK(NOW()+INTERVAL 7 DAY) and a.assignment_id not in (SELECT DISTINCT assignment_id from student_files) and class_id=" . $class_id;
                                                $query = $db_r->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);

                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>

                                                <div onclick="location.href='#';" style="cursor: pointer; "
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    class="dashboard_single_course ass_hover_effect join-button pop-login"
                                                    data-service="<?= htmlentities($result->assignment_id) ?>">
                                                    <div class="dashboard_single_course_caption">
                                                        <div class="dashboard_single_course_head">
                                                            <div class="dashboard_single_course_head_flex">
                                                                <span
                                                                    class="dashboard_instructor"><?php echo htmlentities($result->chapter); ?></span>
                                                                <h4 class="dashboard_course_title">
                                                                    <?php echo htmlentities($result->title); ?></h4>
                                                            </div>
                                                            <div class="dc_head_right">
                                                                <h4 class="dc_price_rate theme-cl"></h4>
                                                            </div>
                                                        </div>
                                                        <div class="dashboard_single_course_des">
                                                            <p><?php echo htmlentities($result->description); ?></p>
                                                        </div>
                                                        <div class="dashboard_single_course_progress">
                                                            <div class="dashboard_single_course_progress_1">

                                                                <?php
                                                                        $assid = htmlentities($result->assignment_id);
                                                                        $sql0 = "SELECT due_date from assignments where assignment_id = " . $assid;
                                                                        $query0 = $db_r->prepare($sql0);
                                                                        $query0->execute();
                                                                        $results0 = $query0->fetchAll(PDO::FETCH_OBJ);

                                                                        if ($query0->rowCount() > 0) {
                                                                            foreach ($results0 as $result0) {               ?>
                                                                <label>Due
                                                                    <?php echo htmlentities($result0->due_date); ?></label>
                                                                <?php }
                                                                        } ?>

                                                            </div>
                                                            <div class="dashboard_single_course_progress_2">
                                                                <ul class="m-0">

                                                                    <?php
                                                                            $sqlf = "SELECT file_name,file_path from files where assignments_id=" . $assid;
                                                                            $queryf = $db_r->prepare($sqlf);
                                                                            $queryf->execute();
                                                                            $resultsf = $queryf->fetchAll(PDO::FETCH_OBJ);

                                                                            if ($queryf->rowCount() > 0) {
                                                                                $x = 0;
                                                                                foreach ($resultsf as $resultf) {
                                                                                    $x++;
                                                                            ?>
                                                                    <a class="list-inline-item " target="_blank"
                                                                        href="assets/files/assignments/<?php echo $resultf->file_name; ?>"><i
                                                                            class="far fa-file mr-1"></i> View File
                                                                        <?php echo $x; ?></a>

                                                                    <?php }
                                                                            } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }
                                                } ?>
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

                                                $sql = "SELECT a.assignment_id,a.chapter,p.title,p.description from assignments a,posts p where a.post_id=p.post_id and YEARWEEK(a.due_date) >= YEARWEEK(NOW()+INTERVAL 14 DAY) and a.assignment_id not in (SELECT DISTINCT assignment_id from student_files) and class_id=" . $class_id;
                                                $query = $db_r->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);

                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>

                                                <div onclick="location.href='#';" style="cursor: pointer; "
                                                    data-toggle="modal" data-target="#exampleModal"
                                                    data-service="<?= htmlentities($result->assignment_id) ?>"
                                                    class="dashboard_single_course ass_hover_effect join-button pop-login">

                                                    <div class="dashboard_single_course_caption">
                                                        <div class="dashboard_single_course_head">
                                                            <div class="dashboard_single_course_head_flex">
                                                                <span
                                                                    class="dashboard_instructor"><?php echo htmlentities($result->chapter); ?></span>
                                                                <h4 class="dashboard_course_title">
                                                                    <?php echo htmlentities($result->title); ?></h4>
                                                            </div>
                                                            <div class="dc_head_right">
                                                                <h4 class="dc_price_rate theme-cl"></h4>
                                                            </div>
                                                        </div>
                                                        <div class="dashboard_single_course_des">
                                                            <p><?php echo htmlentities($result->description); ?></p>
                                                        </div>
                                                        <div class="dashboard_single_course_progress">
                                                            <div class="dashboard_single_course_progress_1">
                                                                <?php
                                                                        $assid = htmlentities($result->assignment_id);
                                                                        $sql0 = "SELECT due_date from assignments where assignment_id = " . $assid;
                                                                        $query0 = $db_r->prepare($sql0);
                                                                        $query0->execute();
                                                                        $results0 = $query0->fetchAll(PDO::FETCH_OBJ);

                                                                        if ($query0->rowCount() > 0) {
                                                                            foreach ($results0 as $result0) {               ?>
                                                                <label>Due
                                                                    <?php echo htmlentities($result0->due_date); ?></label>
                                                                <?php }
                                                                        } ?>

                                                            </div>
                                                            <div class="dashboard_single_course_progress_2">
                                                                <ul class="m-0">
                                                                    <?php
                                                                            $sqlf = "SELECT file_name, file_path from files where assignments_id=" . $assid;
                                                                            $queryf = $db_r->prepare($sqlf);
                                                                            $queryf->execute();
                                                                            $resultsf = $queryf->fetchAll(PDO::FETCH_OBJ);

                                                                            if ($queryf->rowCount() > 0) {
                                                                                $x = 0;
                                                                                foreach ($resultsf as $resultf) {
                                                                                    $x++;
                                                                            ?>
                                                                    <a class="list-inline-item " target="_blank"
                                                                        href="assets/files/assignments/<?php echo $resultf->file_name; ?>"><i
                                                                            class="far fa-file mr-1"></i> View File
                                                                        <?php echo $x; ?></a>

                                                                    <?php }
                                                                            } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }
                                                } ?>

                                            </div>
                                        </div>
                                        <!-- /due in more than two weeks -->
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="dashboard_container">
                                            <div class="dashboard_container_header">
                                                <div class="dashboard_fl_1">
                                                    <h4>Completed Assignments</h4>
                                                </div>
                                                <div class="dashboard_fl_2">
                                                    <ul class="mb0">
                                                        <li class="list-inline-item">
                                                        </li>
                                                        <li class="list-inline-item">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="dashboard_container_body">
                                                <!-- Single Course -->
                                                <?php
                                                $sql = "SELECT DISTINCT a.assignment_id,a.chapter,p.title,p.description from assignments a,posts p,student_files s where a.post_id=p.post_id and s.assignment_id=a.assignment_id and class_id=" . $class_id;
                                                $query = $db_r->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>

                                                <div onclick="location.href='#';" style="cursor: pointer;"
                                                    class="dashboard_single_course ass_hover_effect"
                                                    data-service="<?= htmlentities($result->assignment_id) ?>">

                                                    <div class="dashboard_single_course_caption">
                                                        <div class="dashboard_single_course_head">
                                                            <div class="dashboard_single_course_head_flex">
                                                                <span
                                                                    class="dashboard_instructor"><?php echo htmlentities($result->chapter); ?></span>
                                                                <h4 class="dashboard_course_title">
                                                                    <?php echo htmlentities($result->title); ?></h4>

                                                            </div>
                                                            <div class="dc_head_right">
                                                                <h4 class="dc_price_rate theme-cl"></h4>
                                                            </div>
                                                        </div>
                                                        <div class="dashboard_single_course_des">
                                                            <p><?php echo htmlentities($result->description); ?></p>
                                                        </div>
                                                        <div class="dashboard_single_course_progress">
                                                            <div class="dashboard_single_course_progress_1">
                                                                <?php
                                                                        $assid = htmlentities($result->assignment_id);
                                                                        $sql0 = "SELECT count(student_id) as no_of_files_submitted from student_files where student_id=:user_id and assignment_id=" . $assid;
                                                                        $query0 = $db_r->prepare($sql0);
                                                                        $query0->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                                                        $query0->execute();
                                                                        $results0 = $query0->fetchAll(PDO::FETCH_OBJ);

                                                                        if ($query0->rowCount() > 0) {
                                                                            foreach ($results0 as $result0) {               ?>
                                                                <label><?php echo htmlentities($result0->no_of_files_submitted); ?>
                                                                    Files Submitted</label>
                                                                <?php }
                                                                        } ?>

                                                            </div>
                                                            <div class="dashboard_single_course_progress_2">
                                                                <ul class="m-0">
                                                                    <?php
                                                                            $user_id = $_SESSION["user_id"];
                                                                            $sql1 = "SELECT marks from gradeass where student_file_id=(SELECT student_file_id from student_files where student_id=:user_id and assignment_id=:assid) ";
                                                                            $query1 = $db_r->prepare($sql1);
                                                                            $query1->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                                                            $query1->bindParam(':assid', $assid, PDO::PARAM_STR);
                                                                            $query1->execute();
                                                                            $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

                                                                            if ($query1->rowCount() > 0) {
                                                                                foreach ($results1 as $result1) {               ?>
                                                                    <li class="list-inline-item" style="font-weight:bold;">Grade :
                                                                        <?php echo htmlentities($result1->marks); ?>

                                                                        <?php
                                                                                $user_id = $_SESSION["user_id"];
                                                                                $sql5 = "SELECT a_marks from assignments where assignment_id=:assid";
                                                                                $query5 = $db_r->prepare($sql5);

                                                                                $query5->bindParam(':assid', $assid, PDO::PARAM_STR);
                                                                                $query5->execute();
                                                                                $results5 = $query5->fetchAll(PDO::FETCH_OBJ);

                                                                                if ($query5->rowCount() > 0) {
                                                                                    foreach ($results5 as $result5) {               ?>

                                                                         Out of <?php echo htmlentities($result5->a_marks); ?>

                                                                         <?php break;
                                                                                     }
                                                                                 } ?>
                                                                    </li>

                                                                    <?php break;
                                                                                }
                                                                            } ?>
                                                                            <?php
                                                                                    $user_id = $_SESSION["user_id"];
                                                                                    $sql1 = "SELECT time_created from student_files where student_id=:user_id and assignment_id=" . $assid;
                                                                                    $query1 = $db_r->prepare($sql1);
                                                                                    $query1->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                                                                    $query1->execute();
                                                                                    $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

                                                                                    if ($query1->rowCount() > 0) {
                                                                                        foreach ($results1 as $result1) {               ?>
                                                                            <li class="list-inline-item">Submitted on
                                                                                <?php echo htmlentities($result1->time_created); ?>
                                                                            </li>

                                                                            <?php break;
                                                                                        }
                                                                                    } ?>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php }
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Row -->
                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Submit your assignment</h5>

                </div>
                <div class="modal-body">
                    <form action="?p=ass-student&class_id=<?= $_GET['class_id'] ?>" role="form" method="post"
                        enctype="multipart/form-data">
                        <!-- <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Chapter:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name" name="chapter">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Post title:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name" name="title">
                        </div> -->
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Comments:</label>
                            <textarea class="form-control popuptarea" id="message-text" name="text_answer"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Upload files:</label>
                            <div class="choose_file">

                                <label for="choose_file">
                                    <input type="file" id="choose_file" name="files[]">
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

                        <!-- <div class="form-group">

                        <label for="start">Due date:</label>
                        <input type="datetime-local" id="start" name="due_date" value="2018-07-22" min="2018-01-01" max="2022-12-31">

                        </div> -->

                </div>

                <div class="modal-footer">
                    <input type="hidden" name="assignment_id">
                    <button type="button" class="btn btn-theme-2 popupbtn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-theme popupbtn" name="create">Submit</button>
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
    <script>
    $(function() {

        $('#exampleModal').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Button that triggered the modal
            var data = div.data('service') // Extract info from data-* attributes
            console.log(data) // Log data value

            var modal = $(this)
            modal.find('.modal-footer input').val(data)

        });
    });
    </script>

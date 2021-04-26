<?php
    // error_reporting(0);
    if (!isset($_SESSION['user_id'])){
        header('location:?p=login');
    }
    else{

    if(isset($_POST["submit"])){

        $title = $_POST['title'];
        $sqlp="INSERT INTO  posts(class_id,title,post_type) VALUES(1,:title,1)";
        $queryp = $db_w->prepare($sqlp);
        $queryp->bindParam(':title',$title,PDO::PARAM_STR);
        $queryp->execute();
        $lastInsertId = $db_w->lastInsertId();

        $sqlp="INSERT INTO  lectures(post_id) VALUES(:lastInsertId)";
        $queryp = $db_w->prepare($sqlp);
        $queryp->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
        $queryp->execute();
        $lastInsertId = $db_w->lastInsertId();

        // $fileExt = explode('.', [$fileName]);
        // $fileActualExt = strtolower(end($fileExt));

        // $fileAllowed = array('pdf', 'doc','ppt','jpg','png');

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
        // $filename=md5($filename+$salt).$extension;
        $filename=md5($filename).$extension;
        move_uploaded_file($_FILES["files"]["tmp_name"][$i],"lectureUploads/".$filename);

        $sql1="INSERT INTO  files_lectures(file_name, lecture_id) VALUES(:filename,:lastInsertId)";
        // $sql1="INSERT INTO  files(file_name) VALUES(:filename)";
        $query1 = $db_w->prepare($sql1);
        $query1->bindParam(':filename',$filename,PDO::PARAM_STR);
        $query1->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
        $query1->execute();


        }

        // $file = $_FILES['file'];
        // $fileName = $_FILES['file']['name'];
        // $fileType = $_FILES["file"]["type"];
        // $temp_location = $_FILES["file"]["tmp_name"];
        // $fileSize = $_FILES["file"]["size"];
        // $fileError = $_FILES["file"]["error"];
        // $permDest = "lectureUploads/". $_FILES["file"]["name"];
        // // check if file is allowed
        // if(in_array($fileActualExt, $fileAllowed)){
        //     if($fileError === 0){
        //         if($fileSize < 1000000){
        //             $fileUniqueName = uniqid('', true).".".$fileActualExt;
        //             $permDest = "lectureUploads/".$fileUniqueName;
        //             move_uploaded_file($temp_location, $permDest);
        //             // header("Location: lectureTeacher.php?upload-success");
        //         }else{
        //             // $errors .= $fileTooLarge;
        //         }
        //     }else{
        //         echo "Whoops!!! There was an error uploading your file, please try again later.";
        //     }
        // }else{
        //     // $errors .= $wrongFormat;
        // }
    }

?>

<body class="red-skin gray">
    <?php include 'includes/nav.php'; ?>

    <!-- FILE UPLOAD CODE -->
    <?php

    ?>

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

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


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

                        <!-- Row -->
                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">


                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="row">
                                                <h1 class="breadcrumb-title"> Software Engineering</h1>
                                                <h4>CSS323-2</h4>
                                                <h4>Instructor : Dr. Skibidibaba Hibidibaba</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="row">
                                                <strong>

                                                    <p>Email_ID : <a>biggusDickus@hotmail.com</a></p>
                                                    <p>Contact : +66969696969</p>
                                                </strong>
                                            </div>
                                        </div>

                                    </ol>
                                </nav>

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
                                            <div class="tab-indicator" style="left: calc(66.6667%);"></div>

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

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <!-- Curriculum Detail -->
                                <!-- <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab"> -->
                                <div class="tab-pane" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                    <div class="edu_wraper">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <h4 class="edu_title">Course Curriculum
                                                    <!-- <button type="button" class="add" data-target="#myInquiry"
                                                data-toggle="modal" data-ordernumber="1122">Add New Lecture</button> -->
                                                </h4>
                                            </div>
                                            <!-- TRIGGERING MODAL -->
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="lectureControl">
                                                    <!-- <button type="button" class="btn btn-primary btn-sm"
                                                        data-target="#myInquiry" data-toggle="modal"
                                                        data-ordernumber="1122"> Upload Files</button> -->
                                                    <button type="button" class="btn btn-outline-theme"
                                                        id="deleteLect">Delete</button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal" data-whatever="@getbootstrap">Upload
                                                        Lecture</button>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="accordionExample" class="accordion shadow circullum">

                                            <?php
                                                $sql = "SELECT l.lecture_id,p.title from lectures l,posts p where l.post_id=p.post_id and class_id=1";
                                                $query = $db_r -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);

                                                if($query->rowCount() > 0){
                                                    foreach($results as $result){
                                            ?>

                                            <!-- Part 1 -->
                                            <div class="card">
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <!-- aria-expanded="true" -->
                                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne"
                                                            class="d-block position-relative text-dark collapsible-link py-2 heading_text">
                                                            <!-- VARIABLE TITLE -->
                                                            <?php echo htmlentities($result->title);?>
                                                            <?php //echo $results['post_id'];?>
                                                        </a></h6>
                                                </div>
                                                <div id="collapseOne" aria-labelledby="headingOne"
                                                    data-parent="#accordionExample" class="collapse show">
                                                    <div class="card-body pl-3 pr-3">
                                                        <ul class="lectures_lists">
                                                            <li>
                                                                <?php
                                                                    $lectid = htmlentities($result->lecture_id);
                                                                    $sql0 = "SELECT file_name from files_lectures where lecture_id=".$lectid;
                                                                    $query0 = $db_r -> prepare($sql0);
                                                                    $query0->execute();
                                                                    $results0=$query0->fetchAll(PDO::FETCH_OBJ);
                                                                    $x=0;
                                                                    if($query->rowCount() > 0){
                                                                        foreach($results0 as $result0){
                                                                          $x++;
                                                                ?>
                                                                <a class="lectures_lists_title" target="_blank"
                                                                    href="assets/files/lectures/<?php echo $result0->file_name;?>"><i
                                                                        class="ti-file"></i>View File
                                                                    <?php echo $x ;?></a>

                                                                <?php }} ?>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- <hr>
                                                    <button type="button" class="btn btn-outline-theme deleteBtn"
                                                        id="deleteLect">Delete</button> -->
                                                </div>
                                            </div>
                                            <?php }} ?>

                                            <!-- Part 3 -->
                                            <!-- <div class="card">
                                                <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                            data-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree"
                                                            class="d-block position-relative collapsed text-dark collapsible-link py-2">Lecture
                                                            1: Skibidibaba</a></h6>
                                                </div>
                                                <div id="collapseThree" aria-labelledby="headingThree"
                                                    data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3">
                                                        <ul class="lectures_lists">
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 01
                                                                </div>Web
                                                                Designing Beginner
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 02
                                                                </div>
                                                                Startup Designing with HTML5 & CSS3
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 03
                                                                </div>How
                                                                To Call Google Map iFrame
                                                            </li>
                                                            <li class="unview">
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 04
                                                                </div>
                                                                Create Drop Down Navigation Using CSS3
                                                            </li>
                                                            <li class="unview">
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 05
                                                                </div>How
                                                                to Create Sticky Navigation Using JS
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /Row -->

    </div>

    </div>
    <!-- Row -->

    </div>
    </section>
    <!-- ============================ Dashboard: My Order Start End ================================== -->

    <!-- popup window -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content popupform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">[COURSE NAME]: Upload Lecture</h5>

                </div>
                <form method="post" enctype="multipart/form-data" action="?p=lectureTeacher">
                    <div class="modal-body">
                        <!-- <form method="POST" enctype="multipart/form-data"> -->
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label" id="lectTitle">Lecture title:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name" name="title">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Upload files:</label>
                            <div class="choose_file">
                                <label for="choose_file">
                                    <input type="file" id="choose_lecture" name="files[]" multiple>
                                    <span>Choose Files</span>
                                </label>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-theme-2 popupbtn" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" value="Upload"
                            class="btn btn-theme popupbtn">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end popup window -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

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

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="assets/js/metisMenu.min.js"></script>
    <script>
    $('#side-menu').metisMenu();
    </script>
    <?php } ?>
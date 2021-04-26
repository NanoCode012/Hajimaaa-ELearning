<?php
$class_id = $_GET['class_id'];
$assignment_id = $_GET['class_id'];
$user_id = $_SESSION["user_id"];
$student_id = $_GET['student_id'];

$query = 'SELECT a.*, p.* FROM assignments a, posts p WHERE a.assignment_id = ? AND p.post_id = a.post_id';
$stmt = $db_r->prepare($query);
$stmt->execute([$assignment_id]);
$result = $stmt->fetch();

$query = 'SELECT * FROM users WHERE user_id = ?';
$stmt = $db_r->prepare($query);
$stmt->execute([$student_id]);
$student_file = $stmt->fetch();

?>


<body class="red-skin gray">

    <?php include 'includes/nav.php'; ?>

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

        <!-- ============================ Dashboard: My Order Start ================================== -->
        <section class="gray pt-0">

            <div class="container">


                <div class="row justify-content-center">

                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                <div class="dashboard_container">

                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <?php

                                            $sql1 = "SELECT class_name,class_instructor from class where class_id=?";
                                            $query1 = $db_r->prepare($sql1);
                                            $query1->execute([$class_id]);
                                            $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

                                            if ($results1) {
                                                foreach ($results1 as $result1) {               ?>
                                            <h1><?php echo htmlentities($result1->class_name); ?></h1>
                                            <h4 class="edu_title">Dr.
                                                <?php echo htmlentities($result1->class_instructor); ?></h4>
                                            <?php

                                                    $sql2 = "SELECT email from users where user_id=?";
                                                    $query2 = $db_r->prepare($sql2);
                                                    $query2->execute([$user_id]);
                                                    $results2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                                    if ($results2) {
                                                        foreach ($results2 as $result2) {               ?>
                                            <span
                                                class="dashboard_instructor"><?php echo htmlentities($result2->email); ?></span>
                                            <?php }
                                                    }
                                                }
                                            } ?>
                                        </div>


                                    </div>
                                </div>



                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <!-- tabs-->

                                        <div class="tabs">
                                            <div class="tab-header">
                                                <div>
                                                    <a href="?p=now-teacher&class_id=<?= $_GET['class_id'] ?>">Now</a>
                                                </div>
                                                <div class="active">
                                                    <a
                                                        href="?p=ass-teacher&class_id=<?= $_GET['class_id'] ?>">Assignments</a>
                                                </div>
                                                <div>
                                                    <a href="?p=lectureteacher&class_id=<?= $_GET['class_id'] ?>">Lecture
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

                        <!-- Row -->
                        <div class="row">

                            <!-- ============================ Page Title Start================================== -->

                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <!-- Course Style 1 For Student -->
                                <!-- due this week -->

                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">

                                        <div class="row align-items-center">

                                            <div class="col-lg-8 col-md-7">
                                                <div class="ed_detail_wrap">
                                                    <div class="ed_header_caption">
                                                        <h1 class="ed_title"><?= $result['title'] ?></h1>
                                                    </div>
                                                    <div class="ed_header_short"><?= $result['description'] ?>
                                                    </div>
                                                    <br>
                                                    <div class="viewer_package_status">Due on <?= $result['due_date'] ?>
                                                    </div>
                                                    <div class="viewer_package_status"><?= $result['a_marks'] ?> Marks
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <!-- Course Style 1 For Student -->
                                <!-- due this week -->

                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="edu_cat_icons">
                                            <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70"
                                                    class="img-fluid" alt="" /></a>
                                        </div>
                                        <div class="edu_cat_data">
                                            <h4 class="edu_title"><?= $student_file['firstname'] ?>
                                                <?= $student_file['lastname'] ?></h4>
                                            <ul class="meta">
                                                <li class="video"><i class="fas fa-star filled"></i>Not done</li>
                                            </ul>
                                        </div>
                                    </div>



                                </div>


                                <div class="edu_wraper border">
                                    <h4 class="edu_title">Assignments</h4>
                                    <div id="accordionExample" class="accordion shadow circullum">

                                        <!-- Part 1 -->
                                        <div class="card">
                                            <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne"
                                                        class="d-block position-relative text-dark collapsible-link py-2">
                                                        Answer</a></h6>
                                            </div>
                                            <div id="collapseOne" aria-labelledby="headingOne"
                                                data-parent="#accordionExample" class="collapse show">
                                                <div class="card-body pl-3 pr-3">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->

                </div>
        </section>
        <!-- ============================ Dashboard: My Order Start End ================================== -->

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
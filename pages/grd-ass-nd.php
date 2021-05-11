<?php
$class_id = $_GET['class_id'];
$assignment_id = $_GET['assignment_id'];
$user_id = $_SESSION["user_id"];

$query = 'SELECT a.*, p.* FROM assignments a, posts p WHERE a.assignment_id = ? AND p.post_id = a.post_id';
$stmt = $db_r->prepare($query);
$stmt->execute([$assignment_id]);
$result = $stmt->fetch();

$query = 'SELECT num_students FROM class_enrolled_count WHERE class_id = ?';
$stmt = $db_r->prepare($query);
$stmt->execute([$class_id]);
$num_students = $stmt->fetchColumn();

$query = 'SELECT c.*, u.* FROM class_enrolled c, users u WHERE c.class_id = ? AND c.user_id = u.user_id AND c.user_id NOT IN (SELECT sf.student_id FROM student_files sf WHERE sf.assignment_id = ?)';
$stmt = $db_r->prepare($query);
$stmt->execute([$class_id, $assignment_id]);
$students_not_done = $stmt->fetchAll();
$num_students_not_done = $stmt->rowCount();
?>

<body class="red-skin gray">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span>
        </div>
    </div>

    <?php include 'includes/nav.php'; ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================ Dashboard: My Order Start ================================== -->
        <section class="gray pt-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary"
                                                    onclick="location.href='?p=grd-ass-d&class_id=<?= $_GET['class_id'] ?>&assignment_id=<?= $_GET['assignment_id'] ?>';"
                                                    type="button">
                                                    <h1 class="theme-cl">
                                                        <?php echo $num_students - $num_students_not_done; ?></h1>
                                                    <span class="theme-cl">Done</span>
                                                </button>
                                            </div>
                                            <div class="input-group-append">
                                                <div class="text-center">
                                                    <h1 class="ed_title">
                                                        <?php echo $num_students_not_done; ?></h1>
                                                    <span class="ed_title">Not Done</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="row">
                                            <!-- seagreen-->
                                            <?php
                                            foreach ($students_not_done as $row) {
                                            ?>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="edu_cat_2 cat-2">
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a
                                                                href="?p=std-nd&&class_id=<?= $_GET['class_id'] ?>&assignment_id=<?= $_GET['assignment_id'] ?>&student_id=<?= $row['user_id'] ?>">
                                                                <?= $row['firstname'] ?> <?= $row['lastname'] ?>

                                                            </a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Not
                                                                Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
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
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
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
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
                                <?php include 'includes/classhead.php'; ?>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <!-- tabs-->

                                        <div class="tabs">
                                            <div class="tab-header">
                                                <div class="active">
                                                    <a href="?p=now-student&class_id=<?= $_GET['class_id'] ?>">Now</a>
                                                </div>
                                                <div>
                                                    <a
                                                        href="?p=ass-student&class_id=<?= $_GET['class_id'] ?>">Assignments</a>
                                                </div>
                                                <div>
                                                    <a href="?p=lecturestudent&class_id=<?= $_GET['class_id'] ?>">Lecture
                                                        Notes</a>
                                                </div>
                                            </div>
                                            <div class="tab-indicator"></div>

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
                                <div class="dashboard_container">
                                    <div class="dashboard_container_body">
                                        <!-- Single Course -->
                                        <?php
                                        //$class_id=$_GET['class_id'];
                                        //$stmt = $db_r->query('SELECT * FROM posts WHERE class_id=$class_id ORDER BY time_created');
                                        $stmt = $db_r->query('SELECT * FROM posts ORDER BY time_created DESC');
                                        while ($row = $stmt->fetch()) {
                                        ?>
                                        <a
                                            href="?p=view-post&class_id=<?= $_GET['class_id'] ?>&post_id=<?php echo $row['post_id'] ?>">
                                            <div style="cursor: pointer;"
                                                class="dashboard_single_course ass_hover_effect">
                                                <div class="dashboard_single_course_caption">
                                                    <div class="dashboard_single_course_head">
                                                        <div class="dashboard_single_course_head_flex">
                                                            <span class="dashboard_instructor"></span>
                                                            <h4 class="dashboard_course_title">
                                                                <?php echo $row['title'] ?> </h4>
                                                        </div>
                                                        <div class="dc_head_right">
                                                            <h4 class="dc_price_rate theme-cl"></h4>
                                                        </div>
                                                    </div>
                                                    <div class="dashboard_single_course_des">
                                                        <p> <?php echo $row['description'] ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php } ?>
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

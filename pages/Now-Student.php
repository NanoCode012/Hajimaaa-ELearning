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
        <div class="col-lg-12 col-md-9 col-sm-12">

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                    <nav aria-label="breadcrumb">
                        <div class="breadcrumb">
                            <div>
                                <h1>CSS-323 Software Engineering</h1>
                                <h4>Instructor: Asst. Prof. Dr. Sasiporn Usanavasin</h4>
                                <h4>Contact: Email@email.com</h4>
                            </div>
                        </div>
                    </nav>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- tabs-->

                            <div class="tabs">
                                <div class="tab-header">
                                    <div class="active">
                                        Now
                                    </div>
                                    <div>
                                        Assignments
                                    </div>
                                    <div>
                                        Lecture Notes
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

                            <div class="dashboard_single_course">


                                <div class="dashboard_single_course_caption">
                                    <div class="dashboard_single_course_head">
                                        <div class="dashboard_single_course_head_flex">
                                            <h2 class="dashboard_course_title">Quiz on Thursday</h2>

                                        </div>
                                        <div class="dc_head_right">
                                            <h4 class="dc_price_rate theme-cl"></h4>
                                        </div>
                                    </div>
                                    <div class="dashboard_single_course_des">
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                            molestias excepturi sint occaecati cupiditate non provident, similique
                                            sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                                            dolorum fuga.</p>
                                    </div>
                                    <div class="dashboard_single_course_progress">
                                        <div class="dashboard_single_course_progress_1">
                                            <div class="ass-buttons">
                                                <a href="#" class="btn btn-theme-2">View</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Single Course -->

                            <div class="dashboard_single_course">


                                <div class="dashboard_single_course_caption">
                                    <div class="dashboard_single_course_head">
                                        <div class="dashboard_single_course_head_flex">
                                            <h4 class="dashboard_course_title">No class next week due to Songkran
                                            </h4>

                                        </div>
                                        <div class="dc_head_right">
                                            <h4 class="dc_price_rate theme-cl"></h4>
                                        </div>
                                    </div>
                                    <div class="dashboard_single_course_des">
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                            molestias excepturi sint occaecati cupiditate non provident, similique
                                            sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                                            dolorum fuga.</p>
                                    </div>
                                    <div class="dashboard_single_course_progress">
                                        <div class="dashboard_single_course_progress_1">
                                            <div class="ass-buttons">
                                                <a href="#" class="btn btn-theme-2">View</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Course -->

                            <div class="dashboard_single_course">


                                <div class="dashboard_single_course_caption">
                                    <div class="dashboard_single_course_head">
                                        <div class="dashboard_single_course_head_flex">
                                            <h4 class="dashboard_course_title">Please submit your report</h4>

                                        </div>
                                        <div class="dc_head_right">
                                            <h4 class="dc_price_rate theme-cl"></h4>
                                        </div>
                                    </div>
                                    <div class="dashboard_single_course_des">
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                            molestias excepturi sint occaecati cupiditate non provident, similique
                                            sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                                            dolorum fuga.</p>
                                    </div>
                                    <div class="dashboard_single_course_progress">
                                        <div class="dashboard_single_course_progress_1">
                                            <div class="ass-buttons">
                                                <a href="#" class="btn btn-theme-2">View</a>
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
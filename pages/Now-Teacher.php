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
                                  <?php
                                  $class_id = $_GET['class_id'];
                                  $stmt = $db_r->prepare('SELECT class_name,class_code,class_instructor FROM class WHERE class_id=?');
                                  $stmt->execute([$class_id]);
                                  $get = $stmt->fetch();
                                  ?>
                                  <div class="dashboard_container_header">
                                      <div class="dashboard_fl_1">
                                          <h1><?php echo $get['class_code']; ?> <?php echo $get['class_name']; ?></h1>
                                          <h4 class="edu_title">Instructor: <?php echo $get['class_instructor'] ?>
                                          </h4>
                                          <span class="dashboard_instructor">Contact: Email@email.com</span>

                                      </div>


                                  </div>
                              </div>



                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <!-- tabs-->

                                        <div class="tabs">
                                            <div class="tab-header">
                                                <div class="active">
                                                    <a href="?p=now-teacher&class_id=<?= $_GET['class_id'] ?>">Now</a>
                                                </div>
                                                <div>
                                                    <a
                                                        href="?p=ass-teacher&class_id=<?= $_GET['class_id'] ?>">Assignments</a>
                                                </div>
                                                <div>
                                                    <a href="?p=lectureteacher&class_id=<?= $_GET['class_id'] ?>">Lecture
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
                                <!-- due this week -->

                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4></h4>
                                        </div>
                                        <div class="dashboard_fl_2">
                                            <ul class="mb0">
                                                <li class="list-inline-item">

                                                </li>
                                                <li class="list-inline-item">

                                                    <button type="button" class="btn btn-sm pop-login"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        data-whatever="@getbootstrap">Post &nbsp <span
                                                            class="icofont-ui-add"> </span></button>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">

                                        <!-- Single Course -->
                                        <?php
                                        $stmt = $db_r->prepare(' SELECT p.post_id, post_type, class_id,title,description,time_created,assignment_id,due_date FROM posts p LEFT JOIN Assignments a ON a.post_id=p.post_id WHERE class_id=? ORDER BY time_created  DESC');
                                        $stmt->execute([$_GET['class_id']]);
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
                                                    <div class="dashboard_single_course_progress">
                                                        <div class="dashboard_single_course_progress_1">
                                                            <div class="ass-buttons">
                                                                <!--<a href="p=view-post&post_id=<?php /*echo $row['post_id']*/ ?>" class="btn btn-theme-2">View</a>-->
                                                                <?php /*<a href='?p=Delete_post&post_id=<?php echo $row['post_id']?>&post_type=<?php echo $row['post_type']?>'
                                                                class="btn btn-theme-2"> Delete
                                        </a>*/ ?>
                                    </div>



                                </div>
                                <?php
                                                            if ($row['post_type'] == '1') {
                                                                //Get number of students in that class
                                                                /*$stmt = $db_r->prepare('SELECT COUNT(user_id) FROM `class_enrolled` WHERE (`class_id` = ?)');
                                                            $stmt->execute([$class_id]);
                                                            $array = $stmt->fetch();
                                                            $Assigned=$array['COUNT'];*/

                                                                //Get number of files in that assignment
                                                                /*$assignment_id=$row['assignment_id'];
                                                            $stmt = $db_r->prepare('SELECT COUNT(file_id) FROM `files` WHERE (`assignment_id` = ?)');
                                                            $stmt->execute([$assignment_id]);
                                                            $array = $stmt->fetch();
                                                            $Files=$array['COUNT'];*/
                                                            ?>
                                <div class="dashboard_single_course_progress_2">
                                    <ul class="m-0">
                                        <li class="list-inline-item"><i
                                                class="ti-user mr-1"></i><?php //echo $Assigned
                                                                                                                                    ?>
                                            Assigned</li>
                                        <li class="list-inline-item"><i
                                                class="far fa-file mr-1"></i><?php //echo $Files
                                                                                                                                        ?>
                                            Files</li>
                                    </ul>
                                </div>
                                <?php } ?>

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

    <!-- popup window -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content popupform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post </h5>

                </div>
                <div class="modal-body">
                    <form method="post" action="?p=Create_post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Post title:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name" name="title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Post description:</label>
                            <textarea class="form-control popuptarea" id="message-text" name="description"></textarea>
                        </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="class_id" value="<?= $_GET['class_id'] ?>">
                    <button type="button" class="btn btn-theme-2 popupbtn" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-theme popupbtn" name="Create" value="Post">
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

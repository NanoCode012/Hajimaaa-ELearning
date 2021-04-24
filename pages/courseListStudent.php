<body class="red-skin">
    <div id="main-wrapper">
        <?php include 'includes/nav.php'; ?>

        <section class="gray pt-0">

            <div class="container">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- /Row -->

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <!-- Course Style 1 For Student -->
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4>All Courses</h4>
                                        </div>
                                        <div class="dashboard_fl_2">
                                            <ul class="mb0">
                                                <li class="list-inline-item">
                                                    <button data-toggle="modal" data-target="#enrollNew"
                                                        class="btn btn-theme btn-rounded">Enroll new class</button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form class="form-inline my-2 my-lg-0">
                                                        <input class="form-control" type="search"
                                                            placeholder="Search Courses" aria-label="Search">
                                                        <button class="btn my-2 my-sm-0" type="submit"><i
                                                                class="ti-search"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">






                                        <?php
                                        $sql = "SELECT c.*, ce.num_students AS class_count from class c, class_enrolled_count ce where c.class_id IN (SELECT class_id FROM class_enrolled WHERE user_id = ?) AND c.class_id = ce.class_id";
                                        $query = $db_r->prepare($sql);
                                        $query->execute([$_SESSION['user_id']]);
                                        $rows = $query->fetchAll();
                                        include 'includes/utils/gcloud.php';
                                        $gstorage = new GStorage();
                                        foreach ($rows as $row) {
                                          $course_img = 'assets/files/course_images' . '/' . $row["class_secret"] . '.png';
                                          if (!file_exists($course_img)) $gstorage->download($row["course_img_path"], 'assets/files/' . $course_img);
                                        ?>


                                        <!-- Single Course -->
                                        <div class="dashboard_single_course">
                                            <div class="dashboard_single_course_thumb">
                                                <img src="<?php echo $course_img; ?>" class="img-fluid" alt="" />
                                                <div class="dashboard_action">
                                                    <a href="#" <?php



                                                                    ?> class="btn btn-ect">Delete</a>
                                                    <a href="?p=now-student&class_id=<?= $row['class_id'] ?>"
                                                        class="btn btn-ect">View</a>
                                                </div>
                                            </div>
                                            <div class="dashboard_single_course_caption">
                                                <div class="dashboard_single_course_head">
                                                    <div class="dashboard_single_course_head_flex">
                                                        <span
                                                            class="dashboard_instructor"><?php echo $row['class_instructor']; ?></span>
                                                        <h4 class="dashboard_course_title">
                                                            <?php echo $row['class_name']; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="dashboard_single_course_des">
                                                    <p><?php echo $row['class_description']; ?></p>
                                                </div>
                                                <div class="dashboard_single_course_progress">
                                                    <div class="dashboard_single_course_progress_2">
                                                        <ul class="m-0">
                                                            <li class="list-inline-item"><i
                                                                    class="ti-user mr-1"></i><?php echo $row['class_count']; ?>
                                                                Enrolled</li>
                                                            <!-- <li class="list-inline-item"><i
                                                                    class="ti-comment-alt mr-1"></i><?php //echo $row['class_ass'];
                                                                                                    ?>
                                                                Assignments Remaining</li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }  ?>

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

    <!-- Sign Up Modal -->
    <div class="modal fade" id="enrollNew" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="sign-up">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Enroll New Class</h4>
                    <div class="login-form">
                        <form action="?p=enrollClass" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="class_secret"
                                    placeholder="Enter Course 6-digit Code">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Enroll</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
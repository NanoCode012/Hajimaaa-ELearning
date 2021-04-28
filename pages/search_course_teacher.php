<?php

$keyword = $_POST['search'];

?>

<body class="red-skin">
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>
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
                                                    <a href="?p=createClass" class="btn btn-theme btn-rounded">Create
                                                        new class</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form action="?p=search_course_teacher" method="post" class="form-inline my-2 my-lg-0">
                                                        <input class="form-control" name="search" type="search"
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
                                        $search = "%$keyword%";
                                        $sql = "SELECT c.*, ce.num_students AS class_count from class c, class_enrolled_count ce
                                        where c.instructor_id = ? AND c.class_id = ce.class_id AND c.class_name LIKE ? ORDER BY c.class_name ASC ";
                                        $query = $db_r->prepare($sql);
                                        $query->execute([$_SESSION['user_id'], $search]);
                                        $rows = $query->fetchAll();
                                        include 'includes/utils/gcloud.php';
                                        $gstorage = new GStorage();
                                        foreach ($rows as $row) {
                                            $course_img = 'assets/files/course_images' . '/' . $row["class_secret"] . '.png';
                                            if (!file_exists($course_img)) $gstorage->download($row["course_img_path"], $course_img);
                                        ?>

                                        <!-- Single Course -->
                                        <div class="dashboard_single_course">
                                            <div class="dashboard_single_course_thumb">
                                                <img src="<?php echo $course_img; ?>" class="img-fluid" alt="" />
                                                <div class="dashboard_action">
                                                    <a href="?p=delete_class&class_id=<?php echo $row['class_id']?>" class="btn btn-ect">Delete</a>
                                                    <a href="?p=now-teacher&class_id=<?= $row['class_id'] ?>"
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
                                                            <ul class="cources_facts_list">
                                            									<li class="facts-3"><?php echo $row["categories"]; ?></li>
                                            								</ul>
                                                    </div>
                                                </div>
                                                <div class="dashboard_single_course_des">
                                                    <p><?php echo $row['class_description']; ?></p>
                                                </div>
                                                <div class="dashboard_single_course_progress">
                                                    <div class="dashboard_single_course_progress_2">
                                                        <ul class="m-0">
                                                          <li class="list-inline-item"><i class="ti-user mr-1"></i> <a href="?p=student_list&class_id=<?php echo $row['class_id']?>"> <?php echo $row['class_count']; ?>
                                                                    Enrolled</a></li>
                                                          <li class="list-inline-item"></i>Class Secret: <?php echo $row["class_secret"]; ?></li>
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

    <!-- Log In Modal -->
    <div class="modal fade" id="create-class" tabindex="-1" role="dialog" aria-labelledby="registermodal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width:800px;">
            <div class="modal-content" id="registermodal" style="width:800px;">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Create New Class</h4>
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="*******">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                            </div>

                        </form>
                    </div>

                    <div class="social-login mb-3">
                        <ul>
                            <li>
                                <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                                <label for="reg" class="checkbox-custom-label">Save Password</label>
                            </li>
                            <li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>
                        </ul>
                    </div>

                    <div class="modal-divider"><span>Or login via</span></div>
                    <div class="social-login ntr mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <p class="mt-2">Haven't Any Account? <a href="register.html" class="link">Click here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

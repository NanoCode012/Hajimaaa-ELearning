<?php
$category = $_GET["category"];
?>

<body class="red-skin">
    <!-- <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div> -->
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
                                        <div style="padding:5px;">
                                            <a href="?p=createClass" class="btn btn-theme btn-rounded">Create new
                                                class</a>
                                        </div>
                                        <div style="padding:5px;">
                                            <div class="dropdown show form-inline">
                                                <a class="btn btn-custom dropdown-toggle" style="width:160px;" href="#"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Filter By
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Science">Science</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Math">Math</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Computer Science">Computer
                                                        Science</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Programming Language">Programming
                                                        Language</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Web Development">Web
                                                        Development</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Mobile Development">Mobile
                                                        Development</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Artificial Intelligence">Artificial
                                                        Intelligence</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Network and Security">Network
                                                        and Security</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Hardware">Hardware</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Electronics">Electronics</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Electrical Engineering">Electrical
                                                        Engineering</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Civil Engineering">Civil
                                                        Engineering</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Art and Design">Languages</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Business and Management">Art
                                                        and Design</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=Science">Business and
                                                        Management</a>
                                                    <a class="dropdown-item"
                                                        href="?p=courselistteacherfilter&category=TU Subject">TU
                                                        Subject</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="padding:5px;">
                                            <form action="?p=search_course_teacher" method="post"
                                                class="form-inline my-2 my-lg-0">
                                                <input class="form-control" name="search" type="search"
                                                    placeholder="Search Courses" aria-label="Search">
                                                <button class="btn my-2 my-sm-0" type="submit"><i
                                                        class="ti-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">
                                        <?php
                                        $sql = "SELECT c.*, ce.num_students AS class_count from class c, class_enrolled_count ce
                                                where c.instructor_id = ? AND c.class_id = ce.class_id AND
                                                c.class_id IN (SELECT class_id FROM categories WHERE category_name = ?)";
                                        $query = $db_r->prepare($sql);
                                        $query->execute([$_SESSION['user_id'], $category]);
                                        $rows = $query->fetchAll();
                                        include 'includes/utils/gcloud.php';
                                        $gstorage = new GStorage();
                                        foreach ($rows as $row) {
                                            $course_img = 'assets/files/course_images' . '/' . $row["class_secret"] . '.png';
                                            if (!file_exists($course_img)) $gstorage->download($row["course_img_path"], $course_img);

                                            $sqlcat = "SELECT * FROM categories WHERE class_id = ?";
                                            $querycat = $db_r->prepare($sqlcat);
                                            $querycat->execute([$row['class_id']]);
                                            $categories = $querycat->fetchAll();
                                        ?>
                                        <!-- Single Course -->
                                        <div class="dashboard_single_course">
                                            <div class="dashboard_single_course_thumb">
                                                <img src="<?php echo $course_img; ?>" class="img-fluid" alt="" />
                                                <div class="dashboard_action">
                                                    <a href="?p=delete_class&class_id=<?php echo $row['class_id'] ?>"
                                                        class="btn btn-ect">Delete</a>
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
                                                            <?php
                                                                $count = 1;
                                                                foreach ($categories as $category) {
                                                                    echo '<li class="facts-' . $count . '">' . $category["category_name"] . '</li>';
                                                                    $count = $count + 1;
                                                                    if ($count == 6) {
                                                                        $count = 5;
                                                                    }
                                                                }
                                                                ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="dashboard_single_course_des">
                                                    <p><?php echo $row['class_description']; ?></p>
                                                </div>
                                                <div class="dashboard_single_course_progress">
                                                    <div class="dashboard_single_course_progress_2">
                                                        <ul class="m-0">
                                                            <li class="list-inline-item"><i class="ti-user mr-1"></i> <a
                                                                    href="?p=student_list&class_id=<?php echo $row['class_id'] ?>">
                                                                    <?php echo $row['class_count']; ?>
                                                                    Enrolled</a></li>
                                                            <li class="list-inline-item"></i>Class Secret:
                                                                <?php echo $row["class_secret"]; ?></li>
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
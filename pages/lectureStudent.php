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
                                                <div>
                                                    <a href="?p=now-student&class_id=<?= $_GET['class_id'] ?>">Now</a>
                                                </div>
                                                <div>
                                                    <a
                                                        href="?p=ass-student&class_id=<?= $_GET['class_id'] ?>">Assignments</a>
                                                </div>
                                                <div class="active">
                                                    <a href="?p=lecturestudent&class_id=<?= $_GET['class_id'] ?>">Lecture
                                                        Notes</a>
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
                                            <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="lectureControl">
                                                    <button type="button" class="btn btn-outline-theme"
                                                        id="deleteLect">Delete</button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal" data-whatever="@getbootstrap">Upload
                                                        Lecture</button>
                                                </div>
                                            </div> -->
                                        </div>


                                        <div id="accordionExample" class="accordion shadow circullum">

                                            <?php
                                            include 'includes/utils/gcloud.php';
                                            $gstorage = new GStorage();
                                            $sql = "SELECT l.lecture_id,p.title from lectures l,posts p where l.post_id=p.post_id and class_id=1";
                                            $query = $db_r->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
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
                                                            <?php echo htmlentities($result->title); ?>
                                                            <?php //echo $results['post_id'];
                                                                    ?>
                                                        </a></h6>
                                                </div>
                                                <div id="collapseOne" aria-labelledby="headingOne"
                                                    data-parent="#accordionExample" class="collapse show">
                                                    <div class="card-body pl-3 pr-3">
                                                        <ul class="lectures_lists">
                                                            <li>
                                                                <?php
                                                                        $lectid = htmlentities($result->lecture_id);
                                                                        $sql0 = "SELECT file_name, file_path from files_lectures where lecture_id=" . $lectid;
                                                                        $query0 = $db_r->prepare($sql0);
                                                                        $query0->execute();
                                                                        $results0 = $query0->fetchAll(PDO::FETCH_OBJ);
                                                                        $x = 0;
                                                                        if ($query->rowCount() > 0) {
                                                                            foreach ($results0 as $result0) {
                                                                                $x++;
                                                                                if (!file_exists('assets/files/lectures/' . $result0->file_name)) {
                                                                                    $gstorage->download($result0->file_path, 'assets/files/lectures/' . $result0->file_name);
                                                                                }
                                                                        ?>
                                                                <a class="lectures_lists_title" target="_blank"
                                                                    href="assets/files/lectures/<?php echo $result0->file_name; ?>"><i
                                                                        class="ti-file"></i>View File
                                                                    <?php echo $x; ?></a>

                                                                <?php }
                                                                        } ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- <hr>
                                                    <button type="button" class="btn btn-outline-theme deleteBtn"
                                                        id="deleteLect">Delete</button> -->
                                                </div>
                                            </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

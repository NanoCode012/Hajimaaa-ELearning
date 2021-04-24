
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

            <div class="container-fluid">


                <div class="row justify-content-center">

                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <div class="trips_detail">
                                          <?php

                                          $sql1 = "SELECT class_name,class_instructor from class where class_id=1;";
                                          $query1 = $db_r -> prepare($sql1);
                                          $query1->execute();
                                          $results1=$query1->fetchAll(PDO::FETCH_OBJ);

                                          if($results1)
                                          {
                                          foreach($results1 as $result1)
                                          {               ?>
                                            <h1 class="breadcrumb-title"><?php echo htmlentities($result1->class_name);?></h1>
                                            <h4><?php echo htmlentities($result1->class_instructor);?></h4>
                                            <?php

                                            $sql2 = "SELECT email from users where user_id=2;";
                                            $query2 = $db_r -> prepare($sql2);
                                            $query2->execute();
                                            $results2=$query2->fetchAll(PDO::FETCH_OBJ);

                                            if($results2)
                                            {
                                            foreach($results2 as $result2)
                                            {               ?>
                                            <h4>Contact: <?php echo htmlentities($result2->email);?></h4>

                                          <?php }}}} ?>
                                        </div>
                                    </ol>

                                </nav>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <!-- tabs-->

                                        <div class="tabs">
                                            <div class="tab-header">
                                                <div>
                                                    Now
                                                </div>
                                                <div class="active">
                                                    Assignments
                                                </div>
                                                <div>
                                                    Lecture Notes
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
                                                    <!--<ul class="cources_facts_list">
                        <li class="facts-1">SEO</li>
                        <li class="facts-5">Design</li>
                      </ul>-->
                                                    <div class="ed_header_caption">
                                                      <?php

                                                      $sql1 = "SELECT c.class_code, p.title, p.description FROM class c, posts p WHERE c.class_id = p.class_id and p.post_id=13;";
                                                      $query1 = $db_r -> prepare($sql1);
                                                      $query1->execute();
                                                      $results1=$query1->fetchAll(PDO::FETCH_OBJ);

                                                      if($results1)
                                                      {
                                                      foreach($results1 as $result1)
                                                      {               ?>


                                                        <h1 class="ed_title"><?php echo htmlentities($result1->title);?></h1>


                                                        <span class="viewer_location"><?php echo htmlentities($result1->class_code);?></span>


                                                        <ul>
                                                            <!--<li><i class="ti-calendar"></i>10 - 20 weeks</li>
                          <li><i class="ti-control-forward"></i>102 Lectures</li>-->
                                                            <li><i class="ti-user"></i>74 Student Enrolled</li>
                                                        </ul>
                                                    </div>
                                                    <div class="ed_header_short">
                                                        <p><?php echo htmlentities($result1->description);?></p>
                                                    </div>
                                                  <?php }} ?>
                                                    <div class="viewer_package_status">Due in 2 Days</div>
                                                    <div class="viewer_package_status">150 words</div>
                                                    <div class="viewer_package_status">20 Marks</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group-append">
                                            <div class="text-center">
                                                <h1 class="theme-cl">40</h1><span class="theme-cl">Done</span>
                                            </div>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <h1 class="ed_title">34</h1><span class="ed_title">NotDone</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="row">

                                            <!-- seagreen-->
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-1">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--yellow-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-2">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Red>-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-3">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--green-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-4">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--blue-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-10">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Purple-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-6">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--pink-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-7">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--dark green-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-8">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--orange-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-9">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-1">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--yellow-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-2">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Red>-->

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-3">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="#">Student's name</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
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

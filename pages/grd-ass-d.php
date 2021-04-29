<?php
$e=$_SESSION['user_id'];
$sql = 'SELECT p.class_id,p.title,p.description,p.time_created,c.class_name, c.class_instructor, c.class_code,c.class_id
		FROM posts p, class c where p.class_id=c.class_id ';
$query = $db_r->prepare($sql);
$query->execute();
$result = $query->fetch();

$cname=$result['class_name'];
$teacher=$result['class_instructor'];
$ccode=$result['class_code'];
$title=$result['title'];
$des=$result['description'];
$cid=$result['class_id'];

$sql2 = 'SELECT COUNT(DISTINCT ce.user_id), p.class_id FROM class_enrolled ce, posts p where p.class_id=ce.class_id';
$query2 = $db_r->prepare($sql2);
$query2->execute();
$result2 = $query2->fetch();

$num_students = $result2["COUNT(DISTINCT ce.user_id)"];
$num_students = $num_students-1;


$sql3 = 'SELECT email from users WHERE user_id=?';
$query3 = $db_r->prepare($sql3);
$query3->execute([$e]);
$result3 = $query3->fetch();

$email= $result3['email'];

$sql4 = "SELECT p.post_id,p.post_type,p.class_id,p.title,p.description,p.time_created,a.assignment_id, a.due_date,a.a_marks, sf.student_id,sf.file_name,
        sf.text_answer, sf.assignment_id, sf.student_file_id  FROM posts p JOIN (SELECT * FROM assignments) a ON p.post_id=a.post_id JOIN student_files sf ON a.assignment_id=sf.assignment_id";
$query4 = $db_r->prepare($sql4);
$query4->execute();
$result4 = $query4->fetch();

$files=$result4['file_name'];
$textanswer=$result4['text_answer'];
$sid=$result4['student_id'];
$aid=$result4['assignment_id'];

$due=$result4['due_date'];
$a_marks=$result4['a_marks'];

$sql5 = 'SELECT sf.student_id, u.firstname, u.lastname from student_files sf,users u where sf.assignment_id=1 and sf.student_id=u.user_id and u.user_type=0';
$query5 = $db_r->prepare($sql5);
$query5->execute();
$result5 = $query5->fetchAll(PDO::FETCH_OBJ);

$countnames=count($result5);

$sql6 = 'SELECT COUNT(user_id) from class_enrolled where class_id=1';
$query6 = $db_r->prepare($sql6);
$query6->execute();
$result6 = $query6->fetch();


$allnames=$result6["COUNT(user_id)"];
$studentso=$allnames;
$notdone=$studentso-$countnames;
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


                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <div class="trips_detail">
                                            <h1 class="breadcrumb-title"><?php echo $cname ?></h1>
											<h4> <?php echo $teacher;?></h4>
                                            <h4>Contact:<?php echo ' '; echo $email;?></h4>

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

                        <!-- Row -->
                        <div class="row">
                            <!-- ============================ Page Title Start================================== -->

                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <!-- Course Style 1 For Student -->
                                <!-- due this week -->

                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">

                                        <div class="dashboard_fl_1 align-items-center">
                                                <div class="ed_detail_wrap">
                                                    <div class="ed_header_caption">
                                                        <h1 class="ed_title">Assignment 1</h1>
                                                        <span class="viewer_location"><?php echo $ccode ?></span>
                                                    <ul>
                                                        <!--<li><i class="ti-calendar"></i>10 - 20 weeks</li>
                          <li><i class="ti-control-forward"></i>102 Lectures</li>-->
                                                        <li><i class="ti-user"></i><?php echo $num_students ?> students enrolled</li>
                                                    </ul>
                                                </div>
                                                <div class="ed_header_short">
                                                  <p>
                                                    <?php echo $des ?>
                                                  </p>
                                                </div>
												<br>
                                                <div class="viewer_package_status">Due on <?php echo $due ?></div>
                                                <!--<div class="viewer_package_status"><?php #echo $student_file_id ?></div>-->
                                                <div class="viewer_package_status"><?php echo $a_marks ?> Marks</div>

                                            </div>
                                        </div>

																				<div class="dashboard_fl_2 align-items-center">
																					<ul class="mb0">
																						<li class="list-inline-item itemfix">

                                        <div class="input-group-append">
                                          <div class= "text-center">
                                                <h1 class="theme-cl"><?php echo $countnames;?></h1><span class="theme-cl">Done</span>

                                          </div>
                                        </div>
																			</li>
																			<li class="list-inline-item itemfix">
                                        <div class="input-group-append">
                                          <div class= "text-center">
                                            <a href="index.php?p=grd-ass-nd">
                                                <h1 class="ed_title test"><?php echo $notdone;?></h1><span class="ed_title">Not Done</span>
																						</a>
																				</div>
                                      </div>
																		</li>
																	</ul>
                                </div>
                              </div>
                            </div>
                        	</div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="row">

                                            <!-- seagreen-->
											<?php
										foreach($result5 as $row){

											$firstname=($row->firstname);
											$lastname=($row->lastname);
											$sid=($row->student_id);
											$_SESSION['student_id']=$sid;
										?>
										<div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="edu_cat_2 cat-1">
                                                    <div class="edu_cat_icons">
                                                        <a class="pic-main" href="#"><img
                                                                src="https://via.placeholder.com/70x70"
                                                                class="img-fluid" alt="" /></a>
                                                    </div>
                                                    <div class="edu_cat_data">
                                                        <h4 class="title"><a href="index.php?p=std-d">
														<?php echo $firstname. " ";echo $lastname;
																?>

														</a></h4>
                                                        <ul class="meta">
                                                            <li class="video"><i class="fas fa-star filled"></i>Done
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
<?php }?>
                                            <!--yellow-->

                                            <!-- <div class="col-lg-4 col-md-6 col-sm-12">
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

                                            <!--Red>

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

                                            <!--green

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

                                            <!--blue

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

                                            <!--Purple

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

                                            <!--pink

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


                                            <!--dark green

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

                                            <!--orange

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

                                            <!--yellow

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

                                            <!--Red>

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
                                            </div>-->



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

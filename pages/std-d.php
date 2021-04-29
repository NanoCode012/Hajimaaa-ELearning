<?php
$value = $_SESSION['student_id'];
$e=$_SESSION['user_id'];
$sql = 'SELECT p.class_id,p.title,p.description,p.time_created,c.class_name, c.class_instructor, c.class_code
		FROM posts p, class c where p.class_id=c.class_id ';
$query = $db_r->prepare($sql);
$query->execute();
$result = $query->fetch();

$cname=$result['class_name'];
$teacher=$result['class_instructor'];
$ccode=$result['class_code'];
$title=$result['title'];
$des=$result['description'];

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

$sql5 = "SELECT firstname, lastname from users where user_id=$value";
$query5 = $db_r->prepare($sql5);
$query5->execute();
$result5 = $query5->fetch();

$fname=$result5['firstname'];
$lname=$result5['lastname'];
$fullname=$fname. " " .$lname;

$post_id=$result4['post_id'];
$student_file_id=$result4['student_file_id'];

if(isset($_POST['submit'])){
	$marks=$_POST['marks']??"";
	$comments=$_POST['comments']??"";

	$sql6="insert into gradeass (student_file_id, marks, comments) VALUES (?,?,?)";
	$query6 = $db_w->prepare($sql6);
	$query6->execute([$student_file_id,$marks,$comments]);
}



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


                <div class="row justify-content-center">

                    <div class="col-lg-9 col-md-9 col-sm-12">

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
                                                    <h1 class="ed_title">Assignment</h1>
                                                    <span class="viewer_location"><?php echo $ccode ?></span>
                                                    <ul>
                                                        <!--<li><i class="ti-calendar"></i>10 - 20 weeks</li>
                          <li><i class="ti-control-forward"></i>102 Lectures</li>-->
                                                        <li><i class="ti-user"></i><?php echo $num_students ?> students enrolled</li>
                                                    </ul>
                                                </div>
                                                <div class="ed_header_short"><?php echo $des ?>
                                                </div>
												<br>
                                                <div class="viewer_package_status">Due on <?php echo $due ?></div>
                                                <!--<div class="viewer_package_status"><?php #echo $student_file_id ?></div>-->
                                                <div class="viewer_package_status"><?php echo $a_marks ?> Marks</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <!-- Course Style 1 For Student -->
                            <!-- due this week -->

                            <div class="dashboard_container">
                                <div class="dashboard_container_header">
                                    <div class="edu_cat_icons">
                                        <a class="pic-main" href="#"><img src="https://via.placeholder.com/70x70"
                                                class="img-fluid" alt="" /></a>
                                    </div>
                                    <div class="edu_cat_data">
                                        <h4 class="edu_title"><?php echo $fullname ?></h4>
                                        <ul class="meta">
                                            <li class="video"><i class="fas fa-star filled"></i>Done</li>
                                        </ul>
                                    </div>
                                </div>



                            </div>


                            <div class="edu_wraper border">
                                <h4 class="edu_title">Assignments</h4>
                                <div id="accordionExample" class="accordion shadow circullum">

                                    <!-- Part 1 -->
                                    <div class="card">
                                        <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne"
                                                    class="d-block position-relative text-dark collapsible-link py-2">
													<?php echo $title?></a></h6>
                                        </div>
                                        <div id="collapseOne" aria-labelledby="headingOne"
                                            data-parent="#accordionExample" class="collapse show">
                                            <div class="card-body pl-3 pr-3">
                                                <ul class="lectures_lists">

                                                    <li>
                                                        <div class="lectures_lists_title"></div>
														<?php
														/*if($query4->rowCount() > 0)
															{ $x=0;
																foreach($result4 as $resultf)
																	{    $x++;           ?>
															<a class="btn btn-theme-2 popupbtn" target="_blank" href="uploads/
															<?php echo $resultf->file_name;?>">View File <?php echo $x; ?></a>

                  <?php }}*/ ?>
                                                        <?php echo $files; ?>
												</li>

                                                    <li>
                                                        <div class="lectures_lists_title"></div>
                                                        <?php echo $textanswer; ?>
												</li>

                                                </ul>
                                            </div>
                                            <div class="edu_wraper">
											<form method="POST">
											<h4 class="edu_title">Scores</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-controll" name="marks"
                                                        placeholder="  Input scores here" required="required">
                                            </div>
                                                    <!--<input type="submit" class="btn btn-theme" value="Upload" method='post'>-->




                                                    <div class="form-group">
                                                    <!-- Submit Reviews -->
                                                    <h4 class="edu_title">Comment</h4>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control ht-140" name="comments"
                                                                    placeholder="Add Private Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <input type="submit" value="Submit" name="submit"
                                                                    class="btn btn-theme">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

											</form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

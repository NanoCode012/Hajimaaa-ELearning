<?php

$class_id =  $_GET["class_id"];

?>
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
                                        <li class="breadcrumb-item active" aria-current="page">Student List</li>
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
                                            <h4>Student List</h4>
                                        </div>
                                        <div class="dashboard_fl_2">
                                            <ul class="mb0">
                                                <li class="list-inline-item">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">
                                      <!-- Row -->
                        							<div class="row">
                        								<div class="col-lg-12 col-md-12 col-sm-12">
                        											<div class="table-responsive">
                        												<table class="table">
                        													<thead class="thead-dark">
                        														<tr>
                        															<th scope="col">No.</th>
                        															<th scope="col">Name</th>
                        															<th scope="col">Action</th>
                        														</tr>
                        													</thead>
                        													<tbody>
                                                    <?php
                                                    $count = 0;
                                                    $sql = "SELECT * FROM class_enrolled WHERE class_id = ?";
                                                    $query = $db_r->prepare($sql);
                                                    $query->execute([$class_id]);
                                                    $rows = $query->fetchAll();
                                                    foreach ($rows as $row) {
                                                      $count++;
                                                      $sql2 = "SELECT * FROM users WHERE user_id = ?";
                                                      $stmt2 = $db_r->prepare($sql2);
                                                      $stmt2->execute([$row["user_id"]]);
                                                      $user = $stmt2->fetch();
                                                      $firstname = $user["firstname"];
                                                      $lastname = $user["lastname"];
                                                      $fullname = ''.$firstname.' '.$lastname;
                                                    ?>
                        														<tr>
                        															<th scope="row"><?php echo $count; ?></th>
                                                      <th scope="row"><?php echo $fullname?></th>
                        															<td>
                        																<div class="dash_action_link">
                        																	<a href="?p=viewpfp&user_id=<?php echo $row["user_id"];?>" class="view">View</a>
                        																</div>
                        															</td>
                        														</tr>
                                                  <?php } ?>
                        													</tbody>
                        												</table>
                        											</div>
                        								</div>
                        							</div>
                        							<!-- /Row -->
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

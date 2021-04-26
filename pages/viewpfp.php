<?php

$current_user_id = $_GET["user_id"];

$sql = 'SELECT user_id, user_type, username, firstname, lastname, email, phone, title, address, city, state, zip, about FROM users WHERE user_id=?';
$stmt = $db_r->prepare($sql);
$stmt->execute([$current_user_id]);
$user = $stmt->fetch();

$user_id = $user["user_id"];
$username = $user["username"];

$firstname = $user["firstname"];
$lastname = $user["lastname"];
$user_type = $user["user_type"];

$short_acc_type = $account_type = "";

$fullname = $firstname . " " . $lastname;

if($user_type == 0) {
  $account_type = "Student";
  $class_text = " Enrolled in";
} else if ($user_type == 1) {
  $account_type = "Teacher";
  $class_text = " Teaching";
}


$email = $user["email"];
$phone = $user["phone"];
$address = $user["address"];
$city = $user["city"];
$state = $user["state"];
$zip = $user["zip"];
$about = $user["about"];
$title = $user["title"];


?>


<body class="red-skin">
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>
    <div id="main-wrapper">

        <!-- Start Navigation -->
        <?php include 'includes/nav.php'; ?>
        <!-- End Navigation -->
        <div class="clearfix"></div>


        <!-- ============================ Dashboard: My Order Start ================================== -->
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
                                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- /Row -->

                        <!-- Row -->
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard_container">
                                    <div class="dashboard_container_body p-4">
                                        <div class="viewer_detail_wraps">
                                            <div class="caption">
                                                <div class="viewer_package_status"> <?php echo $account_type ?> </div>
                                                <div class="viewer_header">
                                                    <h1> <?php echo $fullname; ?> </h1>
                                                    <ul>
                                                        <li><strong>10</strong> Classes <?php echo $class_text; ?></li>
                                                    </ul>
                                                </div>
                                                <!-- archive -->
                                                <div class="viewer_header">
                                                    <ul class="badge_info">
                                                        <!-- <li class="started"><i class="ti-rocket"></i></li>
                                                        <li class="medium"><i class="ti-cup"></i></li>
                                                        <li class="platinum"><i class="ti-thumb-up"></i></li>
                                                        <li class="elite unlock"><i class="ti-medall"></i></li>
                                                        <li class="power unlock"><i class="ti-crown"></i></li> -->
                                                    </ul>
                                                <!-- /archive -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Row -->

                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4>Personal Details</h4>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body p-4">
                                        <!-- Basic info -->
                                        <form>
                                        <div class="submit-section">
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $firstname; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $lastname; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" value="<?php echo $username; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" value="<?php echo $title; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" value="<?php echo $email; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" value="<?php echo $phone; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $address; ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" value="<?php echo $city; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>State</label>
                                                    <input type="text" class="form-control" value="<?php echo $state; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Zip</label>
                                                    <input type="text" class="form-control" value="<?php echo $zip; ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>About</label>
                                                    <textarea
                                                        class="form-control" readonly><?php echo $about; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                      </form>
                                        <!-- Basic info -->
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

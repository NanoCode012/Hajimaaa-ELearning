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

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <!-- ============================ Dashboard: My Order Start ================================== -->
        <section class="gray pt-0">
            <div class="container-fluid">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <!-- Row -->
                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">


                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="row">
                                                <h1 class="breadcrumb-title"> Software Engineering</h1>
                                                <h4>CSS323-2</h4>
                                                <h4>Instructor : Dr. Skibidibaba Hibidibaba</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="row">
                                                <strong>

                                                    <p>Email_ID : <a>biggusDickus@hotmail.com</a></p>
                                                    <p>Contact : +66969696969</p>
                                                </strong>
                                            </div>
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
                                                <div>
                                                    Assignments
                                                </div>
                                                <div class="active">
                                                    Lecture Notes
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
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="lectureControl">
                                                    <!-- <button type="button" class="btn btn-primary btn-sm"
                                                        data-target="#myInquiry" data-toggle="modal"
                                                        data-ordernumber="1122"> Upload Files</button> -->
                                                    <button type="button" class="btn btn-outline-theme"
                                                        id="deleteLect">Delete</button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal" data-whatever="@getbootstrap">Upload
                                                        Lecture</button>
                                                </div>
                                            </div>
                                        </div>


                                        <div id="accordionExample" class="accordion shadow circullum">

                                            <!-- Part 1 -->
                                            <div class="card">
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne"
                                                            class="d-block position-relative text-dark collapsible-link py-2 heading_text">
                                                            Lecture 3: Weeeeeeee
                                                            <!-- <div class='btn_trash'>
                                                                <button><i class='ti-trash'></i></button>
                                                            </div>
                                                            <div class='btn_pencil'>
                                                                <button><i class='ti-pencil'></i></button>
                                                            </div> -->
                                                        </a></h6>
                                                </div>
                                                <div id="collapseOne" aria-labelledby="headingOne"
                                                    data-parent="#accordionExample" class="collapse show">
                                                    <div class="card-body pl-3 pr-3">
                                                        <ul class="lectures_lists">
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-file"></i>Lecture: 01</div>Web
                                                                Designing Beginner
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-file"></i>Lecture: 02</div>Startup
                                                                Designing with HTML5 & CSS3
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Tutorial: 03
                                                                </div>
                                                                How To Call Google Map iFrame
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Tutorial: 04
                                                                </div>
                                                                Create Drop Down Navigation Using CSS3
                                                            </li>
                                                            <li class="unview">
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-pencil-alt"></i>Assignment</div>
                                                                How to
                                                                Create Sticky Navigation Using JS
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Part 2 -->
                                            <div class="card">
                                                <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo"
                                                            class="d-block position-relative collapsed text-dark collapsible-link py-2">Lecture
                                                            2: Hibidibaba</a></h6>
                                                </div>
                                                <div id="collapseTwo" aria-labelledby="headingTwo"
                                                    data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3">
                                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12"> -->
                                                        <!-- <div class="btn-group btn-group-lg btn-group-justified"
                                                            role="group"> -->
                                                        <!-- <div class="btn-group"> -->
                                                        <!-- <button type="button" class="btn btn-primary btn-lg"
                                                                title="Edit"><span class="ti-pencil"></span></button> -->
                                                        <!-- </div> -->
                                                        <!-- <div class="btn-group"> -->
                                                        <!-- <button type="button" class="btn btn-primary btn-lg"
                                                                title="Delete"><span class="ti-trash"></span></button> -->
                                                        <!-- </div> -->
                                                        <!-- </div> -->
                                                        <!-- </div> -->
                                                        <!-- <br></br> -->
                                                        <ul class="lectures_lists">
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 01
                                                                </div>Web
                                                                Designing Beginner
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 02
                                                                </div>
                                                                Startup Designing with HTML5 & CSS3
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 03
                                                                </div>How
                                                                To Call Google Map iFrame
                                                            </li>
                                                            <li class="unview">
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 04
                                                                </div>
                                                                Create Drop Down Navigation Using CSS3
                                                            </li>
                                                            <li class="unview">
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 05
                                                                </div>How
                                                                to Create Sticky Navigation Using JS
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Part 3 -->
                                            <div class="card">
                                                <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                                            data-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree"
                                                            class="d-block position-relative collapsed text-dark collapsible-link py-2">Lecture
                                                            1: Skibidibaba</a></h6>
                                                </div>
                                                <div id="collapseThree" aria-labelledby="headingThree"
                                                    data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body pl-3 pr-3">
                                                        <ul class="lectures_lists">
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 01
                                                                </div>Web
                                                                Designing Beginner
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 02
                                                                </div>
                                                                Startup Designing with HTML5 & CSS3
                                                            </li>
                                                            <li>
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 03
                                                                </div>How
                                                                To Call Google Map iFrame
                                                            </li>
                                                            <li class="unview">
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 04
                                                                </div>
                                                                Create Drop Down Navigation Using CSS3
                                                            </li>
                                                            <li class="unview">
                                                                <div class="lectures_lists_title"><i
                                                                        class="ti-control-play"></i>Lecture: 05
                                                                </div>How
                                                                to Create Sticky Navigation Using JS
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- popup window -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content popupform">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">[COURSE NAME]: Upload Lecture</h5>

                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Lecture title:</label>
                            <input type="text" class="form-control popuptarea" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Lecture description/ Comments:</label>
                            <textarea class="form-control popuptarea" id="message-text"></textarea>
                        </div>


                        <div class="form-group">
                            <label class="col-form-label">Upload files:</label>
                            <div class="choose_file">

                                <label for="choose_file">
                                    <input type="file" id="choose_file" multiple>
                                    <!-- <span>Choose Files</span> -->
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-theme-2 popupbtn" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-theme popupbtn">Create Lecture</button>
                </div>
            </div>
        </div>
    </div>
    <!--end popup window -->

    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="registermodal">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Log In</h4>
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
                                <button button type="submit" class="btn btn-md full-width pop-login">Login</button>
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

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="sign-up">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Sign Up</h4>
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="*******">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
                            </div>

                        </form>
                    </div>

                    <div class="modal-divider"><span>Or Signup via</span></div>
                    <div class="social-login ntr mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link">Go
                                For LogIn</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

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

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="assets/js/metisMenu.min.js"></script>
    <script>
    $('#side-menu').metisMenu();
    </script>
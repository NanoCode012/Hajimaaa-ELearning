<body class="red-skin gray">
    <!-- Preloader - style you can find in spinners.css -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Top header  -->
        <!-- Start Navigation -->
        <div class="header header-light head-shadow">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="?p=landing">
                            <img src="assets/img/hajima_full_logo_black.png" class="logo" alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li class="login_click light">
                                <a href="?p=login">Sign in</a>
                            </li>
                            <li class="login_click bg-red">
                                <a href="?p=register">Sign up</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- Top header  -->
        <section>
            <div class="container">
                <div class="">
                    <div class="">
                        <div class="log_wrap">
                            <br><br><br>
                            <h4>Register an Account</h4>
                            <div class="login-form">
                                <br><br><br>
                                <form action="?p=create_account" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="select_buttonnn center-align">
                                                    <label class="center-align"><input type="radio" name="accSel"
                                                            value="0" checked="checked"><span style="width:500px;"
                                                            class="btn btn-outline-theme btn-rounded center-align">Student</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="select_buttonnn center-align">
                                                    <label class="center-align"><input type="radio" name="accSel"
                                                            value="1"><span style="width:500px;"
                                                            class="btn btn-outline-theme btn-rounded center-align">Teacher</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="firstname" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lastname" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" required>
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                      The username you have chosen already exists! Please choose a new one.
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" name="cpassword" class="form-control" required>
                                    </div>
                                    <div class="social-login mb-3">
                                        <ul>
                                            <li class="right">
                                                <label for="reg" class="checkbox-custom-label">Already have an
                                                    account?</label>
                                                <a href="?p=login" class="theme-cl">Login</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================== End of Login Section =============================== -->
    </div>
    <!-- End Wrapper -->

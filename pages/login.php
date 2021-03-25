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
                            <li class="login_click bg-red">
                                <a href="?p=login">Sign in</a>
                            </li>
                            <li class="login_click light">
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
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="log_wrap">
                            <br><br>
                            <h4>Sign In</h4>
                            <div class="login-form">
                                <br><br><br>
                                <form action="?p=accountmanager" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="social-login mb-3">
                                        <ul>
                                            <li class="right">
                                                <label for="reg" class="checkbox-custom-label">Don't have an
                                                    account?</label>
                                                <a href="?p=register" class="theme-cl">Sign Up</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width pop-login">Login</button>
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
<?php
$user_type = $_SESSION["user_type"];
?>

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
                <ul class="nav-menu">

                  <?php
                  if ($user_type == 0) {
                    echo '<li><a href="?p=courseListStudent">Course List<span class="submenu-indicator"></span></a></li>';
                  } elseif ($user_type == 1) {
                    echo '<li><a href="?p=courseListTeacher">Course List<span class="submenu-indicator"></span></a></li>';
                  }
                  ?>
                    <li><a href="?p=profile">Profile</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="login_click theme-bg">
                        <a href="?p=logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->

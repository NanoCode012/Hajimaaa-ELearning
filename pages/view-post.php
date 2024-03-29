<body class="red-skin">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <?php include 'includes/nav.php'; ?>
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->

        <div class="container">
            <div class="col-lg-12 col-md-9 col-sm-6">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?p=<?php if ($_SESSION['user_type'] == 0) {
                                                                            echo 'now-student';
                                                                        } else {
                                                                            echo 'now-teacher';
                                                                        } ?>&class_id=<?= $_GET['class_id'] ?>"><span
                                            class="ti-angle-left"> Back </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- /Row -->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dashboard_container">
                            <div class="dashboard_container_header">
                                <div class=".dashboard_fl_1">
                                    <?php


                                    $post_id = $_GET['post_id'];
                                    $sql = "select title from posts where post_id=?;";
                                    $query = $db_r->prepare($sql);
                                    $query->execute([$post_id]);
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query) {
                                        foreach ($results as $row) {
                                    ?>
                                    <h3 class="breadcrumb" aria-current="page">
                                        <?php echo htmlentities($row->title) ?><br>
                                    </h3>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    }
                                    ?>
                                    <br>

                                    <?php
                                    $post_id = $_GET['post_id'];
                                    $sql = "select * from posts,users where post_id=? and users.user_id=posts.user_id;";
                                    $query = $db_r->prepare($sql);
                                    $query->execute([$post_id]);
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {
                                    ?>
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4><a
                                                    href="#"><?php echo htmlentities($row->firstname); ?><?php echo " ", htmlentities($row->lastname); ?></a><span
                                                    class="reviews-comments-item-date"><i
                                                        class="ti-calendar theme-cl"></i><?php echo htmlentities($row->time_created) ?></span>
                                            </h4><br>

                                            <p class="breadcrumb" aria-current="page">
                                                <?php echo htmlentities($row->description); ?></p>
                                            <?php $cnt = $cnt + 1;
                                        }
                                    }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard_container_body">

                                <div class="horizontal-line">
                                </div>
                                <!-- Reviews -->
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>comments - <span><?php
                                                                $post_id = $_GET['post_id'];
                                                                $query = "select count(*) from comments,posts where posts.post_id=? and posts.post_id=comments.post_id";
                                                                $queryResult = $db_r->prepare($query);
                                                                $queryResult->execute([$post_id]);
                                                                $count = $queryResult->fetchColumn();
                                                                echo htmlentities($count); ?></span></h3>
                                    </div>
                                    <div class="reviews-comments-wrap">
                                        <!-- reviews-comments-item -->
                                        <?php
                                        $post_id = $_GET['post_id'];
                                        $sql = "select * from comments,posts,users where posts.post_id=? and posts.post_id=comments.post_id and users.user_id=comments.user_id";
                                        $query = $db_r->prepare($sql);
                                        $query->execute([$post_id]);
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                        ?>
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#"><?= $row->firstname ?> <?= $row->lastname ?></a><span
                                                        class="reviews-comments-item-date"><i
                                                            class="ti-calendar theme-cl"></i><?= $row->time_created ?></span>
                                                </h4>

                                                <div class="clearfix"></div>
                                                <p><?= $row->comment ?></p><br>
                                                <br><a
                                                    href="?p=delete-comment&class_id=<?= $_GET['class_id'] ?>&post_id=<?= $_GET['post_id'] ?>&comment_id=<?php echo ($row->comment_id); ?>"><input
                                                        type="image" src="assets/img/trash.svg" width="20" height="20"
                                                        style="float:right"></a>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                        <?php $cnt = $cnt + 1;
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Submit Reviews -->
                                <div class="edu_wraper">
                                    <h4 class="edu_title">Add a Comment</h4>
                                    <div class="review-form-box form-submit">
                                        <form method="post" action="?p=add-comment&class_id=<?= $_GET['class_id'] ?>">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">

                                                        <textarea class="form-control ht-140"
                                                            placeholder="Enter the comment" id="comment" name="comment"
                                                            required></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="post_id"
                                                            value="<?= $_GET['post_id'] ?>">
                                                        <input type="submit" value="Post" name="submit"
                                                            class="btn btn-theme">
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- container body end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
        </div>
    </div>
    <!-- Row -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

    </div>
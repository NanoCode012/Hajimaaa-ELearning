<div class="dashboard_container">
    <?php
    $class_id = $_GET['class_id'];
    $stmt = $db_r->prepare('SELECT c.class_name,c.class_code,c.class_instructor, u.email FROM class c, users u WHERE c.class_id=? AND u.user_id = c.instructor_id');
    $stmt->execute([$class_id]);
    $get = $stmt->fetch();
    ?>
    <div class="dashboard_container_header">
        <div class="dashboard_fl_1">
            <h1><?php echo $get['class_code']; ?> <?php echo $get['class_name']; ?></h1>
            <h4 class="edu_title">Instructor: <?php echo $get['class_instructor'] ?>
            </h4>
            <span class="dashboard_instructor">Email: <?php echo $get['email'] ?></span>
        </div>
    </div>
</div>

<div class="dashboard_container">
    <?php
    $class_id = $_GET['class_id'];
    $stmt = $db_r->prepare('SELECT class_name,class_code,class_instructor FROM class WHERE class_id=?');
    $stmt->execute([$class_id]);
    $get = $stmt->fetch();
    ?>
    <div class="dashboard_container_header">
        <div class="dashboard_fl_1">
            <h1><?php echo $get['class_code']; ?> <?php echo $get['class_name']; ?></h1>
            <h4 class="edu_title">Instructor: <?php echo $get['class_instructor'] ?>
            </h4>
            <span class="dashboard_instructor">Contact: Email@email.com</span>
        </div>
    </div>
</div>

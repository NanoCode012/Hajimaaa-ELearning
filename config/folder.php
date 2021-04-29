<?php

$folders_to_create = array('assets/files', 'assets/files/course_images', 'assets/files/assignments', 'assets/files/student_files', 'assets/files/lectures');

foreach ($folders_to_create as $folder) {
    if (!file_exists($folder)) {
        mkdir($folder, 0755);
    }
}
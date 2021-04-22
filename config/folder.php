<?php

$folders_to_create = array('assets/files',);

foreach ($folders_to_create as $folder) {
    if (!file_exists($folder)) {
        mkdir($folder);
    }
}
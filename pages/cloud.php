<body>

    <?php include 'includes/utils/gcloud.php';
    $gstorage = new GStorage();
    $gstorage->download('file.txt', 'file.txt');
    $gstorage->upload('file2.txt', 'file2.txt');
    ?>
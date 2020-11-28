<?php
    //
    include_once('src/classes/App.class.php');
    include_once('src/classes/minstagram/photo.class.php');
    include_once('src/classes/minstagram/photolist.class.php');

    echo 'Study1 : Start <br>';
    $app = new MyProject\Application();
    $app->info();
    $photo = new minstagram\Photo();
    $photo->info();
    $photolist = new minstagram\PhotoList();
    $photolist->info();
    echo 'Study1 : End <br>';
?>
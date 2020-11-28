<?php
    //
    include_once('src/classes/App.class.php');
    include_once('src/classes/minstagram/photo.class.php');

    echo 'Study1 : Start <br>';
    $app = new Application();
    $app->info();
    $photo = new Photo();
    $photo->info();
    echo 'Study1 : End <br>';
?>
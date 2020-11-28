<?php
    //
    // autoload
    
    spl_autoload_register(function($className){
        echo 'xxxxxx-----------------------<br>';
        
        echo 'spl_autoload_register <br>';
        echo 'Autoload class : '. $className . '<br>';

        //include dirname( path.__FILE__ ) . '/' . str_replace( '\\', '/', $className ) . '.php';
        
        $filePathRef =  'src/classes/'. str_replace( '\\', '/', $className ) . '.php';
        echo '> ' . $filePathRef . '<br>';

        include($filePathRef);


        //echo dirname( __FILE__ ) . '/' . str_replace( '\\', '/', $className ) . '.php <br>';
        //echo '<br> |----| <br>';
        //echo 'Autoload class : '. $className . '<br>';
        echo 'xxxxxx--------------------xxx<br>';
    });
    
    //
    // include_once('src/classes/minstagram/photo.class.php');
    // include_once('src/classes/minstagram/photolist.class.php');

    //include_once('src/classes/Application.php');

    echo 'Study1 : Start <br>';

    //$app = new src\classes\Application();
    //$app = new Application();
    //$app->info();
    
    
    
    //include('src/classes/minstagram/Photo.php');
    
    $photo = new minstagram\Photo();
    //$photo = new Photo();
    $photo->info();
    
    $photolist = new minstagram\PhotoList();
    $photolist->info();
    
    echo 'Study1 : End <br>';
?>



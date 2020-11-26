<?php

    require_once('view.photos.php');
    //require_once('writefile.class.php');

    /*
    $dir = 'minstagram_uploads/';
    $files = scandir($dir, 0);

    $resultA = array();

    for($i = 0; $i < count($files); $i++){
        $file = $files[$i];
        // removing '.' and '..' entries in the files
        if( strcmp ( '.' , $file ) !== 0 ){
            if( strcmp( '..', $file ) !== 0 ){
                // Only for macOS
                if( strcmp( '.DS_Store', $file ) !== 0 ){
                    array_push($resultA, $file);
                }
            }
        }
    }

    $resultJSON = json_encode($resultA);

    echo $resultJSON;
    //echo $root = $_SERVER['DOCUMENT_ROOT'];
    */

    $viewPhotos = new ViewPhotos();
    $folder_data = $viewPhotos->getAllPhotosString();

    //
    /*
    $File = "minstagram_uploads/minstagram.txt"; 
    $Handle = fopen($File, 'w'); //rw-write
    //$Handle = fopen($File, 'a'); //append
    $Data = "John Henry XX \n"; 
    fwrite($Handle, $Data); 
    $Data = "Abigail Yearwood\n"; 
    fwrite($Handle, $Data); 
    print "Data Written"; 
    fclose($Handle); 
    */

    /*
    //Writing to a JSON file
    $writeFileObj = new WriteFile( $viewPhotos->getAllPhotos() );
    $writeFileObj->writeToFile();
    */

?>
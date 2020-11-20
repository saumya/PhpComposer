<?php

$dir = 'minstagram/';
$files = scandir($dir, 0);

$resultA = array();

for($i = 0; $i < count($files); $i++){
    $file = $files[$i];
    // removing '.' and '..' entries in the files
    if( strcmp ( '.' , $file ) !== 0 ){
        if( strcmp( '..', $file ) !== 0 ){
            array_push($resultA, $file);
        }
    }
}

$resultJSON = json_encode($resultA);

echo $resultJSON;
//echo $root = $_SERVER['DOCUMENT_ROOT'];


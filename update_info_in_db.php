<?php
// 
// Version: 1.0.0
//



$app = (function(){
    $get_ui_data = function(){
        // ref: https://www.php.net/manual/en/wrappers.php.php
        $str_json = file_get_contents('php://input');
        $obj = json_decode( $str_json );
        echo $obj->{'title'};
    };
    // 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( isset($_POST) ){
            $get_ui_data();
            // TODO:
            // Get the files data from the folder
            // Make a new Name and save it in DB
            //
        }else{
            echo '{ "result" : "Nothing From FrontEnd" }';
        }
    }else{
        echo '{ "result" : "Not POST X" }';
    }
    //
});

// Execute the function
$app();




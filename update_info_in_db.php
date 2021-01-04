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
//$app();

//
$path = 'minstagram_uploads/';
$extensions = ['jpg', 'jpeg', 'png', 'gif'];
$xfiles = ['.', '..', '.DS_Store', 'minstagram.json','minstagram.txt'];
//$all_files = count($_FILES['files']['tmp_name']);
$all_files = scandir( $path );
$all_image_files = array_diff($all_files,$xfiles);
$num_image_files = count($all_image_files);
$next_file_name = $num_image_files + 1;

echo ( json_encode( $all_files ) );
echo '<br>';
print_r( $all_image_files );
echo '<br>';
echo( 'Next File Name =' . $next_file_name );


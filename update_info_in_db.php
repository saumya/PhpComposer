<?php
// 
// Version: 1.0.0
//

//echo '{ "result" : "Nice From DB" }';
//var_dump( $_POST[""] );

//var_dump( $_POST['name'] );
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo '{ "result" : "POST" }';
    
    if ( isset($_POST) ){
        
        $str_json = file_get_contents('php://input');
        echo $str_json;
        
        /*
        $str_json = file_get_contents('php://input');
        $obj = json_decode( $str_json );
        echo $obj->{'name'};
        */

        //
    }else{
        echo '{ "result" : "Nothing From FrontEnd" }';
    }

}else{
    echo '{ "result" : "Not POST X" }';
}

/*
if (!empty($_POST)){
    //echo '{ "result" : "Nice From DB" }';
    var_dump( $_POST );
}else{
    echo '{ "result" : "Nothing From FrontEnd" }';
}
*/
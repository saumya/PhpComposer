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
    // Database
    $get_last_id = function(){
        
		// ref: https://www.php.net/manual/en/pdostatement.fetch.php
		$PATH_TO_SQLITE_FILE = 'phpsqlite.db';
        $pdo = new \PDO( "sqlite:" . $PATH_TO_SQLITE_FILE );
        //
		$sql = "SELECT * FROM minstagram";
		$result = $db->query( $sql );
		
		//$result->setFetchMode(PDO::FETCH_ASSOC);
		//$data = json_encode( $result->fetchAll() );
		
        //return $data;
        
        return 'get_last_id';
	};
    // Database/
    //
    $create_file_name = function(){
        $path = 'minstagram_uploads/';
        $extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $xfiles = ['.', '..', '.DS_Store', 'minstagram.json','minstagram.txt'];
        $all_files = scandir( $path );
        $all_image_files = array_diff($all_files,$xfiles);
        $num_image_files = count($all_image_files);
        $next_file_name = $num_image_files + 1;
        return $next_file_name;
    };
    // 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( isset($_POST) ){
            // Data from UI, the user typed title of the image
            $get_ui_data();
            
            // Get the files data from the folder & Make a new Name and save it in DB
            echo $create_file_name();
            //
            // TODO: Check the DB and get the last id from the table
            echo $get_last_id();
            //
        }else{
            echo '{ "result" : "Nothing From FrontEnd" }';
        }
    }else{
        echo '{ "result" : "Not POST X" }';
    }
    //
});

// =================================================
// Execute the function
//$app();
// =================================================

//
/*
$path = 'minstagram_uploads/';
$extensions = ['jpg', 'jpeg', 'png', 'gif'];
$xfiles = ['.', '..', '.DS_Store', 'minstagram.json','minstagram.txt'];
$all_files = scandir( $path );
$all_image_files = array_diff($all_files,$xfiles);
$num_image_files = count($all_image_files);
$next_file_name = $num_image_files + 1;

echo ( json_encode( $all_files ) );
echo '<br>';
print_r( $all_image_files );
echo '<br>';
echo( 'Next File Name =' . $next_file_name );
*/

//print_r( $GLOBALS['g_file_name'] );

$get_last_id = function(){
    // ref: https://www.php.net/manual/en/pdostatement.fetch.php
    $PATH_TO_SQLITE_FILE = 'phpsqlite.db';
    $pdo = new \PDO( "sqlite:" . $PATH_TO_SQLITE_FILE );
    $sql = "SELECT * FROM minstagram";
    $sth = $pdo->prepare( $sql );
    $sth->execute();
    //$result = $sth->fetchAll();
    //$result = $sth->fetchAll( PDO::FETCH_ASSOC );
    
    //echo count($result);
    //echo json_encode($result);
    //print_r($result);
    //
    
    $result = $sth->fetchAll();
    for ($i = 0; $i < count($result); $i++)  {
        //echo $result[$i] ."<br />";
        /*
        for($j = 0; $j< count($result[$i]); $j++) {
            echo $result[$i][$j]."<br />";
        }
        */
        $row = $result[$i];
        //echo $row['id'] . ' | ' . $row['title'] . ' | ' . $row['photo_name'] . ' | ' . $row['photo'] .'<br/>';
        echo $row['id'] . ' | title=' . $row['title'] . ' | name=' . $row['photo_name'] . '<br/>';
    }
    
    //$result = $sth->fetchAll( PDO::FETCH_ASSOC );

    //
    //echo 'get_last_id';
};
$get_last_id();
//


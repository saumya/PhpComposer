<?php 
	// Setting the Server Time Zone
	date_default_timezone_set('Asia/Kolkata');

	require_once('view.photos.php');
	require_once('writefile.class.php');
	
	//$g_file_name = 'xxxxx';
	
	//require_once ('vendor/autoload.php');
	
	//use Monolog\Logger;
	//use Monolog\Handler\StreamHandler;
	//use Monolog\Formatter\LineFormatter;
	
	//use minstagram\DBService;
	

	//print_r($_FILES);
	/*
	$log_file_name = 'my_monolog.log';
	$streamHandler = new StreamHandler( $log_file_name, Logger::DEBUG);
	$logger = new Logger('MINSTAGRAM_LOGGER');
	$logger->pushHandler( $streamHandler );
	$logger->info('upload to minstagram');
	*/

	/*
	$log_file_name = 'my_monolog.log';
	
	
	// Formatting the Logger
	// the default date format is "Y-m-d\TH:i:sP"
	$dateFormat = "Y n j, g:i:s a";
	// the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
	$output = "%datetime% > %level_name% > %message% %context% %extra%\n";
	// finally, create a formatter
	$formatter = new LineFormatter($output, $dateFormat);

	
	// Logger
	$streamHandler = new StreamHandler( $log_file_name, Logger::DEBUG);
	$streamHandler->setFormatter($formatter);

	$logger = new Logger('MINSTAGRAM_LOGGER');
	$logger->pushHandler( $streamHandler );
	
	$logger->info('upload to minstagram');
	*/

	//$db_service = new DBService( $logger );

	// Utilty test for the implementation
	// $numFiles = getImageFolderDetails();
	// write_json_file();
	//
	

	//
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_FILES['files'])) {
			$errors = [];
			//$path = 'uploads/';
			$path = 'minstagram_uploads/';
			$extensions = ['jpg', 'jpeg', 'png', 'gif'];
			$all_files = count($_FILES['files']['tmp_name']);
			//
			//$result = false;
			$aResult = array();

			for ($i = 0; $i < $all_files; $i++) {
				
				// Name the uploaded file
				$file_name = $_FILES['files']['name'][$i];
				$file_tmp = $_FILES['files']['tmp_name'][$i];
				$file_type = $_FILES['files']['type'][$i];
				$file_size = $_FILES['files']['size'][$i];
				$file_ext = strtolower(end(explode('.', $_FILES['files']['name'][$i])));
				
				$file = $path . $file_name;
				$file_name_in_server = $path . ( $numFiles = getImageFolderDetails()+1 ) . '.' . $file_ext;
				
				if (!in_array($file_ext, $extensions)) {
					$errors[] = 'Extension not allowed: FullName=' . $file_name . ' extension=' . $file_ext . ' type=' . $file_type;
				}// if
				if ($file_size > 2097152) {
        			$errors[] = 'File size exceeds limit: FullName=' . $file_name . ' extension=' . $file_ext . ' type=' . $file_type;
        		}// if
				if (empty($errors)) {
					
					// write to DB
					//$db_service->savePhoto( $file_name, file_get_contents( $file_tmp ) );
					
					//$logger->info('Upload in progress ...');
					// sending Logger as first param
					//save_photo_in_db( $logger, $file_name, file_get_contents( $file_tmp ) );
					
					// Database and putting the file in the database
					save_photo_in_db( $file_name, file_get_contents( $file_tmp ) );

					// Move the file to desired location
					//$result = move_uploaded_file($file_tmp, $file);
					$result = move_uploaded_file($file_tmp, $file_name_in_server); // Renaming the uploaded file in server
					array_push( $aResult, $result);
				}// if

			}// for

			//echo json_encode($aResult);
			
			writeTheResultForFrontEnd($aResult); 
			write_json_file();

			if ($errors) print_r($errors);

		}// if
	} // if

	function writeTheResultForFrontEnd($aResult){
		// This is needed for the Front-End Application
		// Unless we write something back, the Frontend application can not know
		// the return type from the server.
		// Frontend is waiting for a return from the fetch() call, that did trigger this file
		//
		$resultJSON = json_encode($aResult);
		echo $resultJSON;
	}

	function write_json_file(){
		$viewPhotos = new ViewPhotos();
		//Writing to a JSON file
		$writeFileObj = new WriteFile( $viewPhotos->getAllPhotos() );
		$writeFileObj->writeToFile();
	}

	// Database services
	//$PATH_TO_SQLITE_FILE = 'phpsqlite.db';
	function db_connect(){
		$PATH_TO_SQLITE_FILE = 'phpsqlite.db';
		$pdo = new \PDO( "sqlite:" . $PATH_TO_SQLITE_FILE );
		return $pdo;
	} 
	function save_photo_in_db($f_name, $file_data_to_store){
		$pdo = db_connect();
		$sql = "INSERT INTO minstagram(photo_name, photo)" . "VALUES(:p_name, :p_data)";
		$stmt = $pdo->prepare($sql);
		try {
			$stmt->bindParam(':p_name', $f_name);
			$stmt->bindParam(':p_data', $file_data_to_store, \PDO::PARAM_LOB);
			$stmt->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
			//$logger->info( 'ERROR : In Database Operation' );
			//$logger->info( print ($e->getMessage()) );
		}
		
	}
	function get_last_id(){
		// ref: https://www.php.net/manual/en/pdostatement.fetch.php
		$pdo = db_connect();
		$sql = "SELECT * FROM minstagram";
		$result = $db->query( $sql );
		//$datapie = array();
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$data = json_encode( $result->fetchAll() );
		//$data = json_encode($datapie);
		return $data;
	}
	// Database services/

	// Utility
	function getImageFolderDetails(){
		// Image files count
		$files = scandir('minstagram_uploads/');
		$files_only = array_diff( $files, array('..', '.', '.DS_Store', 'minstagram.json', 'minstagram.txt') );
		$num_images_on_this_folder = count($files_only);
		//print_r($files);
		//print('Total files='. $num_images_on_this_folder );
		//echo '<br>';
		//print_r($files_only);
		//
		return $num_images_on_this_folder;
	}
	// Utility/


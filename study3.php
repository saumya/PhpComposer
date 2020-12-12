<?php

require_once ('vendor/autoload.php');

//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;

use ray\utils\RayFile;

include_once('writefile.class.php');


echo 'Study3 <br>';
echo '' . __FILE__ . ' <br>';

//$log_file_name = getcwd().'/my_monolog.log';
//$log_file_name = 'my_monolog.log';
//$log_file_name = __DIR__.'/my_monolog.log';

//$streamHandler = new StreamHandler( $log_file_name, Logger::DEBUG);

/*
$logger = new Logger('minstagram_logger');
$logger->pushHandler( $streamHandler );

$logger->info('Study3 : applicatioin :');
*/
/*
$writeService = new WriteFile();
$writeService->find_all_files_and_write_info_to_a_file();
*/

$rayFile = new RayFile('/');
//var_dump( $rayFile->getFiles() );
$rayFile->getFilesAsJSON();
//
echo '<br>---------------------------<br>';
var_dump( $rayFile->getFolders() );
echo '<br>---------------------------<br>';

echo '<br>'.'Study3 : End'.'<br>';
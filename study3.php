<?php

require_once ('vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;



echo 'Study3 <br>';
echo '' . __FILE__ . ' <br>';

//$log_file_name = getcwd().'/my_monolog.log';
$log_file_name = 'my_monolog.log';
//$log_file_name = __DIR__.'/my_monolog.log';

$streamHandler = new StreamHandler( $log_file_name, Logger::DEBUG);
$logger = new Logger('minstagram_logger');
$logger->pushHandler( $streamHandler );

$logger->info('Study3 : applicatioin :');

echo '<br>'.'Study3 : End'.'<br>';
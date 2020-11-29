<?php
// Composer Autoload

//echo 'dir ='.__DIR__.'<br>';
//echo realpath('vendor/autoload.php');

//require_once realpath('vendor/autoload.php');
require_once ('vendor/autoload.php');

echo '<br> --- <br>';
echo '<br>' . __DIR__ . '<br>';
echo '<br>' . Monolog\Logger::class . '';
echo '<br>' . Monolog\Handler\StreamHandler::class . '';
echo '<br>' . Monolog\Handler\FirePHPHandler::class . '';
echo '<br>';
echo '<br> --- <br>';

$logger = new Monolog\Logger('minstagram_logger');
//$logger->pushHandler(new Monolog\Handler\StreamHandler(__DIR__.'/my_monolog.log', Logger::DEBUG));
//$logger->pushHandler(new Monolog\Handler\FirePHPHandler());
//$logger->info('My logger is now ready');

//$logger->pushHandler(new Monolog\Handler\StreamHandler(__DIR__.'/my_monolog.log', Logger::DEBUG));
//$logger->info('Adding a new user', ['username' => 'Seldaek']);

/*
// Monolog
$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('my_monolog.log', Logger::WARNING));
// add records to the log
$log->warning('Foo');
$log->error('Bar');
*/

$RayObj = new \ray\Ray();

new \ray\Group();
new \ray\utils\Person();

new \minstagram\Photo();
new \minstagram\PhotoList();

?>
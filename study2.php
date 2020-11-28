<?php
// Composer Autoload

//echo 'dir ='.__DIR__.'<br>';
//echo realpath('vendor/autoload.php');

//require_once realpath('vendor/autoload.php');
require_once ('vendor/autoload.php');

echo '<br> --- <br>';


$RayObj = new \ray\Ray();

new \ray\Group();
new \ray\utils\Person();

new \minstagram\Photo();
new \minstagram\PhotoList();

?>
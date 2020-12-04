<?php

require_once ('vendor/autoload.php');

use ray\Ray;
use ray\Group;

use minstagram\Photo;
use minstagram\PhotoList;

use ray\utils\Person;
use ray\utils\TestSQLite;


new Ray();
new Group();
echo '<br> ---------------------- <br>';
new Photo();
new PhotoList();
echo '<br> ---------------------- <br>';
new Person();
$testSQLite = new TestSQLite();
$testSQLite->connect();




echo '<br> ---------------------- END<br>';
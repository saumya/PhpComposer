<?php

// Setting the Server Time Zone
date_default_timezone_set('Asia/Kolkata');

//$dateFormat = "Y n j, g:i:s a";
$dateFormat = "F j, Y, g:i:s a";

$d = date($dateFormat) ;
echo $d;

//echo "$d Hello from SERVER";

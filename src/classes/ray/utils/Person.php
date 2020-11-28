<?php
namespace ray\utils;

class Person
{
    public function __construct(){
        echo 'Person : Construct <br>';
    }
    public function __destruct(){
        echo 'Person : Destruct : x <br>';
    }
}

?>
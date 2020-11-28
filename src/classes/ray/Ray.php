<?php
namespace ray;

class Ray
{
    public function __construct(){
        echo 'Ray : Construct <br>';
    }
    public function __destruct(){
        echo 'Ray : Destruct : x <br>';
    }
}

?>
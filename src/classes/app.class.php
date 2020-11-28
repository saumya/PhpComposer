<?php
namespace MyProject;

class Application {
    public function __construct(){
        echo 'App.class : Application : Construct <br>';
    }
    public function __destruct(){
        echo 'App.class : Application : Destruct <br>';
    }

    public function info(){
        echo 'App.class : Application : Application Entry <br>';
    }
}

?>
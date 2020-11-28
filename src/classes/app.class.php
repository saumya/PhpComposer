<?php

class Application {
    public function __construct(){
        echo 'App.class.php : Application : Construct <br>';
    }
    public function __destruct(){
        echo 'App.class.php : Application : Destruct <br>';
    }

    public function info(){
        echo 'App.class.php : Application : Application Entry <br>';
    }
}

?>
<?php

class Application {
    public function __construct(){
        echo 'App.class.php : Application : Constructor <br>';
    }
    public function __destruct(){
        echo 'App.class.php : Application : Destructor <br>';
    }

    public function info(){
        echo 'App.class.php : Application : Application Entry <br>';
    }
}

?>
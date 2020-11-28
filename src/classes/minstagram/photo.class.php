<?php
    //
    class Photo {
        public function __construct(){
            echo 'photo.class : Photo : Construct <br>';
        }
        public function __destruct(){
            echo 'photo.class : Photo : Destruct <br>';
        }
        public function info(){
            echo 'photo.class : Photo : info <br>';
        }
    }
?>
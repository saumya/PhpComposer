<?php
    //
    namespace minstagram;
    
    class Photo {
        public function __construct(){
            echo 'photo : Photo : Construct <br>';
        }
        public function __destruct(){
            echo 'photo : Photo : Destruct : x <br>';
        }
        public function info(){
            echo 'photo : Photo : info <br>';
        }
    }
?>
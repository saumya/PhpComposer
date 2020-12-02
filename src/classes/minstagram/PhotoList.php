<?php
    //
    namespace minstagram;
    
    class PhotoList {
        public function __construct(){
            echo 'photolist.class : PhotoList : Construct <br>';
        }
        public function __destruct(){
            echo 'photolist.class : PhotoList : Destruct : x <br>';
        }
        public function info(){
            echo 'photolist.class : PhotoList : info <br>';
        }
    }
?>
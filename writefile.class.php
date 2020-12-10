<?php
/** 
* writefile.class.php
* version: 1.0.0
* usage: Writes to a JSON file
*
*/

class WriteFile {

    private $photo_dir = 'minstagram_uploads/';
    private $allPhotos = [];
    private $fileToWrite = "minstagram_uploads/minstagram.json";
    private $dataToWrite = '';
    
    function __construct( $data=null ){
        $this->dataToWrite = $data;
    }
    
    public function writeToFile(){
        $Handle = fopen( $this->fileToWrite, 'w' );
        
        $jsonString = '';
        $jString = '';
        $count = 0;
        
        foreach( $this->dataToWrite as $key=>$fileObj ){
            $count++;
            if( count($this->dataToWrite) == $count ){
                $jString .= '{"file":"' . $fileObj . '"}';
            }else{
                $jString .= '{"file":"' . $fileObj . '"},';
            }
        }
        $jsonString = '[' . $jString . ']' ;

        //fwrite( $Handle, '[' );
        //fwrite( $Handle, $jString );
        //fwrite( $Handle, ']' );

        fwrite( $Handle, $jsonString );
        fclose( $Handle );
    }

    public function find_all_files_and_write_info_to_a_file(){
        echo '<br> find_all_files_and_write_info_to_a_file : wip <br><br>';
        
        $aPhotos = $this->getPhotos();
        foreach ($aPhotos as $key => $value) {
            /*
            echo "$key => $value" . filesize($value) . '<br>';
            
            foreach( pathinfo($value) as $k => $itemDetails){ 
                echo $k . '=' . $itemDetails . '<br>'; 
            }
            */
            echo filesize( $value ) . '<br>';
            
        }
        

        echo '<br> find_all_files_and_write_info_to_a_file : wip <br>';
    }

    private function getPhotos(){
        $files = scandir( $this->photo_dir , 0 );
        //$resultA = array();
        for($i = 0; $i < count($files); $i++){
            $file = $files[$i];
            $extension = pathinfo($file,PATHINFO_EXTENSION);
            if( $extension == 'jpg' ){
                array_push( $this->allPhotos, $file );
            }
        }// for
        return $this->allPhotos;
    }

    function __destruct(){
        //echo 'WriteFile : Destruction';
    }
}


?>
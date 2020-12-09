<?php
/** 
* writefile.class.php
* version: 1.0.0
* usage: Writes to a JSON file
*
*/

class WriteFile {

    private $fileToWrite = "minstagram_uploads/minstagram.json";
    private $dataToWrite = '';
    
    function __construct( $data ){
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

    function __destruct(){
        //echo 'WriteFile : Destruction';
    }
}


?>
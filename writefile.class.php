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
        //echo 'WriteFile : Construction';
        $this->dataToWrite = $data;
        //$this->writeToFile();
    }
    
    public function writeToFile(){
        
        //$File = "minstagram_uploads/minstagram.txt"; 
        //$Handle = fopen($File, 'w'); //rw-write
        //$Handle = fopen($File, 'a'); //append
        //$Data = "John Henry XX \n"; 
        //fwrite($Handle, $Data); 
        //$Data = "Abigail Yearwood\n"; 

        $Handle = fopen( $this->fileToWrite, 'w' );
        
        $jsonString = '';
        $jString = '';
        $count = 0;
        //echo '<br>Total='.count($this->dataToWrite).'total';
        foreach( $this->dataToWrite as $key=>$fileObj ){
            $count++;
            //echo '<br> Count-'.$count;
            //echo '<br>' . $key . '--';
            //$jString .= '{"file":"' . $fileObj . '"},';
            if( count($this->dataToWrite) == $count ){
                //echo '<br>------------ END -------------- LOOP';
                $jString .= '{"file":"' . $fileObj . '"}';
            }else{
                $jString .= '{"file":"' . $fileObj . '"},';
            }
        }
        $jsonString = '[' . $jString . ']' ;

        //fwrite( $Handle, '[' );
        //fwrite( $Handle, $jString );
        //fwrite( $Handle, ']' );

        //echo '<br>';
        //echo $jsonString;

        fwrite( $Handle, $jsonString );

        fclose( $Handle );

    }

    function __destruct(){
        //echo 'WriteFile : Destruction';
    }
}


?>
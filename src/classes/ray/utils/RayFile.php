<?php
namespace ray\utils;

class RayFile
{
    private $path = '';
    private $aFiles = array();
    private $aFolders = array();

    function __construct( $file_path )
    {
        $this->path = $file_path;
        $this->getDetails($file_path);
    }
    function __destruct()
    {
        //
    }

    public function getFiles()
    {
        return $this->aFiles;
    }
    public function getFolders()
    {
        return $this->aFolders;
    }

    private function getDetails($path)
    {
        $files = scandir($path, 0);
        foreach ($files as $key => $file) {
            //echo 'key-' . $key . ' : file-' . $file . ' | ' . filesize( $path.'/'.$file ) / 1000 .'kb <br>';
            $full_file_path = $path.'/'.$file;
            if( is_dir($full_file_path) ){
                //echo '<strong>Folder-</strong>' . $full_file_path . ' ';
                //echo ' ' . date ( "Y F d H:i:s.", filemtime( $full_file_path ) ) . '<br>';
                array_push( $this->aFolders, array('folder'=> $full_file_path, 'time'=>filemtime( $full_file_path )) );
            }else{
                //echo '';
                //echo $file . '  <strong>' . filesize( $full_file_path ) / 1000 .'kb</strong> ';
                //echo ' ' . date ( "Y d H:i:s.", filemtime( $full_file_path ) );
                //echo '<br>';
                array_push( $this->aFiles, array('file'=>$full_file_path, 'size'=>filesize( $full_file_path ), 'time'=>filemtime( $full_file_path ) ) );
            }
            
        }
    }


}


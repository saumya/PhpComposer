<?php
namespace minstagram;


class DBService
{
    const PATH_TO_SQLITE_FILE = 'phpsqlite.db';
    private $pdo;
    private $file_data;

    public function __construct( $file_data_to_store )
    {
        echo '<br> DBService : Construct <br>';
        $this->file_data = $file_data_to_store;
        $this->init();
    }

    
    public function init()
    {
        echo '<br> DBService : init <br>';
        $this->connect();
        $this->createTable( $this->pdo );
    }

    public function savePhoto()
    {
        echo '<br> DBService : savePhoto <br>';
        //return $this->file_data;
        $photo_data = $this->file_data;
        $sql = "INSERT INTO minstagram(photo)" . "VALUES(:photo_data)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
    
    private function connect()
    {
        if($this->pdo == null){
            $this->pdo = new \PDO( "sqlite:" . DBService::PATH_TO_SQLITE_FILE );
        }
        return $this->pdo;
    }
    private function createTable($db)
    {   
        echo 'DBService : createTable <br>';
        // Wrap your code in a try statement and catch PDOException
        try {    
            // ...SQLite stuff...
            
            $db->exec(
                "CREATE TABLE IF NOT EXISTS minstagram (
                    id INTEGER PRIMARY KEY, 
                    title TEXT,
                    photo BLOB, 
                    value TEXT)"
                );
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    

    public function __destruct()
    {
        echo '<br> DBService : Destruct <br>';
    }
}
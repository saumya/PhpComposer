<?php
namespace minstagram;


class DBService
{
    const PATH_TO_SQLITE_FILE = 'phpsqlite.db';

    private $logger;
    private $pdo;
    private $file_data;

    public function __construct( $logger )
    {
        //echo '<br> DBService : Construct <br>';
        $logger->info('DBService : Construct');
        $this->logger = $logger;
        //$this->file_data = $file_data_to_store;
        $this->init();
    }

    
    public function init()
    {
        //echo '<br> DBService : init <br>';
        $this->logger->info('DBService : init');

        $this->connect();
        $this->createTable( $this->pdo );
    }

    public function savePhoto( $f_name, $file_data_to_store)
    {
        //echo '<br> DBService : savePhoto <br>';
        $this->logger->info('DBService : savePhoto');
        //$this->logger->info( $file_data_to_store );
        /*
        if (!file_exists($file_data_to_store))
        {
            $this->logger->info( "DBService : File not found." );
            //throw new \Exception("File %s not found.");
        }
        */
        
        //$this->file_data = $file_data_to_store;

        //return $this->file_data;
        //$photo_data = $this->file_data;
        //$pathToFile = $file_data_to_store;
        //$fh = fopen($pathToFile, 'rb');
        
        $sql = "INSERT INTO minstagram(photo_name, photo)" . "VALUES(:p_name, :p_data)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':p_name', $f_name);
        $stmt->bindParam(':p_data', $file_data_to_store, \PDO::PARAM_LOB);
        
        $stmt->execute();
        //fclose($fh);
    }
    
    private function connect()
    {
        $this->logger->info('DBService : connect');
        if($this->pdo == null){
            $this->pdo = new \PDO( "sqlite:" . DBService::PATH_TO_SQLITE_FILE );
        }
        return $this->pdo;
    }
    private function createTable($db)
    {   
        $this->logger->info('DBService : createTable');
        //echo 'DBService : createTable <br>';
        // Wrap your code in a try statement and catch PDOException
        try {    
            // ...SQLite stuff...
            
            $db->exec(
                "CREATE TABLE IF NOT EXISTS minstagram (
                    id INTEGER PRIMARY KEY, 
                    title TEXT,
                    photo BLOB, 
                    photo_name TEXT)"
                );
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    

    public function __destruct()
    {
        $this->logger->info('DBService : Destruct');
        //echo '<br> DBService : Destruct <br>';
    }
}
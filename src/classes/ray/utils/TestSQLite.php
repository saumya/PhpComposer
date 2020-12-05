<?php

namespace ray\utils;



class TestSQLite 
{
    const PATH_TO_SQLITE_FILE = 'phpsqlite.db';
    private $pdo;

    public function __construct()
    {
        echo 'TestSQLite : Construct <br>';
    }
    public function connect()
    {
        if($this->pdo == null){
            $this->pdo = new \PDO( "sqlite:" . TestSQLite::PATH_TO_SQLITE_FILE );
        }
        return $this->pdo;
    }
    public function connect_and_initialise_tables(){
        if($this->pdo == null){
            $this->pdo = new \PDO( "sqlite:" . TestSQLite::PATH_TO_SQLITE_FILE );
        }
        $this->createTable( $this->pdo );
        return $this->pdo;
    }
    private function createTable($db)
    {   
        echo 'TestSQLite : createTable <br>';
        // Wrap your code in a try statement and catch PDOException
        try {    
            // ...SQLite stuff...
            // Creating a table
            $db->exec(
                "CREATE TABLE IF NOT EXISTS myTable (
                    id INTEGER PRIMARY KEY, 
                    title TEXT, 
                    value TEXT)"
                );
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function __destruct()
    {
        echo 'TestSQLite : Destruct x <br>';
    }
}

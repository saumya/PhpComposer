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
    public function __destruct()
    {
        echo 'TestSQLite : Destruct x <br>';
    }
}

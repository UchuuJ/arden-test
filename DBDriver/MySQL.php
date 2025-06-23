<?php
namespace DBDriver;

use PDO;
use PDOException;

class MySQL{
    private $host;
    private $db;
    private $username;
    private $pass;
    private $charset = 'utf8mb4';
    private $pdo;
    private $query;

    /**
     * Loads .env Config and sets up PDO
     */
    function __construct()
    {
        $LoadConfig = new LoadConfig();
        $LoadConfig->load($this->host,$this->username,$this->pass,$this->db);
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->pass, $options);
        } catch (PDOException $e) {
            echo $e->getMessage()."\n";
            echo $e->getTraceAsString();
            exit;
        }
    }

    /**
     * Builds our select query very basic and only supports limit
     */

    function select(array $columns, $table, $options=null)
    {
        $optionString = '';
        if(!empty($options)){
            if(isset($options['LIMIT'])) {
                //Only going to support limit for now
                $optionString = ' LIMIT '.$options['LIMIT'];
            }
        }

        $this->query = $this->pdo->query("SELECT ".implode(',',$columns)." FROM ".$table.$optionString);
        return $this;
    }

    function execute(){
        $queryResults = [];
        while($row = $this->query->fetch(PDO::FETCH_ASSOC)){
            $queryResults[] = $row;
        }
        return $queryResults;
    }

}
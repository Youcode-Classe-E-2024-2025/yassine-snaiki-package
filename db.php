<?php
class Database {
    private $connection;
    public function __construct($dsn) {
        $this->connection = new PDO($dsn);
    }
    public function query($query,$params=[]) {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
}

$dsn = 'pgsql:host=localhost;port=8885;dbname=packagesdb;user=postgres;password=0000;';
$db = new Database($dsn);;

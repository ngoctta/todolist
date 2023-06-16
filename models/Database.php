<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "todolist";
    private $port = 8889;

    public function getConnection(): PDO
    {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->database";
        try {
            $connection = new PDO($dsn, $this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $exception) {
            echo "Error connecting to the database: " . $exception->getMessage();
            exit;
        }
    }
}
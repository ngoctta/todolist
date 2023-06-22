<?php

class User
{
    private $connection;

    private $table = "users";

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getPasswordByUsername($username): ?string
    {
        $query = "SELECT password FROM $this->table WHERE username = :username";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data['password'] ?? null;
    }
}
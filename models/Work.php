<?php

class Work
{
    private $connection;

    private $table = "works";

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllWorks()
    {
        $query = "SELECT * FROM $this->table";
        $statement = $this->connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWorkById($id): array
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createWork($data): void
    {
        $now = date('Y-m-d h:i:s');
        $query = "INSERT INTO $this->table (name, start_date, end_date, 
            status, created_at, updated_at) 
            VALUES (:name, :start_date, :end_date, :status, '" . $now . "', '" . $now . "')";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':name', $data['name']);
        $statement->bindParam(':start_date', $data['start_date']);
        $statement->bindParam(':end_date', $data['end_date']);
        $statement->bindParam(':status', $data['status']);
        $statement->execute();
    }

    public function updateWork($id, $data): void
    {
        $now = date('Y-m-d h:i:s');
        $query = "UPDATE $this->table 
            SET name = :name, 
                start_date = :start_date, 
                end_date = :end_date, 
                status = :status,
                updated_at = '" . $now . "'
            WHERE id = :id";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':name', $data['name']);
        $statement->bindParam(':start_date', $data['start_date']);
        $statement->bindParam(':end_date', $data['end_date']);
        $statement->bindParam(':status', $data['status']);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }


    public function deleteWork($id): void
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
}


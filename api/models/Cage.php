<?php
class Cage {
    private $conn;
    private $table = "cages";

    public function __construct($db) {
        $this->conn = $db;
    }

    private function cageExists($name) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name = :name LIMIT 1");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
 
    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, capacity, emplacement,typeCage, status, notes) VALUES (:name, :capacity, :emplacement,:typeCage, :status, :notes)");
        return $stmt->execute($data);
    }

    public function update($id,$fields) {
        $setParts = [];
        $values = [];
    
        foreach ($fields as $key => $value) {
            $setParts[] = "$key = :$key";
            $values[":$key"] = $value;
        }
    
        $sql = "UPDATE {$this->table} SET " . implode(', ', $setParts) . " WHERE id = :id";
        $values[":id"] = $id;
    
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($values);
        
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} order by id desc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

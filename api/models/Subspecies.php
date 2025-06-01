<?php
class Subspecies {
    private $conn;
    private $table = "subspecies";

    public function __construct($db) {
        $this->conn = $db;
    }
   
    public function create($data) {

        $stmt = $this->conn->prepare("INSERT INTO {$this->table}
            (name, speciesId, characteristiq)
            VALUES (:name, :speciesId, :characteristiq)");

        return $stmt->execute($data);
    }
 
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT r.*, s.name as parent FROM {$this->table} r,species s WHERE r.speciesId=s.id order by id desc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUUUID($id) {
        $stmt = $this->conn->prepare("SELECT r.*, s.name as parent FROM {$this->table} r,species s WHERE r.uuid = :uuid and r.speciesId=s.id");
        $stmt->bindParam(':uuid', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
   
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT r.*, s.name as parent FROM {$this->table} r,species s WHERE r.id = :id and r.speciesId=s.id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    // Supprimer une espèce
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

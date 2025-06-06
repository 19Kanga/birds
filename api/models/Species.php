<?php
class Species {
    private $conn;
    private $table = "species";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer une espèce
    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table}
            (name, scienticname, origin, size, lifespan, pu)
            VALUES (:name, :scienticname, :origin, :size, :lifespan, :pu)");

        return $stmt->execute($data);
    }

    // Récupérer toutes les espèces
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} order by id desc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUUUID($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE uuid = :uuid");
        $stmt->bindParam(':uuid', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Récupérer une espèce par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une espèce
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

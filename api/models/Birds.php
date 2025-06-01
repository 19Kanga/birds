<?php
class Birds {
    private $conn;
    private $table = "birds";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer une espèce
    public function create($data) {
        // var_dump($data);
        $stmt = $this->conn->prepare("INSERT INTO {$this->table}
            (name, speciesId, subSpeciesId, cageId, gender, old, type, status,weight,description)
            VALUES (:name, :speciesId, :subSpeciesId, :cageId, :gender, :old, :type, :status,:weight,:description)");

        return $stmt->execute($data);
    }

    // Récupérer toutes les espèces
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT b.*, s.name as species, sb.name as subspecies  FROM {$this->table} b, species s, subspecies sb where b.speciesId=s.id and sb.id=b.subSpeciesId order by id desc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUUUID($id) {
        $stmt = $this->conn->prepare("SELECT b.*, s.name as species, sb.name as subspecies  FROM {$this->table} b, species s, subspecies sb  WHERE b.uuid = :uuid and b.speciesId=s.id or sb.id=b.subSpeciesId");
        $stmt->bindParam(':uuid', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Récupérer une espèce par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT b.*, s.name as species, sb.name as subspecies  FROM {$this->table} b, species s, subspecies sb  WHERE b.id = :id and b.speciesId=s.id and sb.id=b.subSpeciesId");
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

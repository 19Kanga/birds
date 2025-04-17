<?php
class Cage {
    private $conn;
    private $table = "cages";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Vérifier si le nom de la cage existe déjà
    private function cageExists($name) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name = :name LIMIT 1");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Créer une cage
    public function create($data) {
        // Validation : vérifier si le nom de la cage existe déjà
        if ($this->cageExists($data['name'])) {
            return false;
        }

        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (id, name, capacity, emplacement, status, notes) VALUES (:id, :name, :capacity, :emplacement, :status, :notes)");
        return $stmt->execute($data);
    }

    // Mettre à jour une cage
    public function update($data) {
        // Validation : vérifier si le nom de la cage existe déjà
        if ($this->cageExists($data['name'])) {
            return false;
        }

        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = :name, capacity = :capacity, emplacement = :emplacement, status = :status, notes = :notes WHERE id = :id");
        return $stmt->execute($data);
    }

    // Récupérer toutes les cages
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer une cage par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Supprimer une cage
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

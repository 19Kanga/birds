<?php
class Role {
    private $conn;
    private $table = "role";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Vérifier si le nom du rôle existe déjà
    private function roleExists($name) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name = :name LIMIT 1");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Créer un rôle
    public function create($data) {
        // Validation : vérifier si le nom du rôle existe déjà
        if ($this->roleExists($data['name'])) {
            return false;
        }

        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name) VALUES (:name)");
        return $stmt->execute($data);
    }

    // Mettre à jour un rôle
    public function update($data) {
        // Validation : vérifier si le nom du rôle existe déjà
        if ($this->roleExists($data['name'])) {
            return false;
        }

        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = :name WHERE id = :id");
        return $stmt->execute($data);
    }

    // Récupérer tous les rôles
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un rôle par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Supprimer un rôle
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

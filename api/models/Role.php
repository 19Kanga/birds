<?php
class Role {
    private $conn;
    private $table = "role";

    public function __construct($db) {
        $this->conn = $db;
    }
  
    private function roleExists($name) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name = :name LIMIT 1");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function create($data) {
        // Validation : vérifier si le nom du rôle existe déjà
        if ($this->roleExists($data['name'])) {
            return false;
        }

        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name) VALUES (:name)");
        return $stmt->execute($data);
    }

    public function update($data) {
        // Validation : vérifier si le nom du rôle existe déjà
        if ($this->roleExists($data['name'])) {
            return false;
        }

        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = :name WHERE id = :id");
        return $stmt->execute($data);
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} ORDER BY name asc");
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

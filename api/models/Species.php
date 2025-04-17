<?php
class Species {
    private $conn;
    private $table = "species";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer une espèce
    public function create($data) {
        if (!isset($data['id'])) {
            $data['id'] = uniqid('', true); // Générer un ID unique
        }

        $stmt = $this->conn->prepare("INSERT INTO {$this->table}
            (id, name, scientifiquename, origin, size, lifespan)
            VALUES (:id, :name, :scientifiquename, :origin, :size, :lifespan)");

        return $stmt->execute($data);
    }

    // Récupérer toutes les espèces
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer une espèce par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une espèce
    public function update($data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET
            name = :name,
            scientifiquename = :scientifiquename,
            origin = :origin,
            size = :size,
            lifespan = :lifespan
            WHERE id = :id");

        return $stmt->execute($data);
    }

    // Supprimer une espèce
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

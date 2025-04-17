<?php
class Settings {
    private $conn;
    private $table = "settings";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer une nouvelle configuration
    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table}
            (fullname, email, company, phone, timezone)
            VALUES (:fullname, :email, :company, :phone, :timezone)");

        return $stmt->execute($data);
    }

    // Récupérer toutes les configurations
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer une configuration par ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une configuration
    public function update($data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET
            fullname = :fullname,
            email = :email,
            company = :company,
            phone = :phone,
            timezone = :timezone
            WHERE id = :id");

        return $stmt->execute($data);
    }

    // Supprimer une configuration
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

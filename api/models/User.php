<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT u.*,r.name as role FROM {$this->table} u, role r where u.roleId=r.id ORDER BY createdAt desc");
        $stmt->execute();
        return $stmt;
    }

    public function getOne($id) {
        $stmt = $this->conn->prepare("SELECT u.*,r.name as role FROM {$this->table} u, role r where u.roleId=r.id and u.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT u.*,r.name as role FROM {$this->table} u, role r where u.roleId=r.id and u.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table}
            (id, profile, fullname, email, password, roleId, status)
            VALUES (:id, :profile, :fullname, :email, :password, :roleId, :status)");
        return $stmt->execute($data);
    }

    public function update($fields,$data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET " . implode(', ', $fields) . "WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function findByEmail($email) {
        $stmt = $this->conn->prepare("SELECT u.*,r.name as role FROM {$this->table} u, role r where u.roleId=r.id and u.email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}

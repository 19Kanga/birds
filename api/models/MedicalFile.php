<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/../utils/generateUUId.php';

class MedicalFile {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM medicalfile");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM medicalfile WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO medicalfile (birdId, observations, healthStatus) VALUES (:birdId, :observations, :healthStatus)");
        $stmt->execute([
            ':birdId' => $data['birdId'] ?? null,
            ':observations' => $data['observations'] ?? null,
            ':healthStatus' => $data['healthStatus'] ?? 'STABLE',
        ]);
        $id = $this->pdo->lastInsertId();
        return $this->getById($id);
    }

    public function update($id, $data) {
        $fields = [];
        $params = ['id' => $id];

        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
            $params[$key] = $value;
        }

        $sql = "UPDATE medicalfile SET ".implode(", ", $fields)." WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $this->getById($id);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM medicalfile WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
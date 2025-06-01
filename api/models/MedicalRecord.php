<?php
require_once __DIR__.'/../config/database.php';

class MedicalRecord {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM medicalrecord");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM medicalrecord WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO medicalrecord (medicalFileId, symptoms, diagnosis, treatment, veterinarian, progressNote, healthScore) VALUES (:medicalFileId, :symptoms, :diagnosis, :treatment, :veterinarian, :progressNote, :healthScore)");
        $stmt->execute([
            ':medicalFileId' => $data['medicalFileId'],
            ':symptoms' => $data['symptoms'] ?? null,
            ':diagnosis' => $data['diagnosis'] ?? null,
            ':treatment' => $data['treatment'] ?? null,
            ':veterinarian' => $data['veterinarian'] ?? null,
            ':progressNote' => $data['progressNote'] ?? null,
            ':healthScore' => $data['healthScore'] ?? null,
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

        $sql = "UPDATE medicalrecord SET ".implode(", ", $fields)." WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $this->getById($id);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM medicalrecord WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
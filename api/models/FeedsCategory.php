<?php
class FeedsCategory {
    private $pdo;
    private string $table = 'feedscategory';

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll(): array {
        return $this->pdo->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create($data) {
        $keys = array_keys(array: $data);
        $fields = implode(',', $keys);
        $placeholders = implode(',', array_map(fn($k) => ":$k", $keys));
        $stmt=$this->pdo->prepare("INSERT INTO {$this->table} ($fields) VALUES ($placeholders)");

        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $fields = implode(',', array_map(fn($k) => "$k = :$k", array_keys($data)));
        $data['id'] = $id;
        $stmt= $this->pdo->prepare("UPDATE {$this->table} SET $fields WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete($id): bool {
        return $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id")->execute(['id' => $id]);
    }
}

?>
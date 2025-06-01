<?php
class Feeds {
    private $pdo;
    private string $table = 'feeds';

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll(): array {
        return $this->pdo->query("SELECT f.*,c.name as category FROM {$this->table} f,feedscategory c where f.categorieId=c.id order by id desc")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id): ?array {
        $stmt = $this->pdo->prepare("SELECT f.*,c.name as category FROM {$this->table} f,feedscategory c where f.categorieId=c.id and f.id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $keys = array_keys($data);
        $fields = implode(',', $keys);
        $placeholders = implode(',', array_map(fn($k) => ":$k", $keys));
        $stmt= $this->pdo->prepare("INSERT INTO {$this->table} ($fields) VALUES ($placeholders)");

        return $stmt->execute($data);
    }


    public function decrementStock($id, $qte): void {
        $this->pdo->prepare(
            "UPDATE {$this->table} SET stock = stock - :qte, updatedAt = NOW() WHERE id = :id"
        )->execute(['qte' => $qte, 'id' => $id]);
    }

    public function update($id, $data) {
        $fields = implode(',', array_map(fn($k) => "$k = :$k", array_keys($data)));
        $data['id'] = $id;
        $stmt=$this->pdo->prepare(query: "UPDATE {$this->table} SET $fields, updatedAt = NOW() WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete($id): bool {
        return $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id")->execute(params: ['id' => $id]);
    }
}
?>
<?php 
    class FeedSchedule {
        private $pdo;
        private string $table = 'feedschedule';
    
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
    
        public function getAll(): array {
            return $this->pdo->query("SELECT s.*, f.name as feed,f.unit FROM {$this->table} s, feeds f where s.feedtypeId=f.id order by id desc")->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getById($id) {
            $stmt = $this->pdo->prepare("SELECT s.*, f.name as feed,f.unit FROM {$this->table} s, feeds f where s.feedtypeId=f.id and s.id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
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
            $stmt= $this->pdo->prepare("UPDATE {$this->table} SET $fields, updatedAt = NOW() WHERE id = :id");
            return $stmt->execute($data);
        }
    
        public function delete($id): bool {
            return $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id")->execute(['id' => $id]);
        }
    }
?>
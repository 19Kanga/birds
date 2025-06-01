<?php 
    class FeedScheduleLog {
        private $pdo;
        private string $table = 'feedschedulelogs';
    
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
    
        public function getAll() {
            return $this->pdo->query("SELECT l.*,s.name as shedule,u.fullname as user FROM {$this->table} l,feedschedule s,users u where l.feedscheduleId=s.id and u.id=l.userId order by id desc")->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getById($id) {
            $stmt = $this->pdo->prepare("SELECT l.*,s.name as shedule FROM {$this->table} l,feedschedule s where l.feedscheduleId=s.id and l.id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        }
    
        public function create( $data) {
            $keys = array_keys($data);
            $fields = implode(',', $keys);
            $placeholders = implode(',', array_map(fn($k) => ":$k", $keys));
            $stmt= $this->pdo->prepare("INSERT INTO {$this->table} ($fields) VALUES ($placeholders)");
            return $stmt->execute($data);
        }
    
        public function update($id, $data) {
            $fields = implode(',', array_map(fn($k) => "$k = :$k", array_keys($data)));
            $data['id'] = $id;
            $this->pdo->prepare("UPDATE {$this->table} SET $fields, updatedAt = NOW() WHERE id = :id")->execute($data);
            return $this->getById($id);
        }
    
        public function delete($id) {
            return $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id")->execute(['id' => $id]);
        }
    }
?>
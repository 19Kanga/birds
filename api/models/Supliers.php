<?php
class Supliers
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO supliers (name,type, email, phone, adress, createdAt) VALUES (:name, :type, :email, :phone, :adress, :createdAt)");
        $stmt->execute($data);
    }

    public function getAll()
    {
        $stmt= $this->pdo->prepare("SELECT * FROM supliers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUUID($uuid)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM supliers WHERE uuid = ?");
        $stmt->execute([$uuid]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($uuid)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM supliers WHERE id = :id");
        $stmt->execute([":id" => $uuid]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id,$data)
    {
        $fields = [];
        $params = [];

        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $params[] = $value;
        }

        $sql = "UPDATE supliers SET " . implode(", ", $fields) . ", updatedAt = NOW() WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function delete($uuid)
    {
        $stmt = $this->pdo->prepare("DELETE FROM supliers WHERE id = ?");
        return $stmt->execute([$uuid]);
    }
}

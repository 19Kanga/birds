<?php
class Damages {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM damages");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM damages WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO damages (cause, detail, type, thingsId, typeStatus) VALUES (:cause, :detail, :type, :thingsId, :typeStatus)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':cause' => $data['cause'] ?? null,
            ':detail' => $data['detail'] ?? null,
            ':type' => $data['type'] ?? 'birds',
            ':thingsId' => $data['thingsId'] ?? null,
            ':typeStatus' => $data['typeStatus'] ?? 'deaths',
        ]);

        $id = $this->pdo->lastInsertId();
        $uuid = generateUUID((int)$id, "DG");
        $this->pdo->prepare("UPDATE damages SET uuid = :uuid WHERE id = :id")
                  ->execute([':uuid' => $uuid, ':id' => $id]);
        return $this->getById($id);
    }

    public function update($id, $data) {
        $fields = [];
        $params = [':id' => $id];
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
            $params[":$key"] = $value;
        }
        $sql = "UPDATE damages SET " . implode(", ", $fields) . ", updatedAt = NOW() WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM damages WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

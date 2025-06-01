<?php

require_once __DIR__ . '/../models/EggsLogs.php';
require_once __DIR__ . '/../utils/response.php';

class EggsLogsController {
    private PDO $pdo;
    private EggsLogs $model;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        $this->model = new EggsLogs($pdo);
    }

    public function index() {
        $data = $this->model->getAll();
        response("success","All eggs logs", $data);
    }

    public function addLog($data) {
        try {
            $this->pdo->beginTransaction();

            $this->model->create($data);
            $id=$this->pdo->lastInsertId();
            $uuid = generateUUID($id, 'EG');
            $this->model->update($id, ['uuid' => $uuid]);
            $this->pdo->commit();

            // $result = $this->model->getById($id);
            // response("success","Breeding created", $result);
            return true;

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            // response("error","Error creating breeding",  $e->getMessage());
            return false;
        }
    }
}

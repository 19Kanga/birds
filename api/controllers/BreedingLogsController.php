<?php

require_once __DIR__ . '/../models/BreedingLogs.php';
require_once __DIR__ . '/../utils/response.php';

class BreedingsLogsController {
    private $pdo;
    private BreedingLogs $model;

    public function __construct( $pdo) {
        $this->pdo = $pdo;
        $this->model = new BreedingLogs($pdo);
    }

    public function index() {
        $data = $this->model->getAll();
        response("success","All breedings logs", $data);
    }
}

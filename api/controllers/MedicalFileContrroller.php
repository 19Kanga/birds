<?php
require_once __DIR__.'/../models/MedicalFile.php';

class MedicalFileController {
    private $model;

    public function __construct($pdo) {
        $this->model = new MedicalFile($pdo);
    }

    public function handle($method, $data, $id = null) {
        switch ($method) {
            case 'GET':
                echo json_encode($id ? $this->model->getById($id) : $this->model->getAll());
                break;
            case 'POST':
                echo json_encode($this->model->create($data));
                break;
            case 'PUT':
                echo json_encode($this->model->update($id, $data));
                break;
            case 'DELETE':
                echo json_encode(['deleted' => $this->model->delete($id)]);
                break;
            default:
                http_response_code(405);
                echo json_encode(["error" => "Method Not Allowed"]);
        }
    }
}
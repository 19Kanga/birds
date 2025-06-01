<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/BirdsController.php';

$db = new Database();
$conn = $db->getConnection();
$speciesController = new BirdsController($conn);

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $speciesController->getById($_GET['id']);
        } else {
            $speciesController->getAll();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $speciesController->create($data);
        break;

    case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            $speciesController->update($_GET['id'], $data);
        break;

    case 'DELETE':
        $speciesController->delete($_GET['id']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Méthode non autorisée']);
        break;
}

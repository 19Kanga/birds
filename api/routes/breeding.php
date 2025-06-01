<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/BreedingController.php';

$db = new Database();
$conn = $db->getConnection();
$speciesController = new BreedingController($conn);

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $speciesController->show($_GET['id']);
        } else {
            $speciesController->index();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $speciesController->create($data);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $speciesController->update($_GET['id'], $data);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'ID manquant pour la mise à jour']);
        }
        break;

    case 'DELETE':
        $speciesController->delete($_GET['id']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Méthode non autorisée']);
        break;
}


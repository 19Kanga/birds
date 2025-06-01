<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/CageController.php';

$db = new Database();
$conn = $db->getConnection();
$cageController = new CageController($conn);

$method = $_SERVER['REQUEST_METHOD'];

// Vérifier le type de requête et l'URL
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $cageController->getById($_GET['id']);
        } else {
            $cageController->getAll();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $cageController->create($data);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $cageController->update($_GET['id'], $data);
        break;

    case 'DELETE':
        $cageController->delete($_GET['id']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Méthode non autorisée']);
        break;
}

<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/RoleController.php';

$db = new Database();
$conn = $db->getConnection();
$roleController = new RoleController($conn);

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

// Vérifier le type de requête et l'URL
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $roleController->getById($_GET['id']);
        } else {
            $roleController->getAll();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $roleController->create($data);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents("php://input"), true);
            $data['id'] = $_GET['id']; // Ajouter l'ID dans la mise à jour
            $roleController->update($data);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'ID manquant pour la mise à jour']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $roleController->delete($_GET['id']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'ID manquant pour la suppression']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Méthode non autorisée']);
        break;
}

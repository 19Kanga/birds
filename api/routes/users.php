<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/UserController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new UserController($db);

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'GET':
        $id ? $controller->show($id) : $controller->index();
        break;
    case 'POST':
        $controller->store();
        break;
    case 'PUT':
        $controller->update($id);
        break;
    case 'DELETE':
        $controller->destroy($id);
        break;
    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}

<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/AuthController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new AuthController($db);

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

switch ($method) {
    case 'POST':
        $controller->login();
        break;
    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}

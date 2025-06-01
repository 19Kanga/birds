<?php

require_once __DIR__ . '/../config/database.php';
// require_once __DIR__ . '/../utils/response.php';
require_once __DIR__ . '/../controllers/BreedingLogsController.php';

$db = new Database();
$pdo = $db->getConnection();
$controller = new BreedingsLogsController($pdo);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $controller->index();
        break;
    default:
        http_response_code(405);
        echo json_encode(['message' => 'Méthode non autorisée']);
        break;
}

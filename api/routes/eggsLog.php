<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/EggsLogsController.php';
require_once __DIR__ . '/../utils/response.php';

$db = new Database();
$pdo = $db->getConnection();
$controller = new EggsLogsController($pdo);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $controller->index();
        break;
    default:
        response("error",'Method Not Allowed', false);
        break;
}

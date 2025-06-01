<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/EggsController.php';
require_once __DIR__ . '/../utils/response.php';

$db = new Database();
$pdo = $db->getConnection();
$controller = new EggsController($pdo);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            $controller->show( $_GET['id']);
        } else {
            $controller->getAll();
            // http_response_code(400);
            // response("error",'Provide eggs ID', []);
        }
        break;
    case 'PUT':
        if (isset($_GET['id'])) {
            $controller->update($_GET['id']);
        }else{
            http_response_code(400);
            response("error",'Provide eggs ID', []);
        }
        break;
    default:
        response("error",'Method Not Allowed', []);
}

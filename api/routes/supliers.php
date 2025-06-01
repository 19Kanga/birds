<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/SupliersController.php';


$db = new Database();
$conn = $db->getConnection();
$controller = new SupliersController($conn);
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    $controller->getAllSupliers();
    break;

  case 'POST':
    $data= json_decode(file_get_contents("php://input"), true);
    $controller->createSuplier($data);
    break;

  case 'PUT':
    $id=$_GET['id'];
    $data= json_decode(file_get_contents("php://input"), true);
    if ($id) {
      $controller->updateSuplier($id, $data);
    } else {
      http_response_code(400);
      echo json_encode(['error' => 'Client UUID required']);
    }
    break;

  case 'DELETE':
    $id=$_GET['id'];
    if ($id) {
      $controller->deleteSuplier($id);
    } else {
      http_response_code(400);
      echo json_encode(['error' => 'Client UUID required']);
    }
    break;

  default:
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

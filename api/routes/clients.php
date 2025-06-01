<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/ClientsController.php';


$db = new Database();
$conn = $db->getConnection();
$controller = new ClientsController($conn);
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    $controller->getAllClients();
    break;

  case 'POST':
    $data= json_decode(file_get_contents("php://input"), true);
    $controller->createClient($data);
    break;

  case 'PUT':
    $id=$_GET['id'];
    $data= json_decode(file_get_contents("php://input"), true);
    if ($id) {
      $controller->updateClient($id, $data);
    } else {
      http_response_code(400);
      echo json_encode(['error' => 'Client UUID required']);
    }
    break;

  case 'DELETE':
    $id=$_GET['id'];
    if ($id) {
      $controller->deleteClient($id);
    } else {
      http_response_code(400);
      echo json_encode(['error' => 'Client UUID required']);
    }
    break;

  default:
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

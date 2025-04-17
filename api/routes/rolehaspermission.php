<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/RoleHasPermissionController.php';

$db = new Database();
$conn = $db->getConnection();
$roleHasPermissionController = new RoleHasPermissionController($conn);

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

switch ($method) {
    case 'POST':
        if (isset($_GET['roleId']) && isset($_GET['permissionId'])) {
            $roleId = $_GET['roleId'];
            $permissionId = $_GET['permissionId'];
            $roleHasPermissionController->assignPermission($roleId, $permissionId);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'RoleId ou PermissionId manquant']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['roleId']) && isset($_GET['permissionId'])) {
            $roleId = $_GET['roleId'];
            $permissionId = $_GET['permissionId'];
            $roleHasPermissionController->removePermission($roleId, $permissionId);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'RoleId ou PermissionId manquant']);
        }
        break;

    case 'GET':
        $roleHasPermissionController->getPermissions();
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Méthode non autorisée']);
        break;
}

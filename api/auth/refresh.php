<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/jwt.php';


$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['refresh_token'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Refresh token manquant']);
    exit;
}

if (strlen($data['refresh_token']) !== 128) {
    http_response_code(401);
    echo json_encode(['message' => 'Refresh token invalide']);
    exit;
}

$user = [
    'id' => 'testid123',
    'email' => 'test@example.com',
    'roleId' => 'user'
];

$newAccessToken = generateJWT($user);
echo json_encode(['token' => $newAccessToken]);

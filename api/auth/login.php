<?php
// require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/jwt.php';
// require_once __DIR__ . '/../models/User.php';

function generateJWT($user) {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $payload = json_encode([
        'id' => $user['id'],
        'email' => $user['email'],
        'roleId' => $user['roleId'],
        'exp' => time() + JWT_EXPIRES_IN
    ]);

    $base64UrlHeader = rtrim(strtr(base64_encode($header), '+/', '-_'), '=');
    $base64UrlPayload = rtrim(strtr(base64_encode($payload), '+/', '-_'), '=');
    $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", JWT_SECRET, true);
    $base64UrlSignature = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');

    return "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";
}

<?php
require_once __DIR__ . '/../config/jwt.php';

function getBearerToken() {
    $headers = apache_request_headers();
    if (!isset($headers['Authorization'])) return null;
    if (preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
        return $matches[1];
    }
    return null;
}

function verifyJWT($token) {
    [$header, $payload, $signature] = explode('.', $token);

    $expectedSignature = rtrim(strtr(
        base64_encode(hash_hmac('sha256', "$header.$payload", JWT_SECRET, true)),
        '+/', '-_'), '=');

    if ($signature !== $expectedSignature) return false;

    $data = json_decode(base64_decode($payload), true);
    if ($data['exp'] < time()) return false;

    return $data;
}

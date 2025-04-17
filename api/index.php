<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

// Gestion des pré-requêtes CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$request = $_SERVER['REQUEST_URI'];

// Nettoyage de l'URL (en cas de query params)
$path = parse_url($request, PHP_URL_PATH);

// Routing
if (preg_match("#^/api/users#", $path)) {
    require_once __DIR__ . '/routes/users.php';

} elseif ($path === '/api/login') {
    require_once __DIR__ . '/routes/auth.php';

}elseif (preg_match("#^/api/species#", $path)) {
    require_once __DIR__ . '/routes/species.php';

}elseif (preg_match("#^/api/settings#", $path)) {
    require_once __DIR__ . '/routes/settings.php';

}elseif (preg_match("#^/api/permission#", $path)) {
    require_once __DIR__ . '/routes/permission.php';

}elseif (preg_match("#^/api/cage#", $path)) {
    require_once __DIR__ . '/routes/cage.php';

}elseif (preg_match("#^/api/rolehaspermission#", $path)) {
    require_once __DIR__ . '/routes/rolehaspermission.php';

}elseif (preg_match("#^/api/role#", $path)) {
    require_once __DIR__ . '/routes/role.php';
}else {
    http_response_code(404);
    echo json_encode(["message" => "Route non trouvée"]);
}

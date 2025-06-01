<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../auth/login.php';

// var_dump($_POST);
// var_dump($_FILES);
// exit;
class AuthController
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }


    public function loginrr()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['email'], $data['password'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Email et mot de passe requis']);
            exit;
        }
        $userModel = new User($this->db);
        $user = $userModel->findByEmail($data['email']);

        if (!$user || !password_verify($data['password'], $user['password'])) {
            // http_response_code(401);
            echo json_encode(["status" => false, 'message' => 'Identifiants invalides', 'token' => "", 'result' => []]);
            exit;
        } else {
            $token = generateJWT($user);
            echo json_encode([
                "status" => true,
                'message' => 'Connexion réussie',
                'token' => $token,
                'result' => [
                    'id' => $user['id'],
                    "profile" => $user['profile'],
                    'fullname' => $user['fullname'],
                    'email' => $user['email'],
                    'roleId' => $user['roleId'],
                    'role' => $user['role'],
                ]
            ]);
        }
    }

    public function login()
    {

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['email'], $data['password'])) {
            http_response_code(400);
            echo json_encode([
                "status" => false,
                "message" => "Email et mot de passe requis",
                "token" => "",
                "result" => []
            ]);
            return;
        }

        $userModel = new User($this->db);
        $user = $userModel->findByEmail($data['email']);

        if (!$user || !password_verify($data['password'], $user['password'])) {
            http_response_code(401);
            echo json_encode([
                "status" => false,
                "message" => "Identifiants invalides",
                "token" => "",
                "result" => []
            ]);
            return;
        }

        $token = generateJWT($user);

        http_response_code(200);
        echo json_encode([
            "status" => true,
            "message" => "Connexion réussie",
            "token" => $token,
            "result" => [
                'id' => $user['id'],
                "profile" => $user['profile'],
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'roleId' => $user['roleId'],
                'role' => $user['role'],
            ]
        ]);
    }
}

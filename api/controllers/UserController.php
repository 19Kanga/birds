<?php
require_once __DIR__ . '/../models/User.php';

// var_dump($_POST);
// var_dump($_FILES);
// exit;
class UserController {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    private function uploadImage($file) {
        if (!isset($file) || $file['error'] !== 0) return null;

        $targetDir = __DIR__ . '/../uploads/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid() . '.' . $ext;
        $targetPath = $targetDir . $newName;

        move_uploaded_file($file['tmp_name'], $targetPath);
        return 'uploads/' . $newName;
    }

    public function index() {
        $user = new User($this->db);
        $stmt = $user->getAll();
        echo json_encode(["status"=>true,"message"=>"success","result"=>$stmt->fetchAll(PDO::FETCH_ASSOC)]);
    }

    public function show($id) {
        $user = new User($this->db);
        $stmt = $user->getOne($id);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function store() {
        $profilePath=null;
        if(isset($_FILES['profile'])){
            $profilePath = $this->uploadImage($_FILES['profile']);
        }
        $data = [
            ':id' => uniqid(),
            ':profile' => $profilePath,
            ':fullname' => $_POST['fullname'],
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ':roleId' => $_POST['roleId'],
            ':status' => $_POST['status'] ?? 'active'
        ];
        $user = new User($this->db);
        echo json_encode(['status' => $user->create($data),"message"=>"success","result"=>$data]);
    }

    public function update($id) {
        // Récupère les données de la requête
        parse_str(file_get_contents("php://input"), $_PUT);
        
        // Gère le fichier de profil si présent
        $profilePath = isset($_FILES['profile']) ? $this->uploadImage($_FILES['profile']) : $_PUT['profile'];
   
        $data = [
            ':id' => $id,
            ':profile' => $profilePath,
            ':fullname' => $_PUT['fullname'],
            ':email' => $_PUT['email'],
            ':roleId' => $_PUT['roleId'],
            ':status' => $_PUT['status']
        ];
    
        // Si un mot de passe est fourni, on le hache et on l'ajoute aux données
        if (!empty($_PUT['password'])) {
            $data[':password'] = password_hash($_PUT['password'], PASSWORD_BCRYPT);
        } else {
            // Si aucun mot de passe n'est fourni, on ne met pas à jour le champ du mot de passe
            // On enlève la clé ':password' des données si elle est absente
            unset($data[':password']);
        }
    
        // Instancier l'objet User et appeler la méthode update
        $user = new User($this->db);
        echo json_encode(['success' => $user->update($data)]);
    }
    

    public function destroy($id) {
        $user = new User($this->db);
        echo json_encode(['success' => $user->delete($id),"message"=>"success","id"=>$id]);
    }
}

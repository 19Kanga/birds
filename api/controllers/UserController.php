<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Role.php';

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
        if($user->create($data)){
            $cleanParams = $user->findByEmail($_POST['email']);;
          
            unset($cleanParams["password"]);
            
            echo json_encode(['status' => true,"message"=>"success","result"=>$cleanParams]);
        }else{
            echo json_encode(['status' => false,"message"=>"error","result"=>[]]);
        }
        
    }

    public function update($id) {

        $_PUT = json_decode(file_get_contents("php://input"), true);

        $profilePath = null;

        // Gérer le fichier s'il est uploadé
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
            $profilePath = $this->uploadImage($_FILES['profile']);
        } elseif (isset($_PUT['profile'])) {
            $profilePath = $_PUT['profile'];
        }
        
        $fields = [];
        $params = [':id' => $id];
 
        if ($profilePath !== null && $profilePath !== '') {
            $fields[] = "profile = :profile";
            $params[':profile'] = $profilePath;
        }
        if (isset($_PUT['fullname']) && $_PUT['fullname'] !== '') {
            $fields[] = "fullname = :fullname";
            $params[':fullname'] = $_PUT['fullname'];
        }
        if (isset($_PUT['phone']) && $_PUT['phone'] !== '') {
            $fields[] = "phone = :phone";
            $params[':phone'] = $_PUT['phone'];
        }
        if (isset($_PUT['email']) && $_PUT['email'] !== '') {
            $fields[] = "email = :email";
            $params[':email'] = $_PUT['email'];
        }
        if (isset($_PUT['roleId'])) {
            $fields[] = "roleId = :roleId";
            $params[':roleId'] = $_PUT['roleId'];
        } 
        if (isset($_PUT['status'])) {
            $fields[] = "status = :status";
            $params[':status'] = $_PUT['status'];
        }
        if (isset($_PUT['password']) && $_PUT['password'] !== '') {
            $fields[] = "password = :password";
            $params[':password'] = password_hash($_PUT['password'], PASSWORD_BCRYPT);
        }
        $fields[] = "updatedAt = CURRENT_TIMESTAMP(3)";
        
        // $cleanParams = [];
        // foreach ($params as $key => $value) {
        //     $cleanKey = ltrim($key, ':');
        //     $cleanParams[$cleanKey] = $value;
        // }
        // Instancier l'objet User et appeler la méthode update
        $user = new User($this->db);
        $isOkay=$user->update($fields, $params);
       if($isOkay){
        $result=$user->getById($id);
        unset($result['password'],$result['createAt']);
        echo json_encode([
            "status" => "success",
            "message" => true,
            "result" => $result
        ]);
       }
    }
    

    public function destroy($id) {
        $user = new User($this->db);
        echo json_encode(['success' => $user->delete($id),"message"=>"success","id"=>$id]);
    }
}

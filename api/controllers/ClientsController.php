<?php
require_once __DIR__ . '/../models/Clients.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class ClientsController {
  private $client;
  private $pdo;

  public function __construct($pdo) {
    $this->client = new Clients($pdo);
    $this->pdo = $pdo;
  }

  public function getAllClients() {
    echo json_encode(["status"=>"success","result"=>$this->client->getAll()]);
  }

  public function getClientByUUID($uuid) {
    $result = $this->client->getByUUID($uuid);
    if ($result) {
      echo json_encode($result);
    } else {
      http_response_code(404);
      echo json_encode(['error' => 'Client not found']);
    }
  }

  public function createClient($data) {
    try {
        $this->pdo->beginTransaction();
        $now = date('Y-m-d H:i:s');
        $datas=[
            'name'      => $data['name'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'adress'    => $data['adress'],
            'createdAt' => $now,
        ];
       $this->client->create($datas);
        $id = (int) $this->pdo->lastInsertId();
  
        $uuid = generateUUID($id,"CUS");
     
        $stmt = $this->pdo->prepare("UPDATE clients SET uuid = :uuid WHERE id = :id");
        $stmt->execute([
            'uuid' => $uuid,
            'id'   => $id
        ]);

        $this->pdo->commit();
      
        echo json_encode(["status"=>"success","result"=>[
            'id'        => $id,
            'uuid'      => $uuid,
            'name'      => $data['name'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'adress'    => $data['adress'],
            'createdAt' => $now,
            'updatedAt' => $now
        ]]);

    } catch (PDOException $e) {
        echo json_encode(["error"=>"success","result"=>[]]);
        $this->pdo->rollBack();
        throw $e;
    }
  }

  public function updateClient($id, $data) {
    $success = $this->client->update($id, $data);
    if($success){
        $result=$this->client->getById($id);
        echo json_encode([
            "status" => "success",
            "message" => true,
            "result" => $result
        ]);
    }else{
        echo json_encode(["status" => "error","message" => false, "result"=> ""]);
    }
  }

  public function deleteClient($id) {
    if ($this->client->delete($id)) {
        response("success",true,intval($id));
    } else {
        http_response_code(500);
        response("error",false,"");
    }
  }
}

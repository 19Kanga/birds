<?php
require_once __DIR__ . '/../models/Supliers.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class SupliersController {
  private $client;
  private $pdo;

  public function __construct($pdo) {
    $this->client = new Supliers($pdo);
    $this->pdo = $pdo;
  }

  public function getAllSupliers() {
    $result=$this->client->getAll();
    foreach ($result as &$row) {
      $row['type'] = explode(',', $row['type']); // "bois,métal" -> ['bois', 'métal']
    }
    echo json_encode(["status"=>"success","message"=>true,"result"=>$result]);
  }

  public function getSuplierByUUID($uuid) {
    $result = $this->client->getByUUID($uuid);
    if ($result) {
      if (isset($result['type']) && is_string($result['type'])) {
        $result['type'] = explode(',', $result['type']);
      }
      response("success",true,$result);
    } else {
      http_response_code(404);
      response("error","Client not found","");
    }
  }

  public function createSuplier($data) {
    $this->withTransaction(function($pdo) use ($data) {
      $now = date('Y-m-d H:i:s');
      $datas = [
          'name'      => $data['name'],
          'type'      => $data['type'],
          'email'     => $data['email'],
          'phone'     => $data['phone'],
          'adress'    => $data['adress'],
          'createdAt' => $now,
      ];
  
      $this->client->create($datas);
      $id = (int) $pdo->lastInsertId();
  
      $uuid = generateUUID($id, "SP");
  
      $stmt = $pdo->prepare("UPDATE supliers SET uuid = :uuid WHERE id = :id");
      $stmt->execute([
          'uuid' => $uuid,
          'id'   => $id
      ]);
  
      $result = $this->client->getById($id);
      if (isset($result['type']) && is_string($result['type'])) {
        $result['type'] = explode(',', $result['type']);
      }
  
      response("success", true, $result);
  });
  }

  public function updateSuplier($id, $data) {
    $success = $this->client->update($id, $data);
    if($success){
        $result=$this->client->getById($id);
        if (isset($result['type']) && is_string($result['type'])) {
          $result['type'] = explode(',', $result['type']);
        }
        response("success",true,$result);
    }else{
        response("error",false,"");
    }
  }

  public function deleteSuplier($uuid) {
    $success = $this->client->delete($uuid);
    response("success",true,$uuid);
  }

  protected function withTransaction(callable $callback) {
    try {
        $this->pdo->beginTransaction();
        $result = $callback($this->pdo);
        $this->pdo->commit();
        return $result;
    } catch (PDOException $e) {
        if ($this->pdo->inTransaction()) {
            $this->pdo->rollBack();
        }
        response("error", false, ["message" => $e->getMessage()]);
        return null;
    }
}
}

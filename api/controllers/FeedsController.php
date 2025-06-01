<?php
require_once __DIR__ . '/../models/Feeds.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class FeedsController {
    private $feed;
    private $pdo;

    public function __construct($db) {
        $this->feed = new Feeds($db);
        $this->pdo=$db;
    }

    // Créer une espèce
    public function create($data) {
        try {
            $this->pdo->beginTransaction();
           $this->feed->create($data);

            $id = (int) $this->pdo->lastInsertId();
            $uuid = generateUUID($id,"FD");
            $this->pdo->prepare("UPDATE feeds  SET uuid = :uuid WHERE id = :id")->execute(['uuid' => $uuid, 'id' => $id]);
            $this->pdo->commit();
          
            echo json_encode(["status"=>"success","message"=>true,"result"=>$this->feed->getById(id: $id)]);
    
        } catch (PDOException $e) {
            echo json_encode(["error"=>"success","result"=>[]]);
            $this->pdo->rollBack();
            throw $e;
        }
    }

    // Obtenir toutes les espèces
    public function getAll() {
        $feedList = $this->feed->getAll();
        response("success",true,$feedList);
    }

    // Obtenir une espèce par ID
    public function getById($id) {
        $feeds = $this->feed->getById($id);
        if ($feeds) {
            response("success",true,$feeds);
        } else {
            http_response_code(404);
            response("error",false,"");
        }
    }

    // Mettre à jour une espèce
    public function update($id,$data) {
 
        $fields=[];
        $allowedFields = [
            "name",
            "categorieId",
            "stock" ,
            "unit",
            "minstock",
            "expirydate",
            "notes",
            "status"
        ];
    
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[$field] = $data[$field];
            }
        }
        
        if ($this->feed->update($id,$fields)) {
            $species = $this->feed->getById($id);
            response("success",true,$species);
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }

    // Supprimer une espèce
    public function delete($id) {
        if ($this->feed->delete($id)) {
            response("success",true,intval($id));
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }
}

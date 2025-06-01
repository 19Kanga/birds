<?php
require_once __DIR__ . '/../models/FeedShedules.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class FeedScheduleController {
    private $subspecies;
    private $pdo;

    public function __construct($db) {
        $this->subspecies = new FeedSchedule($db);
        $this->pdo=$db;
    }

    // Créer une espèce
    public function create($data) {
        try {
            $this->pdo->beginTransaction();
           $this->subspecies->create($data);
            $id = (int) $this->pdo->lastInsertId();
      
            $uuid = generateUUID($id,"FS");
         
            $stmt = $this->pdo->prepare("UPDATE feedschedule SET uuid = :uuid WHERE id = :id");
            $stmt->execute([
                'uuid' => $uuid,
                'id'   => $id
            ]);
            
            $this->pdo->commit();
            $result= $this->subspecies->getById($id);
          
           response("success",true,$result);
    
        } catch (PDOException $e) {
            // echo json_encode(["status"=>"error","","result"=>[]]);
            response("error",false,[]);
            $this->pdo->rollBack();
            throw $e;
        }
    }

    // Obtenir toutes les espèces
    public function getAll() {
        $subSpeciesList = $this->subspecies->getAll();
        response("success",true,$subSpeciesList);
    }

    // Obtenir une espèce par ID
    public function getById($id) {
        $subspecies = $this->subspecies->getById($id);
        if ($subspecies) {
            response("success",true,$subspecies);
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
            "feedtype",
            "days",
            "qte",
            "status"
        ];
    
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[$field] = $data[$field];
            }
        }
        if ($this->subspecies->update($id,$fields)) {
            $subspecies = $this->subspecies->getById($id);
            response("success",true,$subspecies);
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }

    // Supprimer une espèce
    public function delete($id) {
        if ($this->subspecies->delete($id)) {
            response("success",true,intval($id));
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }
}

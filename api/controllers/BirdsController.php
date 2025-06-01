<?php
require_once __DIR__ . '/../models/Birds.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class BirdsController {
    private $birds;
    private $pdo;

    public function __construct($db) {
        $this->birds = new Birds($db);
        $this->pdo= $db;
    }

    public function create($data) {
        try {
            $this->pdo->beginTransaction();
           $this->birds->create($data);
            $id = (int) $this->pdo->lastInsertId();
      
            $uuid = generateUUID($id,"B");
         
            $stmt = $this->pdo->prepare("UPDATE birds SET uuid = :uuid WHERE id = :id");
            $stmt->execute([
                'uuid' => $uuid,
                'id'   => $id
            ]);
    

            $result= $this->birds->getById($id);
            $this->pdo->commit();

            response("success",true,$result);
    
        } catch (PDOException $e) {
            echo json_encode(["error"=>"success","result"=>[]]);
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function getAll() {
        $birdsList = $this->birds->getAll();
        response("success",true,$birdsList);
    }

    public function getById($id) {
        $bird = $this->birds->getById($id);
        if ($bird) {
            response("success",true,$bird);
        } else {
            http_response_code(404);
            response("error",'Cage non trouvée',"");
        }
    }

    public function update($id,$data) {
        $fields=[];
        $allowedFields = [
            "name",
            "speciesId",
            "subSpeciesId" ,
            "cageId",
            "gender",
            "old",
            "type",
            "status",
            "weight",
            "description"
        ];
    
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[$field] = $data[$field];
            }
        }
        $fields["updatedAt"] = date('Y-m-d H:i:s');

        if ($this->birds->update($id,$fields)) {
            $bird = $this->birds->getById($id);
            response("success",true,$bird);
        } else {
            http_response_code(400);
            response("error",false,"");
        }
    }

    public function delete($id) {
        if ($this->birds->delete($id)) {
            response("status",true,intval($id));
        } else {
           http_response_code(400);
            response("error",false,"");
        }
    }
}

?>
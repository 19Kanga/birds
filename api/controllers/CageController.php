<?php
require_once __DIR__ . '/../models/Cage.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class CageController {
    private $cage;
    private $pdo;

    public function __construct($db) {
        $this->cage = new Cage($db);
        $this->pdo= $db;
    }

    // Créer une cage
    public function create($data) {
        try {
            $this->pdo->beginTransaction();
           $this->cage->create($data);
            $id = (int) $this->pdo->lastInsertId();
      
            $uuid = generateUUID($id,"CG");
         
            $stmt = $this->pdo->prepare("UPDATE cages SET uuid = :uuid WHERE id = :id");
            $stmt->execute([
                'uuid' => $uuid,
                'id'   => $id
            ]);
    

            $result= $this->cage->getById($id);
            $this->pdo->commit();
          
            echo json_encode(["status"=>"success","message"=>true,"result"=>[
                'id'        => $id,
                'uuid'      => $uuid,
                'name'      => $data['name'],
                'emplacement'     => $data['emplacement'],
                'capacity'     => $data['capacity'],
                'status'     => $data['status'],
                'notes'    => $data['notes'],
                'createdAt'    => $result['createdAt'],
                'updatedAt'    => $result['updatedAt'],
            ]]);
    
        } catch (PDOException $e) {
            echo json_encode(["error"=>"success","result"=>[]]);
            $this->pdo->rollBack();
            throw $e;
        }
    }

    // Obtenir toutes les cages
    public function getAll() {
        $cageList = $this->cage->getAll();
        response("success",true,$cageList);
    }

    // Obtenir une cage par ID
    public function getById($id) {
        $cage = $this->cage->getById($id);
        if ($cage) {
            response("success",true,$cage);
        } else {
            http_response_code(404);
            response("error",'Cage non trouvée',"");
        }
    }

    // Mettre à jour une cage
    public function update($id,$data) {

        $fields=[];
        $allowedFields = [
            "name",
            "capacity",
            "emplacement" ,
            "status",
            "typeCage",
            "notes"
        ];
    
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[$field] = $data[$field];
            }
        }
        $fields["updatedAt"] = date('Y-m-d H:i:s');
        
        if ($this->cage->update($id,$fields)) {
            $subspecies = $this->cage->getById($id);
            response("success",true,$subspecies);
        } else {
            http_response_code(400);
            response("error",false,"");
        }
    }

    public function delete($id) {
        if ($this->cage->delete($id)) {
            response("status",true,intval($id));
        } else {
           http_response_code(400);
            response("error",false,"");
        }
    }
}

?>
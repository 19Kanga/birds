<?php
require_once __DIR__ . '/../models/Subspecies.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class SubspeciesController {
    private $subspecies;
    private $pdo;

    public function __construct($db) {
        $this->subspecies = new Subspecies($db);
        $this->pdo=$db;
    }

    // Créer une espèce
    public function create($data) {
        try {
            $this->pdo->beginTransaction();
           $this->subspecies->create($data);
            $id = (int) $this->pdo->lastInsertId();
      
            $uuid = generateUUID($id,"SUB");
         
            $stmt = $this->pdo->prepare("UPDATE subspecies SET uuid = :uuid WHERE id = :id");
            $stmt->execute([
                'uuid' => $uuid,
                'id'   => $id
            ]);
    

            $result= $this->subspecies->getById($id);
            $this->pdo->commit();
          
            echo json_encode(["status"=>"success","message"=>true,"result"=>[
                'id'        => $id,
                'uuid'      => $uuid,
                'name'      => $data['name'],
                'speciesId'     => $data['speciesId'],
                'characteristiq'     => $data['characteristiq'],
                'parent'    => $result['parent'],
            ]]);
    
        } catch (PDOException $e) {
            echo json_encode(["error"=>"success","result"=>[]]);
            $this->pdo->rollBack();
            throw $e;
        }
    }

    // Obtenir toutes les espèces
    public function getAll() {
        $subSpeciesList = $this->subspecies->getAll();
        // echo json_encode($speciesList);
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
            "speciesId",
            "characteristiq" ,
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

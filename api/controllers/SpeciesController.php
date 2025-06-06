<?php
require_once __DIR__ . '/../models/Species.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class SpeciesController {
    private $species;
    private $pdo;

    public function __construct($db) {
        $this->species = new Species($db);
        $this->pdo=$db;
    }

    // Créer une espèce
    public function create($data) {
        try {
            $this->pdo->beginTransaction();
           $this->species->create($data);
            $id = (int) $this->pdo->lastInsertId();
      
            $uuid = generateUUID($id,"SP");
         
            $stmt = $this->pdo->prepare("UPDATE species SET uuid = :uuid WHERE id = :id");
            $stmt->execute([
                'uuid' => $uuid,
                'id'   => $id
            ]);
    
            $this->pdo->commit();
          
            echo json_encode(["status"=>"success","message"=>true,"result"=>[
                'id'        => $id,
                'uuid'      => $uuid,
                'name'      => $data['name'],
                'scienticname'     => $data['scienticname'],
                'origin'     => $data['origin'],
                'size'    => $data['size'],
                'lifespan'    => $data['lifespan'],
                'pu'    => $data['pu'],
            ]]);
    
        } catch (PDOException $e) {
            echo json_encode(["error"=>"success","result"=>[]]);
            $this->pdo->rollBack();
            throw $e;
        }
    }

    // Obtenir toutes les espèces
    public function getAll() {
        $speciesList = $this->species->getAll();
        // echo json_encode($speciesList);
        response("success",true,$speciesList);
    }

    // Obtenir une espèce par ID
    public function getById($id) {
        $species = $this->species->getById($id);
        if ($species) {
            response("success",true,$species);
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
            "scienticname",
            "origin" ,
            "size",
            "lifespan",
            "pu"
        ];
    
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[$field] = $data[$field];
            }
        }
        
        if ($this->species->update($id,$fields)) {
            $species = $this->species->getById($id);
            response("success",true,$species);
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }

    // Supprimer une espèce
    public function delete($id) {
        if ($this->species->delete($id)) {
            response("success",true,intval($id));
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }
}

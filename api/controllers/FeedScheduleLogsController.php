<?php
require_once __DIR__ . '/../models/FeedSheduleLogs.php';
require_once __DIR__ . '/../models/FeedShedules.php';
require_once __DIR__ . '/../models/Feeds.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class FeedScheduleLogController {
    private $feed;
    private $pdo;
    private $feedss;
    private $feedschedu;

    public function __construct($db) {
        $this->feed = new FeedScheduleLog($db);
        $this->feedss = new Feeds($db);
        $this->feedschedu = new FeedSchedule($db);
        $this->pdo=$db;
    }

    // Créer une espèce
    public function create($data) {
        try {
            $schedule = $this->feedschedu->getById($data['feedscheduleId']);
            if (empty($schedule)) {
                // throw new \Exception('Schedule introuvable');
                http_response_code(500);
                response("error","Schedule introuvable",[]);
            }
            $this->pdo->beginTransaction();
           $this->feed->create($data);

            $id = (int) $this->pdo->lastInsertId();
            $uuid = generateUUID($id,"FL");
            $this->pdo->prepare("UPDATE feedschedulelogs  SET uuid = :uuid WHERE id = :id")->execute(['uuid' => $uuid, 'id' => $id]);
            $this->feedss->decrementStock($schedule['feedtypeId'], $schedule['qte']);
            $this->pdo->commit();
          
            echo json_encode(["status"=>"success","message"=>true,"result"=>$this->feed->getById(id: $id)]);
    
        } catch (PDOException $e) {
            echo json_encode(["status"=>"error","result"=>[]]);
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
            "feddingsheduleId",
            "status",
            "userid" 
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
            response("error",false,[]);
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

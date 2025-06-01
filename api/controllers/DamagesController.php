<?php
require_once __DIR__ . '/../models/Damages.php';
require_once __DIR__ . '/../models/Birds.php';
require_once __DIR__ . '/../models/Feeds.php';
require_once __DIR__ . '/../controllers/EggsController.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';
class DamagesController {
    private $model;
    private $pdo;

    public function __construct($pdo) {
        $this->model = new Damages($pdo);
        $this->pdo=$pdo;
    }

    public function index() {
        response("success", true, $this->model->getAll());
    }

    public function show($id) {
        $result = $this->model->getById($id);
        response("success", true, $result);
    }

    public function store($data) {
        $fields=[];
        try {
            $this->pdo->beginTransaction();
            $result = $this->model->create($data);

            if($data["type"]==="birds"){
                $bird=new Birds($this->pdo);
                $fields["status"]=$data["typeStatus"];
                $fields["cageId"]=0;
                $fields["updatedAt"] = date(format: 'Y-m-d H:i:s');
                $bird->update($data["thingsId"],$fields);
            }elseif($data["type"]==="eggs"){
                $eggs =new EggsController($this->pdo);
                $eggData=[
                    $data["typeStatus"]=$data["qte"]
                ];
                $eggs->updateEggs($data["thingsId"],$eggData);
            }elseif($data["type"]==="feeds"){
                $feeds=new Feeds($this->pdo);
                $fields["status"]=$data["typeStatus"];
                $fields["updatedAt"] = date('Y-m-d H:i:s');
                $feeds->update($data["thingsId"],$fields);
            }
            $this->pdo->commit();
            response("success", true, $result);
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            response("error", false, $e->getMessage());
        }
    }

    public function update($id, $data) {
        $this->model->update($id, $data);
        $result = $this->model->getById($id);
        response("success", true, $result);
    }

    public function destroy($id) {
        if ($this->model->delete($id)) {
            response("success",true,intval($id));
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }
}
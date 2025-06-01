<?php
require_once __DIR__ . '/../models/Breeding.php';
require_once __DIR__ . '/../models/BreedingLogs.php';
require_once __DIR__ . '/../controllers/EggsController.php';
require_once __DIR__ . '/../models/Eggs.php';
require_once __DIR__ . '/../utils/generateUUId.php';
require_once __DIR__ . '/../utils/response.php';

class BreedingController {
    private $pdo;
    private Breeding $model;
    private $eggs;
    private  $logs;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->model = new Breeding($pdo);
        $this->eggs = new Eggs($pdo);
        $this->logs = new BreedingLogs($pdo);
    }

    public function index() {
        $data = $this->model->getAll();
        response("success","List of breedings", $data);
    }

    public function show($id) {
        $item = $this->model->getById($id);
        response("success","Single breeding", $item);
    }

    public function create($data) {
        try {
            $this->pdo->beginTransaction();

            $this->model->create($data);
            $id=$this->pdo->lastInsertId();
            $uuid = generateUUID($id, 'BR');
            $this->model->update($id, ['uuid' => $uuid]);
            $control= new EggsController($this->pdo);
            $this->pdo->commit();
            $isOk=$control->initEggs([
                'breedingId' => $id,
                'total' => 0,
                'hatched' => 0,
                'brokendeggs' => 0,
                'badeggs' => 0,
                'sales' => 0
            ]);

            if($isOk){
                $result = $this->model->getById($id);
                response("success","Breeding created", $result);
            }else{
                response("error","eggs don't init", []);
            }

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            response("error","Error creating breeding",  $e->getMessage());
        }
    }

    public function update($id,$data) {
        $breeding = $this->model->getById($id);

        if ($breeding['status'] !== $data['status']) {
            $this->logs->create([
                'breedingId' => $id,
                'type' => $data['status']
            ]);
        }

        $this->model->update($id, $data);
        $updated = $this->model->getById($id);
        response("success","Breeding updated", $updated);
    }

    // public function update($id,$data) {
    //     $this->model->update($id, $data);
    //     $updated = $this->model->getById($id);
    //     response('Breeding updated', true, $updated);
    // }
  
    public function delete($id) {
        if ($this->model->delete($id)) {
            response("success","Breeding deleted",intval($id));
        } else {
            http_response_code(500);
            response("error",false,"");
        }
    }
}

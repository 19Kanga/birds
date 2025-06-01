<?php
require_once __DIR__ . '/../models/Eggs.php';
require_once __DIR__ . '/../models/EggsLogs.php';
require_once __DIR__ . '/../utils/response.php';

class EggsController
{
    private $pdo;
    private Eggs $model;
    private EggsLogs $logs;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->model = new Eggs($pdo);
        $this->logs = new EggsLogs($pdo);
    }

    public function show($id)
    {
        $item = $this->model->getByBreedingId($id);
        response("success", "Single eggs", $item);
    }

    public function getAll()
    {
        $cageList = $this->model->getBreedingAll();
        response("success", true, $cageList);
    }

    public function initEggs($data)
    {
        try {
            $this->pdo->beginTransaction();

            $this->model->create($data);
            $id = $this->pdo->lastInsertId();
            $uuid = generateUUID($id, 'EG');
            $this->model->update($id, ['uuid' => $uuid]);
            $this->pdo->commit();

            // $result = $this->model->getById($id);
            // response("success","Breeding created", $result);
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            // response("error","Error creating breeding",  $e->getMessage());
            return false;
        }
    }

    public function update($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->pdo->beginTransaction();
        $this->model->update($id, $data);
        // $fiels=[];
        // $allowedFields = [
        //     "eggsId",
        //     "qte",
        //     "type"
        // ];
        // foreach ($allowedFields as $field) {
        //     if (isset($data[$field])) {
        //         $fields[$field] = $data[$field];
        //     }
        // }

        // $this->logs->create($fields);

        // Ajout dans eggslogs
        foreach ($data as $key => $value) {
            if (in_array($key, ['total', 'hatched', 'brokeneggs', 'badeggs'])) {
                $this->logs->create([
                    'eggsId' => $id,
                    'qte' => $value,
                    'type' => $this->getType($key)
                ]);
            }
        }

        $this->pdo->commit();
        $updated = $this->model->getByBreedingId($id);
        response("success", "Eggs updated", $updated);
    }

    public function updateEggs($id,$data)
    {
        try {
            $this->pdo->beginTransaction();
            $this->model->update($id, $data);

            foreach ($data as $key => $value) {
                if (in_array($key, ['total', 'hatched', 'brokeneggs', 'badeggs','sales'])) {
                    $this->logs->create([
                        'eggsId' => $id,
                        'qte' => $value,
                        'type' => $this->getType($key)
                    ]);
                }
            }

            $this->pdo->commit();
            $updated = $this->model->getByBreedingId($id);
           return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }

    public function getType($x)
    {
        if ($x === "total") {
            return "add";
        } else if ($x === "hatched") {
            return "hatched";
        } else if ($x === "brokendeggs") {
            return "brokendeggs";
        } else if ($x === "badeggs") {
            return "badeggs";
        }else{
            return "sales";
        }
    }
}

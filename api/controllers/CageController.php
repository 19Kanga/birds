<?php
require_once __DIR__ . '/../models/Cage.php';

class CageController {
    private $cage;

    public function __construct($db) {
        $this->cage = new Cage($db);
    }

    // Créer une cage
    public function create($data) {
        if ($this->cage->create($data)) {
            echo json_encode(['message' => 'Cage créée avec succès']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'La cage avec ce nom existe déjà']);
        }
    }

    // Obtenir toutes les cages
    public function getAll() {
        $cageList = $this->cage->getAll();
        echo json_encode($cageList);
    }

    // Obtenir une cage par ID
    public function getById($id) {
        $cage = $this->cage->getById($id);
        if ($cage) {
            echo json_encode($cage);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Cage non trouvée']);
        }
    }

    // Mettre à jour une cage
    public function update($data) {
        if ($this->cage->update($data)) {
            echo json_encode(['message' => 'Cage mise à jour']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'La cage avec ce nom existe déjà']);
        }
    }

    // Supprimer une cage
    public function delete($id) {
        if ($this->cage->delete($id)) {
            echo json_encode(['message' => 'Cage supprimée']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la suppression']);
        }
    }
}

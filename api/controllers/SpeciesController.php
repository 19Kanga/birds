<?php
require_once __DIR__ . '/../models/Species.php';

class SpeciesController {
    private $species;

    public function __construct($db) {
        $this->species = new Species($db);
    }

    // Créer une espèce
    public function create($data) {
        if ($this->species->create($data)) {
            echo json_encode(['message' => 'Espèce créée avec succès']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la création']);
        }
    }

    // Obtenir toutes les espèces
    public function getAll() {
        $speciesList = $this->species->getAll();
        echo json_encode($speciesList);
    }

    // Obtenir une espèce par ID
    public function getById($id) {
        $species = $this->species->getById($id);
        if ($species) {
            echo json_encode($species);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Espèce non trouvée']);
        }
    }

    // Mettre à jour une espèce
    public function update($data) {
        if ($this->species->update($data)) {
            echo json_encode(['message' => 'Espèce mise à jour']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la mise à jour']);
        }
    }

    // Supprimer une espèce
    public function delete($id) {
        if ($this->species->delete($id)) {
            echo json_encode(['message' => 'Espèce supprimée']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la suppression']);
        }
    }
}

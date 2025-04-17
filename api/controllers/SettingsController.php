<?php
require_once __DIR__ . '/../models/Settings.php';

class SettingsController {
    private $settings;

    public function __construct($db) {
        $this->settings = new Settings($db);
    }

    // Créer une nouvelle configuration
    public function create($data) {
        if ($this->settings->create($data)) {
            echo json_encode(['message' => 'Configuration créée avec succès']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la création']);
        }
    }

    // Obtenir toutes les configurations
    public function getAll() {
        $settingsList = $this->settings->getAll();
        echo json_encode($settingsList);
    }

    // Obtenir une configuration par ID
    public function getById($id) {
        $setting = $this->settings->getById($id);
        if ($setting) {
            echo json_encode($setting);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Configuration non trouvée']);
        }
    }

    // Mettre à jour une configuration
    public function update($data) {
        if ($this->settings->update($data)) {
            echo json_encode(['message' => 'Configuration mise à jour']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la mise à jour']);
        }
    }

    // Supprimer une configuration
    public function delete($id) {
        if ($this->settings->delete($id)) {
            echo json_encode(['message' => 'Configuration supprimée']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la suppression']);
        }
    }
}

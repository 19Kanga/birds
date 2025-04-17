<?php
require_once __DIR__ . '/../models/Role.php';

class RoleController {
    private $role;

    public function __construct($db) {
        $this->role = new Role($db);
    }

    // Créer un rôle
    public function create($data) {
        if ($this->role->create($data)) {
            echo json_encode(['message' => 'Rôle créé avec succès']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Le rôle avec ce nom existe déjà']);
        }
    }

    // Obtenir tous les rôles
    public function getAll() {
        $roleList = $this->role->getAll();
        echo json_encode(["status"=>true,"message"=>"success","result"=>$roleList]);
    }

    // Obtenir un rôle par ID
    public function getById($id) {
        $role = $this->role->getById($id);
        if ($role) {
            echo json_encode($role);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Rôle non trouvé']);
        }
    }

    // Mettre à jour un rôle
    public function update($data) {
        if ($this->role->update($data)) {
            echo json_encode(['message' => 'Rôle mis à jour']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Le rôle avec ce nom existe déjà']);
        }
    }

    // Supprimer un rôle
    public function delete($id) {
        if ($this->role->delete($id)) {
            echo json_encode(['message' => 'Rôle supprimé']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la suppression']);
        }
    }
}

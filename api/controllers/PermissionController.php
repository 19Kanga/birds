<?php
require_once __DIR__ . '/../models/Permission.php';

class PermissionController {
    private $permission;

    public function __construct($db) {
        $this->permission = new Permission($db);
    }

    // Créer une permission
    public function create($data) {
        if ($this->permission->create($data)) {
            echo json_encode(['message' => 'Permission créée avec succès']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'La permission avec ce nom existe déjà']);
        }
    }

    // Obtenir toutes les permissions
    public function getAll() {
        $permissionList = $this->permission->getAll();
        echo json_encode(["status"=>true,"message"=>"success","result"=>$permissionList]);
    }

    // Obtenir une permission par ID
    public function getById($id) {
        $permission = $this->permission->getById($id);
        if ($permission) {
            echo json_encode($permission);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Permission non trouvée']);
        }
    }

    // Mettre à jour une permission
    public function update($data) {
        if ($this->permission->update($data)) {
            echo json_encode(['message' => 'Permission mise à jour']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'La permission avec ce nom existe déjà']);
        }
    }

    // Supprimer une permission
    public function delete($id) {
        if ($this->permission->delete($id)) {
            echo json_encode(['message' => 'Permission supprimée']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erreur lors de la suppression']);
        }
    }
}

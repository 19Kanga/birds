<?php
require_once __DIR__ . '/../models/RoleHasPermission.php';

class RoleHasPermissionController {
    private $roleHasPermission;

    public function __construct($db) {
        $this->roleHasPermission = new RoleHasPermission($db);
    }

    // Assigner une permission à un rôle
    public function assignPermission($roleId, $permissionId) {
        if ($this->roleHasPermission->assignPermission(roleId: $roleId, permissionId: $permissionId)) {
            $result=$this->roleHasPermission->getAllPermissions();
            echo json_encode(["status"=>true,'message' => 'Permission assignée avec succès',"result"=>$result]);
        } else {
            http_response_code(400);
            echo json_encode(["status"=>false,'message' => 'Erreur lors de l\'assignation de la permission']);
        }
    }

    // Supprimer une permission d'un rôle
    public function removePermission($roleId, $permissionId) {
        if ($this->roleHasPermission->removePermission($roleId, $permissionId)) {
            $result=$this->roleHasPermission->getAllPermissions();
            echo json_encode(["status"=>true,'message' => 'Permission supprimée avec succès',"result"=>$result]);
        } else {
            http_response_code(400);
            echo json_encode(["status"=>false,'message' => 'Erreur lors de la suppression de la permission']);
        }
    }

    // Récupérer toutes les permissions pour chaque rôle
    public function getPermissions() {
        $permissions = $this->roleHasPermission->getAllPermissions();
        echo json_encode(["status"=>true,"result"=>$permissions]);
    }

    // public function getPermissionById($id) {
    //     // $permissions = $this->roleHasPermission->getAllPermition($id);
    //     $permissions = $this->roleHasPermission->getAllPermissions();
    //     // error_log(json_encode($permissions));
    //     echo json_encode(["status"=>true,"result"=>$permissions]);
    // }
}

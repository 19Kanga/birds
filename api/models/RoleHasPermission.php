<?php
class RoleHasPermission {
    private $conn;
    private $table = "rolehaspermission";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ajouter une permission à un rôle
    public function assignPermission($roleId, $permissionId) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (roleId, permissionId) VALUES (:roleId, :permissionId)");
        $stmt->bindParam(':roleId', $roleId);
        $stmt->bindParam(':permissionId', $permissionId);
        return $stmt->execute();
    }

    // Supprimer une permission d'un rôle
    public function removePermission($roleId, $permissionId) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE roleId = :roleId AND permissionId = :permissionId");
        $stmt->bindParam(':roleId', $roleId);
        $stmt->bindParam(':permissionId', $permissionId);
        return $stmt->execute();
    }

    // Obtenir toutes les permissions d'un rôle
    public function getPermissionsByRole($roleId) {
        $stmt = $this->conn->prepare("SELECT permissionId FROM {$this->table} WHERE roleId = :roleId");
        $stmt->bindParam(':roleId', $roleId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtenir toutes les permissions de tous les rôles sous forme de tableau
    public function getAllPermissions() {
        $stmt = $this->conn->prepare("SELECT roleId, permissionId FROM {$this->table}");
        $stmt->execute();
        $permissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($permissions as $permission) {
            $result[$permission['roleId']][] = $permission['permissionId'];
        }

        return $result;
    }
    public function getAllPermition($id) {
        $sql = "SELECT * from rolehaspermission where roleId=:roleId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':roleId', $id);
        $stmt->execute();

        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $permissions = array_column($result, 'permissionId');
        // header('Content-Type: application/json');
        return $result;
    }
       
}

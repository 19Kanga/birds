<?php
class RoleHasPermission {
    private $conn;
    private $table = "rolehaspermission";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function assignPermission($roleId, $permissionId) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (roleId, permissionId) VALUES (:roleId, :permissionId)");
        $stmt->bindParam(':roleId', $roleId);
        $stmt->bindParam(':permissionId', $permissionId);
        return $stmt->execute();
    }

    public function removePermission($roleId, $permissionId) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE roleId = :roleId AND permissionId = :permissionId");
        $stmt->bindParam(':roleId', $roleId);
        $stmt->bindParam(':permissionId', $permissionId);
        return $stmt->execute();
    }

    public function getPermissionsByRole($roleId) {
        $stmt = $this->conn->prepare("SELECT permissionId FROM {$this->table} WHERE roleId = :roleId");
        $stmt->bindParam(':roleId', $roleId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPermissions() {
        $stmt = $this->conn->prepare("SELECT rh.roleId, rh.permissionId, r.name as role FROM {$this->table} rh, role r where rh.roleId=r.id");
        $stmt->execute();
        $permissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($permissions as $permission) {
            $result[$permission['role']][] = $permission['permissionId'];
        }

        return $result;
    }
    public function getPermissionById($id) {
        $sql = "SELECT * from rolehaspermission where roleId=:roleId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':roleId', $id);
        $stmt->execute();

        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function deleteAllPermitionByRole($role) {
        $sql = "DELETE from rolehaspermission where roleId=:roleId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':roleId', $role);
        return $stmt->execute();
    }
         
}

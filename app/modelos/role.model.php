<?php

require_once "conexion.php";

class RoleModel{

    public static function mdlRoleSave($data){
        $stmt = Conexion::conectar()->prepare("INSERT INTO roles (role_name, role_description) VALUES (:role, :description)");
        $stmt->bindParam(":role", $data["role_name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["role_description"], PDO::PARAM_STR);

        return $stmt->execute() ? "ok" : "error";
    }

    public static function mdlGetAllRoles(){
       $stmt = Conexion::conectar()->prepare("SELECT * FROM roles");
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

        public static function mdlAssignRoleToUser($userId, $roleId) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO user_role (fk_id_user, fk_id_role) VALUES (:user, :role)");
        $stmt->bindParam(":user", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":role", $roleId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
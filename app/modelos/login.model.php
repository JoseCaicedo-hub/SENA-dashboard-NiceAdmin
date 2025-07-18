<?php
require_once "conexion.php";

class LoginModel{

    static public function mdlVerifyUser($value){
        $sql = "SELECT * FROM users WHERE user_email = :email";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":email", $value, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function mdlVerifyRole($userId){
        $sql = "SELECT fk_id_role FROM user_role WHERE fk_id_user = :userid";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":userid", $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function mdlVerifyNameRole($roleId){
        $sql = "SELECT role_name FROM roles WHERE pk_id_role = :roleid";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":roleid", $roleId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
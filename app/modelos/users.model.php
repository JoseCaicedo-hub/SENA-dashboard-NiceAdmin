<?php

require_once "conexion.php";

class UserModel{

    public static function mdlUserSave($data){
        $stmt = Conexion::conectar()->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (:name, :email, :password)");

        $stmt->bindParam(":name", $data["user_name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["user_email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["user_password"], PDO::PARAM_STR);

        return $stmt->execute() ? "ok" : "error";
    }

    public static function mdlGetAllUsers(){
       $stmt = Conexion::conectar()->prepare("SELECT * FROM users");
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mdlUserUpdate($data) {
        $db = Conexion::conectar();

        if (!empty($data["password"])) {
            $sql = "UPDATE users SET user_name = :name, user_email = :email, user_password = :password WHERE pk_id_user = :id";
        } else {
            $sql = "UPDATE users SET user_name = :name, user_email = :email WHERE pk_id_user = :id";
        }

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

        if (!empty($data["password"])) {
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        }

        return $stmt->execute() ? "ok" : "error";
    }

    public static function mdlUserDelete($id) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM users WHERE pk_id_user = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute() ? "ok" : "error";
    }

}
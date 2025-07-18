<?php

require_once "app/modelos/users.model.php";

class UserController{

    public static function ctrUserSave() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userName = trim($_POST["userName"]);
            $userEmail = filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL);
            $userPassword = $_POST["userPassword"];

            $passwordHash = password_hash($userPassword, PASSWORD_DEFAULT);

            $data = [
                "user_name" => $userName,
                "user_email" => $userEmail,
                "user_password" => $passwordHash
            ];

            $response = UserModel::mdlUserSave($data);

            // Mensaje SweetAlert
            $_SESSION["message"] = $response === "ok"
                ? "Usuario registrado correctamente"
                : "Error al registrar usuario";
            $_SESSION["message_type"] = $response === "ok" ? "success" : "error";

            // Redirección para recargar la tabla
            header("Location: index.php?route=users");
            exit;
        }
    }


    public static function ctrGetAllUsers(){
        return UserModel::mdlGetAllUsers();
    }

    public static function ctrUserUpdate() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["userId"];
            $name = trim($_POST["userName"]);
            $email = filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL);
            $password = $_POST["userPassword"];

            $data = [
                "id" => $id,
                "name" => $name,
                "email" => $email,
            ];

            // Si se ingresó nueva contraseña, la encriptamos
            if (!empty($password)) {
                $data["password"] = password_hash($password, PASSWORD_DEFAULT);
            }

            $response = UserModel::mdlUserUpdate($data);

            $_SESSION["message"] = $response === "ok" ? "Usuario actualizado correctamente" : "Error al actualizar usuario";
            $_SESSION["message_type"] = $response === "ok" ? "success" : "error";

            header("Location: index.php?route=users");
            exit;
        }
    }

    public static function ctrUserDelete($id) {
        $response = UserModel::mdlUserDelete($id);
        
        session_start();
        if ($response === "ok") {
            $_SESSION["message"] = "Usuario eliminado correctamente";
            $_SESSION["message_type"] = "success";
        } else {
            $_SESSION["message"] = "Error al eliminar el usuario";
            $_SESSION["message_type"] = "error";
        }
        header("Location: index.php?route=users");
        exit;
    }

}
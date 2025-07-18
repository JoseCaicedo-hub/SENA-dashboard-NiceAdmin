<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once "app/controladores/plantilla.controlador.php";
require_once "app/controladores/login.controller.php";
require_once "app/controladores/users.controller.php";
require_once "app/controladores/role.controller.php";
require_once "app/modelos/login.model.php";
require_once "app/modelos/users.model.php";
require_once "app/modelos/role.model.php";
require_once "app/modelos/conexion.php";

//Iniciar sesión
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["route"], $_GET["action"]) &&
    $_GET["route"] === "login" &&
    $_GET["action"] === "verify"
  ){
    $loginController = new LoginController();
    $loginController->ctrVerifyUser();
    exit;
}

//Registrar usuario
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["route"], $_GET["action"]) &&
    $_GET["route"] === "users" &&
    $_GET["action"] === "save"
  ){
    $userController = new UserController();
    $userController->ctrUserSave();
    exit;
}

//Registrar rol
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["route"], $_GET["action"]) &&
    $_GET["route"] === "role" &&
    $_GET["action"] === "save"
  ){
    $roleController = new RoleController();
    $roleController->ctrRoleSave();
    exit;
}

// Actualizar usuario
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["route"], $_GET["action"]) &&
    $_GET["route"] === "users" &&
    $_GET["action"] === "update"
) {
    $userController = new UserController();
    $userController->ctrUserUpdate();
    exit;
}

// Eliminar usuario
if (
    $_SERVER["REQUEST_METHOD"] === "GET" &&
    isset($_GET["route"], $_GET["action"], $_GET["id"]) &&
    $_GET["route"] === "users" &&
    $_GET["action"] === "delete"
) {
    $userController = new UserController();
    $userController->ctrUserDelete((int)$_GET["id"]);
    exit;
}

//Registrar rol al usuario
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["route"], $_GET["action"]) &&
    $_GET["route"] === "roleUser" &&
    $_GET["action"] === "assign"
  ){
    $roleAssignController = new RoleController();
    $roleAssignController->ctrRoleAssign();
    exit;
}

// Cerrar sesión
if (
    isset($_GET["route"], $_GET["action"]) &&
    $_GET["route"] === "logout" &&
    $_GET["action"] === "exit"
) {
    $loginController = new LoginController();
    $loginController->ctrLogout();
    exit;
}

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
<?php
// Incluir el autoloader de Composer para cargar automáticamente las clases
require_once '../../../../vendor/autoload.php';

use Octobyte\ViaUy\Controllers\UserController;

session_start();

// Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
    header('Location: /via_uy');
    exit();
}

$dir = "c://xampp/htdocs/via_uy/";

require_once($dir . "src/controllers/userController.php");

if ($_SESSION['user_id'] == $_GET['id']) {
    header('Location: dashboard.php');
    exit();
}

$obj = new UserController();
$obj->delete($_GET['id']);
?>

<?php
// Incluir el autoloader de Composer para cargar automáticamente las clases
require_once '../../../vendor/autoload.php';

session_start();

// Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
    header('Location: /via_uy');
    exit(); // El usuario no es administrador o no ha iniciado sesión
}

use Octobyte\ViaUy\Controllers\busesController; 

// Crea una instancia del controlador de autobuses y llama al método update
$busesController = new busesController();
$busesController->update($_POST['id'], $_POST['modelo']);
?>

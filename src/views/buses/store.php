<?php
// Incluir el autoloader de Composer para cargar automáticamente las clases
require_once '../../../vendor/autoload.php';

session_start();

// Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
    header('Location: /via_uy');
    exit(); // El usuario no es administrador o no ha iniciado sesión
}

// Utiliza el namespace y la ruta relativa adecuada para acceder al archivo de controlador
use Octobyte\ViaUy\Controllers\busesController; 

// Crea una instancia del controlador de autobuses y llama al método guardar
$busesController = new busesController();
$busesController->guardar($_POST['modelo']);

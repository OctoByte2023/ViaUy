<?php
    session_start();
      // Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
        header('Location: /via_uy'); 
        exit(); // El usuario no es administrador o no ha iniciado sesión
    }

    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/controllers/busesController.php");
    $obj = new busesController();
    $obj->update($_POST['id'], $_POST['modelo'])
?>
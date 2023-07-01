<?php
    session_start();

     // Redirigir al formulario de inicio de sesión si no hay sesión activa
     if (!isset($_SESSION['user_id'])) {
        header('Location: /via_uy/src/views/user/login.php'); 
        exit();
    }


    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/controllers/busesController.php");
    $obj = new busesController();
    $obj->update($_POST['id'], $_POST['modelo'])
?>
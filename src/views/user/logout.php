<?php
    // Incluir el autoloader de Composer para cargar automáticamente las clases
    require_once '../../../vendor/autoload.php';

    session_start();

    // Desactivar y destruir la sesión actual
    session_unset();
    session_destroy();

    // Redireccionar a la página de inicio de sesión
    header('Location: /via_uy/src/views/user/login.php');
    exit();
?>

<?php
    require_once("c://xampp/htdocs/via_uy/controllers/busesController.php");
    $obj = new busesController();
    $obj->guardar($_POST['modelo']);
?>
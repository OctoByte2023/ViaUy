<?php
    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/controllers/busesController.php");
    $obj = new busesController();
    $obj->update($_POST['id'], $_POST['modelo'])
?>
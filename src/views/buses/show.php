<?php
    $dir= "c://xampp/htdocs/via_uy/";

    require_once($dir."src/views/partials/head.php");
    require_once($dir."src/controllers/busesController.php");
    $obj = new busesController();
    $date = $obj->show($_GET['id']);
?>
<h2 class="text-center">Detalles del Registro</h2>
<section class="pb-3">
    <a href="index.php" class="normal-btn save">Regresar</a>
    <a href="edit.php?id=<?= $date["id"]?>" class="normal-btn success">Actualizar</a>
    <a href="delete.php?id=<?= $date["id"]?>" class="normal-btn danger">Eliminar</a>
</section>


<table class="table container-fluid">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Modelo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col"><?= $date["id"]?></td>
            <td scope="col"><?= $date["modelo"]?></td>
        </tr>
    </tbody>
</table>


<?php
    require_once($dir."src/views/partials/footer.php");
?>

<?php
    require_once("c://xampp/htdocs/via_uy/views/partials/head.php");
    require_once("c://xampp/htdocs/via_uy/controllers/busesController.php");
    $obj = new busesController();
    $date = $obj->show($_GET['id']);
?>
<h2 class="text-center">Detalles del Registro</h2>
<section class="pb-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <a href="edit.php?id=<?= $date["id"]?>" class="btn btn-success">Actualizar</a>

    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Desea eliminar el Bus?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Eliminar Bus <b><?= $date['modelo']?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="delete.php?id=<?= $date["id"]?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
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
    require_once("c://xampp/htdocs/via_uy/views/partials/footer.php")
?>

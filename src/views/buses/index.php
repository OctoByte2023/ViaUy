<?php
    $dir= "c://xampp/htdocs/via_uy/";

    require_once($dir."src/views/partials/head.php");
    require_once($dir."src/controllers/busesController.php");
    $obj = new busesController();
    $rows = $obj->index();
?>

<section class="mb-3">
    <a href="/via_uy/src/view/buses/create.php" class="btn btn-primary">Agregar nuevo Bus</a>
</section>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Modelo</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th><?= $row[0]?></th>
                    <th><?= $row[1]?></th>
                    <th>
                        <a href="show.php?id=<?= $row[0]?>" class="btn btn-primary">Ver</a>
                        <a href="edit.php?id=<?= $row[0]?>" class="btn btn-success">Modificar</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Desea eliminar el Bus?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Eliminar Bus <b><?= $row[1]?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?id=<?= $row[0]?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay buses</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
    require_once($dir."src/views/partials/footer.php");
?>

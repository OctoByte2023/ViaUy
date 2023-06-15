<?php
    $dir= "c://xampp/htdocs/via_uy/";

    require_once($dir."src/views/partials/head.php");
    require_once($dir."src/controllers/busesController.php");
    $obj = new busesController();
    $rows = $obj->index();
?>

<section class="mb-3">
    <a href="/via_uy/src/views/buses/create.php" class="normal-btn success">Agregar nuevo Bus</a>
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
                        <a href="show.php?id=<?= $row[0]?>" class="normal-btn save">Ver</a>
                        <a href="edit.php?id=<?= $row[0]?>" class="normal-btn success">Modificar</a>
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

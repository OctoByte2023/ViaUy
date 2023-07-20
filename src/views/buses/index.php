<?php
    // Incluir el autoloader de Composer para cargar automáticamente las clases
    require_once '../../../vendor/autoload.php';

    // Utiliza el namespace y la ruta relativa adecuada para acceder al archivo de controlador
    use Octobyte\ViaUy\Controllers\busesController; 

    // Crea una instancia del controlador de autobuses
    $busesController = new busesController();

    // Obtener todos los registros de autobuses
    $rows = $busesController->index();
?>

<?php require_once '../partials/head.php'; ?>

<section class="mb-3">
    <a href="/via_uy/src/views/buses/create.php" class="normal-btn success">Agregar nuevo Bus</a>
</section>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Modelo</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <th><?= $row[0] ?></th>
                    <th><?= $row[1] ?></th>
                    <th>
                        <a href="show.php?id=<?= $row[0] ?>" class="normal-btn save">Ver</a>
                        <a href="edit.php?id=<?= $row[0] ?>" class="normal-btn success">Modificar</a>
                        <a href="delete.php?id=<?= $row[0] ?>" class="normal-btn danger">Eliminar</a>
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

<?php require_once '../partials/footer.php'; ?>

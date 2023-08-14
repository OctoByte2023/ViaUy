<?php
require_once '../../../vendor/autoload.php';

use Octobyte\ViaUy\Controllers\busesController;
$busesController = new busesController();

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$rows = $busesController->searchByModel($searchTerm);

require_once('../partials/head.php');
?>

<?php if (!empty($searchTerm)): ?>
    <p>Resultados de búsqueda para: <b><?= $searchTerm ?></b></p>
    <?php if (!empty($rows)): ?>
        <?php foreach ($rows as $row): ?>
            <br>
            <a href="show.php?id=<?= $row[0] ?>" class="normal-btn save">Ver</a>
            <b>Modelo: <?= $row['modelo'] ?></b>
            <br>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron resultados</b></p>
    <?php endif; ?>
<?php else: ?>
    <p>No se ingresó ningún término de búsqueda</p>
<?php endif; ?>

<?php require_once('../partials/footer.php'); ?>

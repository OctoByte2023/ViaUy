<?php
require_once('c://xampp/htdocs/via_uy/src/controllers/busesController.php');
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

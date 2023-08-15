<?php
require_once '../../../vendor/autoload.php';

use Octobyte\ViaUy\Controllers\busesController;
$busesController = new busesController();

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$rows = $busesController->searchByModel($searchTerm);

require_once('../partials/head.php');
?>
<div class="container">
    <?php if (!empty($searchTerm)): ?>
        <p>Resultados de búsqueda para: <b><?= $searchTerm ?></b></p>
        <div class="search-results">
            <?php if (!empty($rows)): ?>
                <?php foreach ($rows as $row): ?>
                    <div class="result-item">
                        <a href="show.php?id=<?= $row[0] ?>" class="btn">Ver</a>
                        <span class="result-title">Modelo: <?= $row['modelo'] ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No se encontraron resultados</p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p>No se ingresó ningún término de búsqueda</p>
    <?php endif; ?>
</div>

<?php require_once('../partials/footer.php'); ?>

<script>
    cambiarTitulo('"<?= $searchTerm ?>" - ViaUy');
</script>

<?php
require_once 'vendor/autoload.php';

$route = isset($_GET['route']) ? $_GET['route'] : '';

if ($route === 'company/petition') {
    require_once 'src/views/company/petition.php';
} else {
    // Manejar otras rutas o mostrar una página de error
}
?>

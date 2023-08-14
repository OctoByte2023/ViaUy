<?php
require_once '../../vendor/autoload.php';

$route = isset($_GET['route']) ? $_GET['route'] : '';

if ($route === 'company/petition') {
    require_once '../views/company/petition.php';
}


if ($route === 'company/profile') {
    require_once '../views/company/profile.php';
}
?>

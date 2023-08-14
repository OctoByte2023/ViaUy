<?php
require_once '../../vendor/autoload.php';

$route = isset($_GET['route']) ? $_GET['route'] : '';

if ($route === 'user/') {
    require_once '../views/user/profile.php';
}

if ($route === 'login') {
    require_once '../views/user/login.php';
}
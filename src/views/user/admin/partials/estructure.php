<?php
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/via_uy/src/public/css/dashboard1.css">
    <script src="https://kit.fontawesome.com/d1b7ca4fc4.js" crossorigin="anonymous"></script>

    <title>Dashboard</title>
</head>
<body>
    
<aside class="dashboard-aside">
    <div class="aside-profile">
        <a href="/via_uy" class="aside-profile-username">Via<span class="username-span">Uy</span></a>
    </div>
    <ul class="aside-links">
        <p class="aside-links-subtitle">Inicio</p>
        <li class="aside-links-li">
            <ul class="aside-links-li-ul">
                    <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            </ul>
        </li>
        <p class="aside-links-subtitle">Usuarios</p>
        <li class="aside-links-li">
            <ul class="aside-links-li-ul">
                    <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-users"></i>Clientes</a></li>
                    <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-sharp fa-solid fa-gears"></i>Administradores</a></li>
            </ul>
        </li>
        <p class="aside-links-subtitle">Base de Datos</p>
        <li class="aside-links-li">
            <ul class="aside-links-li-ul">
            <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-bus"></i>Buses</a></li>
                    <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-route"></i>Rutas</a></li>
                    <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-ticket"></i>Boletos</a></li>
            </ul>
        </li>
        <p class="aside-links-subtitle">Contenidos</p>
        <li class="aside-links-li">
            <ul class="aside-links-li-ul">
            <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-home"></i>Inicio</a></li>
                    <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-tag"></i>Ofertas</a></li>
                    <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-circle-info"></i>Ayuda</a></li>
            </ul>
        </li>
        <p class="aside-links-subtitle">Empresas</p>
        <li class="aside-links-li">
            <ul class="aside-links-li-ul">
                <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-copyright"></i>Empresas</a></li>
                <li class="aside-links-li-ul-li"><a href="" class="aside-links-li-ul-li-a"><i class="fa-solid fa-hourglass-start"></i>Solicitudes</a></li>
            </ul>
        </li>
    </ul>
</aside>



<header class="dashboard-header">
    <form class="dashboard-header-search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="search" name="" placeholder="Search..." id="">
        <button>Search</button>
    </form>
    <div class="dashboard-header-profile">
        <p><?= $_SESSION['user_name']?></p>
    </div>
</header>
<div class="dashboard-body">

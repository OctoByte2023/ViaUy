<?php
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/via_uy/src/public/css/dashboard.css">
    <script src="https://kit.fontawesome.com/d1b7ca4fc4.js" crossorigin="anonymous"></script>

    <title>Dashboard</title>
</head>
<body>
    
<aside class="dashboard-aside">
    <div class="aside-profile">
        <p class="aside-profile-username"><?= $_SESSION['user_name']?></p>
    </div>
    <ul class="aside-links">
        <li class="aside-links-li"><a href="" class="aside-links-li-a"><i class="fa-solid fa-house"></i>Dashboard</a></li>
        <li class="aside-links-li"><a href="" class="aside-links-li-a"><i class="fa-solid fa-users"></i>Usuarios</a></li>
        <li class="aside-links-li"><a href="" class="aside-links-li-a"><i class="fa-solid fa-bus"></i>Buses</a></li>
        <li class="aside-links-li"><a href="" class="aside-links-li-a"><i class="fa-solid fa-route"></i>Rutas</a></li>
    </ul>
</aside>

<header class="dashboard-header">

</header>


<div class="dashboard-body">

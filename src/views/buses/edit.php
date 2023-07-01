<?php
     
    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/views/partials/head.php");
    require_once($dir."src/controllers/busesController.php");
    
    // Redirigir al formulario de inicio de sesión si no hay sesión activa
    if (!isset($_SESSION['user_id'])) {
        header('Location: /via_uy/src/views/user/login.php'); 
        exit();
    }
    $obj = new busesController();
    $bus = $obj->show($_GET['id']); 
    print_r($bus);
?>

<form action="update.php" method="post" autocomplete="off">
    <h2>Modificando bus</h2>

    <label for="">id: <?= $bus['id']?></label>
    <br>
    <input type="text" name="modelo" class="normal-input" value="<?= $bus['modelo']?>">
    <br>
    <input type="hidden" name="id" value="<?= $bus['id']?>">
    <input type="submit" class="normal-btn success" value="Actualizar">
    <a href="show.php?id=<?= $bus['id']?>" class="normal-btn danger" >Cancelar</a>
</form>



<?php
    require_once($dir."src/views/partials/footer.php");
?>

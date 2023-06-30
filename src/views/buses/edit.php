<?php
    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/views/partials/head.php");
    require_once($dir."src/controllers/busesController.php");
    $obj = new busesController();
    $bus = $obj->show($_GET['id']); 
    print_r($bus);
?>

<form action="update.php" method="post" autocomplete="off">
    <h2>Modificando bus</h2>

    <label for="">id--<?= $bus['id']?></label>
    <input type="text" name="modelo" value="<?= $bus['modelo']?>">
    <input type="hidden" name="id" value="<?= $bus['id']?>">
    <input type="submit" class="normal-btn success" value="Actualizar">
    <a href="show.php?id=<?= $bus['id']?>" class="normal-btn danger" >Cancelar</a>
</form>



<?php
    require_once($dir."src/views/partials/footer.php");
?>

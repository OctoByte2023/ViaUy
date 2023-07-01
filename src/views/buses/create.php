<?php
    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/views/partials/head.php");
    
    // Redirigir al formulario de inicio de sesión si no hay sesión activa
    if (!isset($_SESSION['user_id'])) {
      header('Location: /via_uy/src/views/user/login.php'); 
      exit();
    }
  
?>


<form action="store.php" method="POST" autocomplate="off">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Modelo del Bus</label>
    <input type="text" required name="modelo" class="normal-input" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="normal-btn success">Guardar</button>
  <a href="index.php" class="normal-btn danger">Cancelar</a>
</form>


<?php
    require_once($dir."src/views/partials/footer.php");
?>

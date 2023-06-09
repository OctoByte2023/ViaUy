<?php
   $dir = "c://xampp/htdocs/via_uy/";
   require_once($dir."src/views/partials/head.php");   
    if (isset($_SESSION['user_id'])) {
        header('Location: /via_uy');
        exit();
    }
   
   require_once($dir.'/config/db.php');
   require_once($dir.'/src/controllers/userController.php');
   
   $message = UserController::handleSignup($_POST);
?>

<section class="login-container">
    <form action="signup.php" class="login-form" method="POST" autocomplete="off">
        <h2 class="login-form-title">Registrarte</h2>
        <?php if(!empty($message)): ?>
          <p> <?= $message ?></p>
        <?php endif; ?>

        <label for="login-input-mail">Email</label>
        <input type="email" name="email" class="login-input" id="login-input-mail" autocomplete="off" placeholder="Introduce tu Email">

        <label for="login-input-username">Nombre de usuario</label>
        <input type="text" name="username" class="login-input" id="login-input-username" autocomplete="off" placeholder="Introduce tu Nombre de usuario">

        <label for="login-input-password">Contraseña</label>
        <input type="password" name="password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Introduce tu Contraseña">

        <label for="login-input-password">Confirmar Contraseña</label>
        <input type="password" name="verify-password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Confirma tu Contraseña">
        
        <input type="submit" value="Registrarse">
    </form>
    <p>¿Ya tienes una cuenta? <a href="/via_uy/src/views/user/login.php">Iniciar Sesión</a></p>
</section>

<?php
    require_once($dir."src/views/partials/footer.php");
?>

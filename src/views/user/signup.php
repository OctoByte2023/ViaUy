<?php
    // Incluir el autoloader de Composer para cargar automáticamente las clases
    require_once '../../../vendor/autoload.php';


    // Incluir el archivo de cabecera
    require_once '../partials/head.php';   

    if (isset($_SESSION['user_id'])) {
        header('Location: /via_uy');
        exit();
    }
   
    require_once '../../../config/db.php';
    use Octobyte\ViaUy\Controllers\userController;
   
    $message = UserController::handleSignup($_POST);
?>

<section class="login-container">
    <form action="/via_uy/src/views/user/signup.php" class="login-form" method="POST" autocomplete="off">
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
    require_once '../partials/footer.php';
?>

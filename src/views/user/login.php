<?php
$dir = "c://xampp/htdocs/via_uy/";
require_once($dir.'/src/controllers/userController.php');
require_once($dir . "src/views/partials/head.php");
if (isset($_SESSION['user_id'])) {
    header('Location: /via_uy');
    exit();
}

UserController::handleLogin();
$message = UserController::handleLogin();

?>
<section class="login-container">
    <form action="login.php" class="login-form" method="POST" autocomplete="off">
        <h2 class="login-form-title">Iniciar Sesion</h2>
        <?php if (!empty($message)) : ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <label for="login-input-mail">Email o Nombre de usuario</label>
        <input type="text" name="email" class="login-input" id="login-input-mail" autocomplete="off" placeholder="Introduce tu Email o Nombre de usuario">
        <label for="login-input-password">Contraseña</label>
        <input type="password" name="password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Introduce tu Contraseña">
        <input type="submit" value="Iniciar Sesion">
    </form>
    <p>¿No tienes una cuenta? <a href="/via_uy/src/views/user/signup.php">Registrarte</a></p>
</section>

<?php
require_once($dir . "src/views/partials/footer.php");
?>

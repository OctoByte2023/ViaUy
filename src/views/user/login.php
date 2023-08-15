<?php
    // Incluir el autoloader de Composer para cargar automáticamente las clases
    require_once '../../../vendor/autoload.php';

    require_once '../partials/head.php';
    
    
    if (isset($_SESSION['user_id'])) {
        header('Location: /via_uy');
        exit();
    }
   
    
    require_once '../../../config/db.php';
    use Octobyte\ViaUy\Controllers\userController;
    
    UserController::handleLogin();
    $message = UserController::handleLogin();
?>

<section class="login-container">
    <form action="/via_uy/src/views/user/login.php" class="login-form" method="POST" autocomplete="off">
        <h2 class="login-form-title">Iniciar Sesion</h2>
        <?php if (!empty($message)) : ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <label for="login-input-mail">Email o Nombre de usuario</label>
        <input type="text" name="email" class="login-input" id="login-input-mail" autocomplete="off" placeholder="Introduce tu Email o Nombre de usuario">
        <label for="login-input-password">Contraseña</label>
        <div class="password-container">
            <input type="password" name="password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Introduce tu Contraseña">
            <input type="checkbox" id="toggle-password" class="toggle-password">
            <label for="toggle-password" class="toggle-password-l"><i class="fa-solid fa-eye"></i></label>
            <label for="toggle-password" id="toggle-2" class="toggle-password-l"><i class="fa-solid fa-eye-slash"></i></label>
        </div>
        <input type="submit" value="Iniciar Sesion">
    </form>
    <p>¿No tienes una cuenta? <a href="/via_uy/src/views/user/signup.php">Registrarte</a></p>
</section>

<script>
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('login-input-password');
    const toggleIcon1 = document.querySelector('.toggle-password-l i.fa-eye');
    const toggleIcon2 = document.querySelector('.toggle-password-l i.fa-eye-slash');
    toggleIcon2.style.display = 'none';

    togglePassword.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
            toggleIcon1.style.display = 'none';
            toggleIcon2.style.display = 'inline';
        } else {
            passwordInput.type = 'password';
            toggleIcon1.style.display = 'inline';
            toggleIcon2.style.display = 'none';
        }
    });

    cambiarTitulo("ViaUy | Login");
</script>

<?php
require_once '../partials/footer.php';
?>

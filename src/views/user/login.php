<?php
$dir = "c://xampp/htdocs/via_uy/";

require_once($dir . "src/views/partials/head.php");


if (isset($_SESSION['user_id'])) {
    header('Location: /via_uy/src/views/buses/create.php');
}
require_once($dir . '/config/db.php');

$db = new db();
$conn = $db->conexion();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $loginInput = $_POST['email'];
    $isEmail = filter_var($loginInput, FILTER_VALIDATE_EMAIL);

    if ($isEmail) {
        // Login con email
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :loginInput');
        $records->bindParam(':loginInput', $loginInput);
        $records->execute();
    } else {
        // Login con nombre de usuario
        $username = '@' . $loginInput;
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE username = :username');
        $records->bindParam(':username', $username);
        $records->execute();
    }

    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        $_SESSION['user_email'] = $results['email'];
        $_SESSION['user_name'] = $username;
        header('Location: /via_uy/src/views/buses/create.php');
        exit;
    } else {
        $message = '<i class="message-error">Email o contraseña incorrecta</i>';
    }
}
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

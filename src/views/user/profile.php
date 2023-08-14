<?php
require_once '../views/partials/head.php';

require_once '../../vendor/autoload.php';

use Octobyte\ViaUy\Controllers\userController;

$username = $_GET['username']; // Obtén el nombre de usuario de la URL

if ($username) {
    $usernameExists = UserController::checkUsernameExistence($username);
    $user=UserController::showByUsername($username);

    if ($usernameExists) {
        echo '<h1>Perfil de ' . $user['username'] . '</h1>';
        echo '<p>Nombre de usuario: ' . $user['username'] . '</p>';
        echo '<p>Email: ' . $user['email'] . '</p>';
    } else {
        echo "Usuario no encontrado";
        // El usuario no existe, puedes mostrar un mensaje de error o redirigir a una página de error
    }
}
?>
<?php
require_once '../views/partials/footer.php';
?>

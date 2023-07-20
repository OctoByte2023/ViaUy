<?php
// Incluir el autoloader de Composer para cargar automáticamente las clases
require_once '../../../../vendor/autoload.php';

use Octobyte\ViaUy\Controllers\UserController;

$dir = "c://xampp/htdocs/via_uy/";

require_once($dir . "src/views/user/admin/partials/estructure.php");

// Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
    header('Location: /via_uy');
    exit(); // El usuario no es administrador o no ha iniciado sesión
}

$obj = new UserController();
$user = $obj->show($_GET['id']);
?>

<form action="updateUser.php" method="post" autocomplete="off">
    <h2>Modificando usuario</h2>

    <label for="">id: <?= $user['id'] ?></label>
    <br>
    <label for="es-admin-select">Es Administrador</label>
    <select name="esAdmin" id="es-admin-select">
        <option value="0">No</option>
        <option value="1">Si</option>
    </select>

    <br>
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <input type="submit" class="normal-btn success" value="Actualizar">
    <a href="dashboard.php" class="normal-btn danger">Cancelar</a>
</form>

<script>
    var selectElement = document.getElementById("es-admin-select");

    selectElement.selectedIndex = <?= $user['esAdmin'] ?>; // Aquí se establece el índice de la opción que se desea seleccionar (0 para la primera opción, 1 para la segunda, etc.)
</script>

<?php
require_once($dir . "src/views/user/admin/partials/endEstructure.php");
?>

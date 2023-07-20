<?php
    // Incluir el autoloader de Composer para cargar automáticamente las clases
    require_once '../../../vendor/autoload.php';

    // Incluir el archivo de cabecera
    require_once '../partials/head.php';

    // Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
        header('Location: /via_uy');
        exit(); // El usuario no es administrador o no ha iniciado sesión
    }
?>

<form action="store.php" method="POST" autocomplete="off">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Modelo del Bus</label>
        <input type="text" required name="modelo" class="normal-input" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="normal-btn success">Guardar</button>
    <a href="index.php" class="normal-btn danger">Cancelar</a>
</form>

<?php
    require_once '../partials/footer.php';
?>

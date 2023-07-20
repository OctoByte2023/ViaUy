<?php
    // Incluir el autoloader de Composer para cargar automáticamente las clases
    require_once '../../../../vendor/autoload.php';

    // Utiliza el namespace y la ruta relativa adecuada para acceder al archivo de controlador
    use Octobyte\ViaUy\Controllers\userController; 

    require_once 'partials/estructure.php';

    // Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
        header('Location: /via_uy');
        exit(); // El usuario no es administrador o no ha iniciado sesión
    }

    // Crea una instancia del controlador de usuarios y obtiene los datos del usuario
    $userController = new UserController();
    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['user_name'];
    $userEmail = $_SESSION['user_email'];

    // Incluye la estructura de la página

    // Obtiene los datos de los usuarios y los muestra en una tabla
    $rows = $userController->index();
?>

<h1>Opciones de desarrollador</h1>

<p><?= $userEmail ?></p>
<p><?= $userName ?></p>
<p><?= $userId ?></p>

<br><br><br>

<h1>Usuarios</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Es Admin</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <th><?= $row[0] ?></th>
                    <th><?= $row[4] ?></th>
                    <th><?= $row[1] ?></th>
                    <th><?= $row[3] ?></th>
                    <th><a href="editUser.php?id=<?= $row[0] ?>" class="normal-btn success"><i class="fa-solid fa-pen"></i> Modificar</a></th>
                    <th>
                        <a href="deleteUser.php?id=<?= $row[0] ?>" class="normal-btn danger" onclick="return confirmDelete('<?= $row[4] ?>')"><i class="fa-solid fa-trash"></i> Eliminar</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay usuarios</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
    // Incluye la parte final de la estructura de la página
    require_once 'partials/endEstructure.php';
?>

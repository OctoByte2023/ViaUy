<?php
    // Incluir el autoloader de Composer para cargar automáticamente las clases
    require_once '../../../vendor/autoload.php';

    // Incluir el archivo de cabecera
    require_once '../../views/partials/head.php';
  
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $userName = $_SESSION['user_name'];
        $userEmail = $_SESSION['user_email'];
    } else {
        header('Location: login.php');
        exit();
    }
?>

<h1>Perfil de Usuario</h1>

<p><?= $userEmail ?></p>
<p><?= $userName ?></p>
<p><?= $userId ?></p>

<?php if ($_SESSION['esAdmin']): ?>
    <h2>Es Admin</h2>
<?php endif; ?>

<?php
    require_once '../../views/partials/footer.php';
?>

<?php
require_once '../../views/partials/head.php';

require_once '../../../vendor/autoload.php';

use Octobyte\ViaUy\Controllers\userController;


if (!isset($_SESSION['user_id'])) {
    header('Location: /via_uy');
    exit();
}

?>
<div class="profile-container">
        <h1 class="profile-title">Información Personal:</h1>
        <div class="profile-info">
            <p><span class="profile-label">Nombre:</span> <?= $_SESSION['user_name'] ?></p>
            <p><span class="profile-label">Email:</span> <?= $_SESSION['user_email'] ?></p>
            <!-- Agrega más información personal si es necesario -->
    </div>
</div>

<script>
    cambiarTitulo("ViaUy | <?=$_SESSION['user_name']?>")
</script>
<?php
require_once '../../views/partials/footer.php';
?>

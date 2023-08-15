<?php
require_once '../../views/partials/head.php';

require_once '../../../vendor/autoload.php';

use Octobyte\ViaUy\Controllers\userController;


if (!isset($_SESSION['user_id'])) {
    header('Location: /via_uy');
    exit();
}

?>

<h1>Informacion Personal:</h1>
<p><b>Nombre: </b><?= $_SESSION['user_name']?></p>
<p><b>Email: </b><?= $_SESSION['user_email']?></p>


<script>
    cambiarTitulo("ViaUy | <?=$_SESSION['user_name']?>")
</script>
<?php
require_once '../../views/partials/footer.php';
?>

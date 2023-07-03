<?php
    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/views/partials/head.php");
  
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

<p><?= $userEmail?></p>
<p><?= $userName?></p>
<p><?= $userId?></p>

<?php if ($_SESSION['esAdmin']){?>
    <h2>Es Admin</h2>
<?php } ?>

<?php
    require_once($dir."src/views/partials/footer.php");

?>
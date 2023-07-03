<?php
    $dir= "c://xampp/htdocs/via_uy/";
    require_once($dir."src/views/partials/head.php");
    
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
        header('Location: /via_uy'); 
        exit(); // El usuario no es administrador o no ha iniciado sesión
    }
        $userId = $_SESSION['user_id'];
        $userName = $_SESSION['user_name'];
        $userEmail = $_SESSION['user_email'];


        require_once($dir."src/views/partials/head.php");
        require_once($dir."src/controllers/userController.php");
        $obj = new UserController();
        $rows = $obj->index();
?>


<h1>Opciones de desarrollador</h1>

<p><?= $userEmail?></p>
<p><?= $userName?></p>
<p><?= $userId?></p>




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
        <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th><?= $row[0]?></th>
                    <th><?= $row[4]?></th>
                    <th><?= $row[1]?></th>
                    <th><?= $row[3]?></th>
                    <th><a href="editUser.php?id=<?= $row[0]?>" class="normal-btn success">Modificar</a></th>
                    <th><a href="deleteUser.php?id=<?= $row[0]?>" class="normal-btn danger">delete</a></th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay users</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>




<?php
    require_once($dir."src/views/partials/footer.php");

?>
<?php
   $dir = "c://xampp/htdocs/via_uy/";
   require_once($dir."src/views/partials/head.php");
   
   require_once($dir.'/config/db.php');
   
   $message = '';
   
   // Crear una instancia de la clase db y obtener la conexión a la base de datos
   $db = new db();
   $conn = $db->conexion();
   
   if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['verify-password'])) {
       $email = $_POST['email'];
       $password = $_POST['password'];
       $verifyPassword = $_POST['verify-password'];
   
       if ($password === $verifyPassword) {
           if (strlen($password) >= 8) {
               // Verificar si el email ya está en uso
               $existingEmail = $conn->prepare('SELECT email FROM users WHERE email = :email');
               $existingEmail->bindParam(':email', $email);
               $existingEmail->execute();
   
               if ($existingEmail->rowCount() === 0) {
                   // Insertar el nuevo usuario en la base de datos
                   $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
                   $stmt = $conn->prepare($sql);
                   $stmt->bindParam(':email', $email);
                   $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                   $stmt->bindParam(':password', $passwordHash);
   
                   if ($stmt->execute()) {
                       $message = '<i class="message-success">Usuario creado satisfactoriamente</i>';
                   } else {
                       $message = '<i class="message-error">Ha ocurrido un error creando el usuario</i>';
                   }
               } else {
                   $message = '<i class="message-error">El email ya está en uso</i>';
               }
           } else {
               $message = '<i class="message-error">La contraseña debe tener al menos 8 caracteres</i>';
           }
       } else {
           $message = '<i class="message-error">Las contraseñas no coinciden</i>';
       }
   }
      
?>

<section class="login-container">
    <form action="signup.php" class="login-form" method="POST" autocomplete="off">
        <h2 class="login-form-title">Registrarte</h2>
        <?php if(!empty($message)): ?>
          <p> <?= $message ?></p>
        <?php endif; ?>

        <label for="login-input-mail">Email</label>
        <input type="email" name="email" class="login-input" id="login-input-mail" autocomplete="off" placeholder="Introduce tu Email">
        <label for="login-input-password">Contraseña</label>
        <input type="password" name="password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Introduce tu Contraseña">
        <label for="login-input-password">Confirmar Contraseña</label>
        <input type="password" name="verify-password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Confirma tu Contraseña">
        <input type="submit" value="Registrarse" id="">
    </form>
    <p>¿Ya tienes una cuenta? <a href="/via_uy/src/views/user/login.php">Iniciar Sesion</a></p>
</section>

<?php
    require_once($dir."src/views/partials/footer.php");
?>

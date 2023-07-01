<?php
   $dir = "c://xampp/htdocs/via_uy/";
   require_once($dir."src/views/partials/head.php");
   
   require_once($dir.'/config/db.php');
   
   $message = '';
   
   // Crear una instancia de la clase db y obtener la conexión a la base de datos
   $db = new db();
   $conn = $db->conexion();
   
   if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['verify-password'])) {
       $email = $_POST['email'];
       $username = $_POST['username'];
       $password = $_POST['password'];
       $verifyPassword = $_POST['verify-password'];
   
       if ($password === $verifyPassword) {
           if (strlen($password) >= 8) {
               // Verificar si el email y el nombre de usuario ya están en uso
               $existingData = $conn->prepare('SELECT email, username FROM users WHERE email = :email OR username = :username');
               $existingData->bindParam(':email', $email);
               $existingData->bindParam(':username', $username);
               $existingData->execute();
   
               if ($existingData->rowCount() === 0) {
                   // Validar el nombre de usuario
                   if (strpos($username, ' ') === false && strlen($username) >= 5 && strlen($username) <= 16) {
                       // Agregar @ al inicio del nombre de usuario
                       $username = '@' . $username;
   
                       // Insertar el nuevo usuario en la base de datos
                       $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
                       $stmt = $conn->prepare($sql);
                       $stmt->bindParam(':email', $email);
                       $stmt->bindParam(':username', $username);
                       $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                       $stmt->bindParam(':password', $passwordHash);
   
                       if ($stmt->execute()) {
                           $message = '<i class="message-success">Usuario creado satisfactoriamente</i>';
                       } else {
                           $message = '<i class="message-error">Ha ocurrido un error creando el usuario</i>';
                       }
                   } else {
                       $message = '<i class="message-error">El nombre de usuario no cumple los requisitos (debe tener entre 5 y 16 caracteres y no puede contener espacios)</i>';
                   }
               } else {
                   $existingData = $existingData->fetch(PDO::FETCH_ASSOC);
                   if ($existingData['email'] === $email) {
                       $message = '<i class="message-error">El email ya está en uso</i>';
                   } else {
                       $message = '<i class="message-error">El nombre de usuario ya está en uso</i>';
                   }
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

        <label for="login-input-username">Nombre de usuario</label>
        <input type="text" name="username" class="login-input" id="login-input-username" autocomplete="off" placeholder="Introduce tu Nombre de usuario">

        <label for="login-input-password">Contraseña</label>
        <input type="password" name="password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Introduce tu Contraseña">

        <label for="login-input-password">Confirmar Contraseña</label>
        <input type="password" name="verify-password" class="login-input" id="login-input-password" autocomplete="off" placeholder="Confirma tu Contraseña">
        
        <input type="submit" value="Registrarse">
    </form>
    <p>¿Ya tienes una cuenta? <a href="/via_uy/src/views/user/login.php">Iniciar Sesión</a></p>
</section>

<?php
    require_once($dir."src/views/partials/footer.php");
?>

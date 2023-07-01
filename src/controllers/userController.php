<?php
$dir = "c://xampp/htdocs/via_uy/";
require_once($dir . '/src/models/userModel.php');

class UserController {
    public static function handleSignup($postData) {
        $message = '';
        if (!empty($postData['email']) && !empty($postData['username']) && !empty($postData['password']) && !empty($postData['verify-password'])) {
            $email = $postData['email'];
            $username = $postData['username'];
            $password = $postData['password'];
            $verifyPassword = $postData['verify-password'];
        
            if ($password === $verifyPassword) {
                if (strlen($password) >= 8) {
                    $userModel = new UserModel();
        
                    if (!$userModel->isEmailOrUsernameTaken($email, $username)) {
                        if ($userModel->validateUsername($username)) {
                            $username = '@' . $username;
                            if ($userModel->createUser($email, $username, $password)) {
                                $message = '<i class="message-success">Usuario creado satisfactoriamente</i>';
                            } else {
                                $message = '<i class="message-error">Ha ocurrido un error creando el usuario</i>';
                            }
                        } else {
                            $message = '<i class="message-error">El nombre de usuario no cumple los requisitos (debe tener entre 5 y 16 caracteres y no puede contener espacios)</i>';
                        }
                    } else {
                        $message = '<i class="message-error">El email o nombre de usuario ya está en uso</i>';
                    }
                } else {
                    $message = '<i class="message-error">La contraseña debe tener al menos 8 caracteres</i>';
                }
            } else {
                $message = '<i class="message-error">Las contraseñas no coinciden</i>';
            }
        }
        return $message;
    }

    public static function handleLogin() {
        $dir = "c://xampp/htdocs/via_uy/";
        require_once($dir . '/config/db.php');
    
        $db = new db();
        $conn = $db->conexion();
    
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $loginInput = $_POST['email'];
            $isEmail = filter_var($loginInput, FILTER_VALIDATE_EMAIL);
    
            $username = '';
    
            if ($isEmail) {
                // Login con email
                $records = $conn->prepare('SELECT id, email, password, esAdmin, username FROM users WHERE email = :loginInput');
                $records->bindParam(':loginInput', $loginInput);
                $records->execute();
            } else {
                // Login con nombre de usuario
                $username = '@' . $loginInput;
                $records = $conn->prepare('SELECT id, email, password, esAdmin, username FROM users WHERE username = :username');
                $records->bindParam(':username', $username);
                $records->execute();
            }
    
            $results = $records->fetch(PDO::FETCH_ASSOC);
    
            $message = '';
    
            if (is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
                $_SESSION['user_id'] = $results['id'];
                $_SESSION['user_email'] = $results['email'];
                $_SESSION['user_name'] = $results['username'];
                $_SESSION['esAdmin'] = (bool) $results['esAdmin'];
                header('Location: /via_uy/src/views/buses/create.php');
                exit;
            } else {
                $message = '<i class="message-error">Email o contraseña incorrecta</i>';
            }
            return $message;
        }
    }
       
}
?>

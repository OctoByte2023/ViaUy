<?php
namespace Octobyte\ViaUy\Controllers;

use Octobyte\ViaUy\Models\UserModel;
use Octobyte\ViaUy\Controllers\busesController; 

class UserController {
    private $model;

    public function __construct() {
        // Utiliza el autoloader de Composer para cargar el modelo automáticamente
        require_once __DIR__ . '/../models/UserModel.php';
        $this->model = new UserModel();
    }

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
        session_start();
    
        // Redirigir al formulario de inicio de sesión si no hay sesión activa o el usuario no es administrador
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin']) {
            header('Location: /via_uy');
            exit(); // El usuario no es administrador o no ha iniciado sesión
        }
    
        // Utiliza el namespace y la ruta relativa adecuada para acceder al archivo de controlador
    
        // Crea una instancia del controlador de autobuses y llama al método delete
        $busesController = new busesController();
        $busesController->delete($_GET['id']);
    }
    
    public function show($id) {
        $user = $this->model->show($id);
    
        if ($user !== false) {
            return $user;
        } else {
            header("Location: dashboard.php");
            exit();
        }
    }
    
    public function index() {
        $result = $this->model->index();
        
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    public function update($id, $esAdmin) {
        if ($this->model->update($id, $esAdmin)) {
            header("Location: dashboard.php");
        } else {
            header("Location: index.php");
        }
    }        
    
    public function delete($id) {
        if ($this->model->delete($id)) {
            header("Location: dashboard.php");
        } else {
            header("Location: show.php?id=" . $id);
        }
    }
       
}
?>

<?php
namespace Octobyte\ViaUy\Models;

use \PDO;
use \PDOException;
use Octobyte\ViaUy\Config\db;

class UserModel {
    private $conn;

    public function __construct() {
        // Utiliza el autoloader de Composer para cargar la clase de configuración de la base de datos
        require_once __DIR__ . '/../../config/db.php';
        $db = new db();
        $this->conn = $db->conexion();
    }

    public function isEmailOrUsernameTaken($email, $username) {
        $existingData = $this->conn->prepare('SELECT email, username FROM users WHERE email = :email OR username = :username');
        $existingData->bindParam(':email', $email);
        $existingData->bindParam(':username', $username);
        $existingData->execute();

        return $existingData->rowCount() > 0;
    }

    public function validateUsername($username) {
        return strpos($username, ' ') === false && strlen($username) >= 5 && strlen($username) <= 16;
    }

    public function createUser($email, $username, $password) {
        $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $passwordHash);

        return $stmt->execute();
    }

    public function index() {
        $statement = $this->conn->prepare("SELECT * FROM users");

        if ($statement->execute()) {
            return $statement->fetchAll();
        } else {
            return false;
        }
    }

    public function show($id) {
        $statement = $this->conn->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result : false;
    }

    public function update($id, $esAdmin) {
        $statement = $this->conn->prepare("UPDATE users SET esAdmin = :esAdmin WHERE id = :id");
        $statement->bindParam(":esAdmin", $esAdmin);
        $statement->bindParam(":id", $id);

        if ($statement->execute()) {
            return $id;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $statement = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $statement->bindParam(":id", $id);

        return $statement->execute();
    }

    public function getUserByUsername($username) {
        $statement = $this->conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $statement->bindParam(":username", $username, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    
        return ($result !== false) ? $result : false;
    }
    
}
?>

<?php
$dir = "c://xampp/htdocs/via_uy/";

require_once($dir.'/config/db.php');

class UserModel {
    private $conn;

    public function __construct() {
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
}
?>

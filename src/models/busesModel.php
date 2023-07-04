<?php


    class busesModel{
        private $PDO;
        public function __construct(){
            require_once 'c://xampp/htdocs/via_uy/config/db.php';
            $con = new db();
            $this->PDO = $con->conexion();
        }
        public function insertar($modelo) {
            $statement = $this->PDO->prepare("INSERT INTO buses (modelo) VALUES (:modelo)");
            $statement->bindParam(":modelo", $modelo);
            
            if ($statement->execute()) {
                return $this->PDO->lastInsertId();
            } else {
                return false;
            }
        }        
        public function show($id) {
            $statement = $this->PDO->prepare("SELECT * FROM buses WHERE id = :id LIMIT 1");
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        
            return ($result !== false) ? $result : false;
        }
        public function index() {
            $statement = $this->PDO->prepare("SELECT * FROM buses");
            
            if ($statement->execute()) {
                return $statement->fetchAll();
            } else {
                return false;
            }
        }        
        public function update($id, $modelo) {
            $statement = $this->PDO->prepare("UPDATE buses SET modelo = :modelo WHERE id = :id");
            $statement->bindParam(":modelo", $modelo);
            $statement->bindParam(":id", $id);
        
            if ($statement->execute()) {
                return $id;
            } else {
                return false;
            }
        }
        
        public function delete($id) {
            $statement = $this->PDO->prepare("DELETE FROM buses WHERE id = :id");
            $statement->bindParam(":id", $id);
        
            return $statement->execute();
        }        

        public function searchByModel($searchTerm) {
            $statement = $this->PDO->prepare("SELECT * FROM buses WHERE modelo LIKE :searchTerm");
            $searchTerm = '%' . $searchTerm . '%'; // Agregamos caracteres de comodín para buscar coincidencias parciales
            $statement->bindParam(":searchTerm", $searchTerm);
            
            if ($statement->execute()) {
                return $statement->fetchAll();
            } else {
                return false;
            }
        }
        
    }
?>

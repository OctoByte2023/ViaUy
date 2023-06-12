<?php
require_once 'c://xampp/htdocs/via_uy/config/db.php';

class BusesModel {
    private $db;

    public function __construct() {
        $this->db = new db();
    }

    public function obtenerBuses() {
        $query = "SELECT * FROM Buses";
        $stmt = $this->db->conexion()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerBusPorId($id) {
        $query = "SELECT * FROM Buses WHERE id = :id";
        $stmt = $this->db->conexion()->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function borrarBus($id) {
        $query = "DELETE FROM Buses WHERE id = :id";
        $stmt = $this->db->conexion()->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    // Otros métodos relacionados con el modelo de Buses...

    // Ejemplo de método para insertar un nuevo bus:
    public function insertarBus($matricula, $marca, $modelo, $año, $capacidad_pasajeros, $color, $tipo_combustible, $kilometraje, $fecha_ult_mantenimiento, $disponible) {
        $query = "INSERT INTO Buses (matricula, marca, modelo, año, capacidad_pasajeros, color, tipo_combustible, kilometraje, fecha_ult_mantenimiento, disponible)
                  VALUES (:matricula, :marca, :modelo, :año, :capacidad_pasajeros, :color, :tipo_combustible, :kilometraje, :fecha_ult_mantenimiento, :disponible)";
        $stmt = $this->db->conexion()->prepare($query);
        $stmt->bindParam(":matricula", $matricula, PDO::PARAM_STR);
        $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
        $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
        $stmt->bindParam(":año", $año, PDO::PARAM_INT);
        $stmt->bindParam(":capacidad_pasajeros", $capacidad_pasajeros, PDO::PARAM_INT);
        $stmt->bindParam(":color", $color, PDO::PARAM_STR);
        $stmt->bindParam(":tipo_combustible", $tipo_combustible, PDO::PARAM_STR);
        $stmt->bindParam(":kilometraje", $kilometraje, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ult_mantenimiento", $fecha_ult_mantenimiento, PDO::PARAM_STR);
        $stmt->bindParam(":disponible", $disponible, PDO::PARAM_BOOL);
        return $stmt->execute();
    }
}
?>

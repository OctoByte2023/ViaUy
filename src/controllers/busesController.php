<?php

namespace Octobyte\ViaUy\Controllers;
    
use Octobyte\ViaUy\Models\busesModel;
class busesController {
    private $model;

    public function __construct() {
        // Utiliza el autoloader de Composer para cargar el modelo automáticamente
        require_once __DIR__ . '/../models/busesModel.php';
        $this->model = new busesModel();
    }

    public function guardar($modelo) {
        $id = $this->model->insertar($modelo);

        if ($id !== false) {
            header("Location: show.php?id=" . $id);
        } else {
            header("Location: create.php");
        }
    }

    public function show($id) {
        $bus = $this->model->show($id);

        if ($bus !== false) {
            return $bus;
        } else {
            header("Location: index.php");
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

    public function update($id, $nombre) {
        if ($this->model->update($id, $nombre)) {
            header("Location: show.php?id=" . $id);
        } else {
            header("Location: index.php");
        }
    }

    public function delete($id) {
        if ($this->model->delete($id)) {
            header("Location: index.php");
        } else {
            header("Location: show.php?id=" . $id);
        }
    }

    public function searchByModel($searchTerm) {
        $result = $this->model->searchByModel($searchTerm);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}
?>

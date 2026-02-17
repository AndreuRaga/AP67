<?php
class Controller {
    private $gestor;

    public function __construct($gestor) {
        $this->gestor = $gestor;
    }

    public function index() {
        
        include 'views/explorador.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Location: index.php");
            exit();
        }

        include 'views/registro.php';
    }


    public function editarFormaDeVida() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Location: index.php");
            exit();
        }
    }

    public function editarMineralRaro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Location: index.php");
            exit();
        }
    }

    public function editarArtefactoAntiguo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header("Location: index.php");
            exit();
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->gestor->expulsion($id);
        header("Location: index.php");
        exit();
    }
}
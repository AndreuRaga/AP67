<?php
class Controller {
    private $gestor;

    public function __construct($gestor) {
        $this->gestor = $gestor;
    }

    public function index() {
        $formasDeVida = $this->gestor->exploradorFormasDeVida();
        $mineralesRaros = $this->gestor->exploradorMineralesRaros();
        $artefactosAntiguos = $this->gestor->exploradorArtefactosAntiguos();
        include 'views/explorador.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $planetaOrigen = $_POST['planetaOrigen'];
            $nivelEstabilidad = $_POST['nivelEstabilidad'];
            $dieta = $_POST['dieta'] ?? null;
            $dureza = $_POST['dureza'] ?? null;
            $antiguedad = $_POST['antiguedad'] ?? null;
            if ($dieta != null) {
                $entidad = new FormaDeVida($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dieta);
            } else if ($dureza != null) {
                $entidad = new MineralRaro($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dureza);
            } else if ($antiguedad != null) {
                $entidad = new ArtefactoAntiguo($id, $nombre, $planetaOrigen, $nivelEstabilidad, $antiguedad);
            } else {
                $entidad = null;
            }
            if ($entidad != null) {
                $this->gestor->registro($entidad);
                header("Location: index.php");
                exit();
            }
        }

        include 'views/registro.php';
    }


    public function editarFormaDeVida() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $planetaOrigen = $_POST['planetaOrigen'];
            $nivelEstabilidad = $_POST['nivelEstabilidad'];
            $dieta = $_POST['dieta'];
            $this->gestor->modificacionFormaDeVida($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dieta);
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
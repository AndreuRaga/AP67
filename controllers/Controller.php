<?php
class Controller {
    private $gestor;

    public function __construct($gestor) {
        $this->gestor = $gestor;
    }

    public function index() {
        //Paginación de formas de vida
        $formasDeVida = $this->gestor->exploradorFormasDeVida();
        $totalFormasDeVida = count($formasDeVida);
        $formasDeVidaPorPagina = 3;
        $totalPaginasFormasDeVida = ceil($totalFormasDeVida / $formasDeVidaPorPagina);
        $paginaActualFormasDeVida = $_GET['pActualFormasDeVida'] ?? 1;
        $formasDeVidaAcortadas = array_slice($formasDeVida, ($paginaActualFormasDeVida - 1) * $formasDeVidaPorPagina, $formasDeVidaPorPagina);

        //Paginación de minerales raros
        $mineralesRaros = $this->gestor->exploradorMineralesRaros();
        $totalMineralesRaros = count($mineralesRaros);
        $mineralesRarosPorPagina = 3;
        $totalPaginasMineralesRaros = ceil($totalMineralesRaros / $mineralesRarosPorPagina);
        $paginaActualMineralesRaros = $_GET['pActualMineralesRaros'] ?? 1;
        $mineralesRarosAcortados = array_slice($mineralesRaros, ($paginaActualMineralesRaros - 1) * $mineralesRarosPorPagina, $mineralesRarosPorPagina);

        //Paginación de artefactos antiguos
        $artefactosAntiguos = $this->gestor->exploradorArtefactosAntiguos();
        $totalArtefactosAntiguos = count($artefactosAntiguos);
        $artefactosAntiguosPorPagina = 3;
        $totalPaginasArtefactosAntiguos = ceil($totalArtefactosAntiguos / $artefactosAntiguosPorPagina);
        $paginaActualArtefactosAntiguos = $_GET['pActualArtefactosAntiguos'] ?? 1;
        $artefactosAntiguosAcortados = array_slice($artefactosAntiguos, ($paginaActualArtefactosAntiguos - 1) * $artefactosAntiguosPorPagina, $artefactosAntiguosPorPagina);

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
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $planetaOrigen = $_POST['planetaOrigen'];
            $nivelEstabilidad = $_POST['nivelEstabilidad'];
            $dureza = $_POST['dureza'];
            $this->gestor->modificacionMineralRaro($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dureza);
            header("Location: index.php");
            exit();
        }
    }

    public function editarArtefactoAntiguo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $planetaOrigen = $_POST['planetaOrigen'];
            $nivelEstabilidad = $_POST['nivelEstabilidad'];
            $antiguedad = $_POST['antiguedad'];
            $this->gestor->modificacionArtefactoAntiguo($id, $nombre, $planetaOrigen, $nivelEstabilidad, $antiguedad);
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
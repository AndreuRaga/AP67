<?php
class Gestor {
    public function __construct() {
        if (!isset($_SESSION['entidades'])) {
            $_SESSION['entidades'] = [];
        }
    }

    public function registro($entidad) {
        $_SESSION['entidades'][] = $entidad;
    }

    public function exploradorFormasDeVida() {
        $formasDeVida = [];
        foreach ($_SESSION['entidades'] as $entidad) {
            if ($entidad instanceof FormaDeVida) {
                $formasDeVida[] = $entidad;
            }
        }
        return $formasDeVida;
    }

    public function exploradorMineralesRaros() {
        $mineralesRaros = [];
        foreach ($_SESSION['entidades'] as $entidad) {
            if ($entidad instanceof MineralRaro) {
                $mineralesRaros[] = $entidad;
            }
        }
        return $mineralesRaros;
    }

    public function exploradorArtefactosAntiguos() {
        $artefactosAntiguos = [];
        foreach ($_SESSION['entidades'] as $entidad) {
            if ($entidad instanceof ArtefactoAntiguo) {
                $artefactosAntiguos[] = $entidad;
            }
        }
        return $artefactosAntiguos;
    }

    public function modificacionFormaDeVida($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dieta) {
        foreach ($_SESSION['entidades'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                $_SESSION['entidades'][$i]->setNombre($nombre);
                $_SESSION['entidades'][$i]->setPlanetaOrigen($planetaOrigen);
                $_SESSION['entidades'][$i]->setNivelEstabilidad($nivelEstabilidad);
                $_SESSION['entidades'][$i]->setDieta($dieta);
            }
        }
    }

    public function modificacionMineralRaro($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dureza) {
        foreach ($_SESSION['entidades'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                $_SESSION['entidades'][$i]->setNombre($nombre);
                $_SESSION['entidades'][$i]->setPlanetaOrigen($planetaOrigen);
                $_SESSION['entidades'][$i]->setNivelEstabilidad($nivelEstabilidad);
                $_SESSION['entidades'][$i]->setDureza($dureza);
            }
        }
    }

    public function modificacionArtefactoAntiguo($id, $nombre, $planetaOrigen, $nivelEstabilidad, $antiguedad) {
        foreach ($_SESSION['entidades'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                $_SESSION['entidades'][$i]->setNombre($nombre);
                $_SESSION['entidades'][$i]->setPlanetaOrigen($planetaOrigen);
                $_SESSION['entidades'][$i]->setNivelEstabilidad($nivelEstabilidad);
                $_SESSION['entidades'][$i]->setAntiguedad($antiguedad);
                
            }
        }
    }

    public function expulsion($id) {
        foreach ($_SESSION['entidades'] as $i => $entidad) {
            if ($entidad->getId() == $id) {
                unset($_SESSION['entidades'][$i]);
                $_SESSION['entidades'] = array_values($_SESSION['entidades']);
            }
        }
    }
}
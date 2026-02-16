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

    public function explorador() {
        return $_SESSION['entidades'];
    }

    public function modificacion($entidad) {
        foreach ($_SESSION['entidades'] as $i => $entidadSesion) {
            if ($entidadSesion->getId() == $entidad->getId()) {
                $_SESSION['entidades'][$i]->setNombre($entidad->getNombre());
                $_SESSION['entidades'][$i]->setPlanetaOrigen($entidad->getPlanetaOrigen());
                $_SESSION['entidades'][$i]->setNivelEstabilidad($entidad->getNivelEstabilidad());
                if ($entidad instanceof FormaDevida) {

                }
                if ($entidad instanceof MineralRaro) {

                }
                if ($entidad instanceof ArtefactoAntiguo) {

                }
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
<?php
class MineralRaro extends EntidadEstelar {
    private $dureza; //Escala de Mohs galáctica

    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dureza) {
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad);
        $this->dureza = $dureza;
    }

    public function getDureza() {
        return $this->dureza;
    }

    public function setDureza($dureza) {
        $this->dureza = $dureza;
    }

    public function reaccionar() {
        return "Brilla con intensidad azulada";
    }
}
<?php
class FormaDeVida extends EntidadEstelar {
    private $dieta; //Carbono, Silicio, Energía

    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad, $dieta) {
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad);
        $this->dieta = $dieta;
    }

    public function getDieta() {
        return $this->dieta;
    }

    public function setDieta($dieta) {
        $this->dieta = $dieta;
    }

    public function reaccionar() {
        return "Emite un pulso electromagnético";
    }
}
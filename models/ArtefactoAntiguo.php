<?php
class ArtefactoAntiguo extends EntidadEstelar {
    private $antiguedad; //Años luz

    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad, $antiguedad) {
        parent::__construct($id, $nombre, $planetaOrigen, $nivelEstabilidad);
        $this->antiguedad = $antiguedad;
    }

    public function getAntiguedad() {
        return $this->antiguedad;
    }

    public function setAntiguedad($antiguedad) {
        $this->antiguedad = $antiguedad;
    }

    public function reaccionar() {
        return "Reproduce un mensaje en una lengua muerta";
    }
}
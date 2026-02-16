<?php
class EntidadEstelar {
    private $id;
    private $nombre;
    private $planetaOrigen;
    private $nivelEstabilidad;

    public function __construct($id, $nombre, $planetaOrigen, $nivelEstabilidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->planetaOrigen = $planetaOrigen;
        $this->nivelEstabilidad = $nivelEstabilidad;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPlanetaOrigen() {
        return $this->planetaOrigen;
    }

    public function setPlanetaOrigen($planetaOrigen) {
        $this->planetaOrigen = $planetaOrigen;
    }

    public function getNivelEstabilidad() {
        return $this->nivelEstabilidad;
    }

    public function setNivelEstabilidad($nivelEstabilidad) {
        $this->nivelEstabilidad = $nivelEstabilidad;
    }

    public function reaccionar() {
        return "La entidad estelar reacciona.";
    }
}
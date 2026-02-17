<?php
require_once("autoload.php");
session_start();

$gestor = new Gestor();

$controller = new Controller($gestor);

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {
    case 'crear':
        $controller->crear();
        break;
    case 'editarFormaDeVida':
        $controller->editarFormaDeVida();
        break;
    case 'editarMineralRaro':
        $controller->editarMineralRaro();
        break;
    case 'editarArtefactoAntiguo':
        $controller->editarArtefactoAntiguo();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    default:
        $controller->index();
        break;
}
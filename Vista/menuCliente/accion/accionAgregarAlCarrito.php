<?php
include_once("../../../configuracion.php");
include_once("../../menu/cabecera.php");

$datos = data_submitted();
$objCompraEstadoIniciado= [];
$objCompra= new c_compra();
$objCompraEstado= new c_compraEstado();

$objsession= new c_session();
$objusuario= $objsession->getUsuario();

$idUsuario["idUsuario"]= $objusuario->getObjUsuario();


$arrayCompras= buscarComprasUsuario($idUsuario);

if ($arrayCompra !=null){
    $objCompraEstadoIniciado= $objCompraEstado->buscarCompraIniciada($arrayCompra);
    if ($objCompraEstadoBorrador != null) {
        
    }
}



function buscarComprasUsuario($idUsuario){
    $objCompra = new c_compra();
    $arrayCompra= $objCompra->buscar($idUsuario);
    return $arrayCompra;
}










<?php

/* programa */
$datos= data_submitted();
$objCompraEstadoBor= null; //guarda un objeto compra estado borrador
$arrayCompras= null;
$objSession= new c_Session(); //control session
$objCompraEstado= new C_Compraestado(); //control compra estado
$objUsuario= $objSession->getUsuario();
$idUsuario["idUsuario"]= $objUsuario->getIdUsuario();
$arrayCompras= buscarComprasUsuario($idUsuario);


if ($arrayCompras != null) {
    $objCompraEstadoBorrador = $objCompraEstado->buscarCompraBorrador($arrayCompras);
    if ($objCompraEstadoBorrador != null) {
        cargarProducto($objCompraEstadoBorrador, $datos);
    }
}





/* FUNCIONES */ 
function buscarComprasUsuario($idUsuario)
{
    $objCompra = new C_Compra();
    $arrayCompra = $objCompra->buscar($idUsuario);
    return $arrayCompra;
}


function cargarProducto($)


?>
<?php
include_once("../../../configuracion.php");

$datos = data_submitted();


$probando= new c_producto();

$array= $probando->buscar($datos);



$nuevoValor= intval($array[0]->getProCantStock()) - intval($datos["ciCantidad"]);


$array[0]->setProCantStock($nuevoValor);



if (intval($datos["ciCantidad"] < intval($array[0]->getProCantStock()))) {
    echo json_encode(array('success'=>1));
} else {
$array[0]->modificar();
echo json_encode(array('success'=>0));
}






/*
    if ($objProducto->alta($datos)) {
        echo json_encode(array('success'=>1));
    } else {
        echo json_encode(array('success'=>0));
    } */
?>
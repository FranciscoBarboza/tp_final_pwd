<?php
include_once("../../../configuracion.php");
$datos = data_submitted();
$objProducto = new c_producto();
if ($objProducto->modificacion($datos)) {
    echo json_encode(array('success'=>1));
} else {
    echo json_encode(array('success'=>0));
}
?>
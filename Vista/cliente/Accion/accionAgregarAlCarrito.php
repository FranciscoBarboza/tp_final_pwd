<?php
include_once("../../../configuracion.php");
include_once("../../Menu/Cabecera.php");

$datos = data_submitted();

$idProducto= $datos["idProducto"];
$cantidadStock= $datos["ciCantidad"];

var_dump($datos);

$objProducto= new Producto();
$objProducto->buscar($idProducto);

echo $objProducto






?>



<link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
<script src="../../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
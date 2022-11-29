<?php
include_once("../Menu/Cabecera.php");
include_once("../../configuracion.php");


/* ESTO DEL SESSION LO HACE MANU */
$idUsuario= 1;// esto es provisional


$base= new baseDatos();

function hola(){
  echo "hola";
}
/**
 * devuelve el carrito iniciado de un usuario
 */
function carritoIniciado($id){
/* inicializo variables */
$compraIniciada= [];
$objCompraEstado= new CompraEstado();
$objCOmpra= new Compra();
$objCOmpra->getIdCompra();

$compraEstados1= $objCompraEstado->listar("idCompraEstadoTipo = 1");//todos las compras estados iniciadas 1

foreach ($compraEstados1 as $compraE) {
 $compra= $compraE->getObjCompra();



 if($compra->getObjUsuario()->getIdUsuario() == $id){
    array_push($compraIniciada, $compra);
 }

 
}
return $compraIniciada;
}

/**
 * crea carrito segun id usuario
 */
function crearCarrito($id){
  $carrito= carritoIniciado($id);

  foreach ($carrito as $item) {
    $idCompra= $item->getIdCompra();
    $compraItem= new CompraItem();
    $arrayCompraItems= $compraItem->listar("idCompra = {$idCompra}");
    foreach ($arrayCompraItems as $items) {
      formatoCarrito($items);
    }
  }

  
  


  
}







/**
 * crea el carrito con compraitem
 * @param obj $objCompraItem
 */
function formatoCarrito($objCompraItem){
  $objProducto= $objCompraItem->getObjProducto();
  echo "
  <tr>
    <th scope=\"row\">{$objProducto->getIdProducto()}</th>
    <td>{$objProducto->getProNombre()}</td>
    <td>proximamente</td>
    <td>{$objProducto->getProDetalle()}</td>
    <td>{$objCompraItem->getCiCantidad()}</td>
    <td>proximamente</td>
  </tr>";
}

?>



<html>
<head></head>
<body>

<div class="container align-items-center " style="margin-top: 50px;">

<table class="table table-hover table-bordered">
  <thead class="">
    <thead class="table-dark">
      <th colspan="3" scope="col">usuario</td>
      <th colspan="1" scope="col">fecha iniciado</td>
      <th colspan="2" scope="col"> borrar_compra</th>
    </thead>
  </thead>
  
    
  
  <tbody>
    <tr class="table-primary">
      <th scope="col">id_p</th>
      <th scope="col">nombre_producto</th>
      <th scope="col">foto_prod</th>
      <th scope="col">descripcion_prod</th>
      <th scope="col">cant</th>
      <th scope="col">acciones_cli</th>
    </tr>

    <div>
<?php 
  
  crearCarrito(1);
?>
    </div>
  </tbody>
</table>
</div>











</body>
<?php
include_once("../Menu/Pie.php");
?>


<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/bootstrap.min.js"></script>    
</html>
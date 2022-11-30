<?php
include_once("../Menu/Cabecera.php");
include_once("../../configuracion.php");

function crearhistorial($id){

}
/**
 * busca los compra items que no esten iniciados
 * @param int $id
 */
function buscarCompraItems($id){
    /* inicializo variables */
    $compraIniciada= [];
    $objCompraEstado= new CompraEstado();
    $objCompra= new Compra();
    $objCompra->getIdCompra();
    
    $compraEstados1= $objCompraEstado->listar("idCompraEstadoTipo = 2 OR idCompraEstadoTipo = 3 OR idCompraEstadoTipo = 4");//todos las compras estados iniciadas 1
    
    foreach ($compraEstados1 as $compraE) {
     $compra= $compraE->getObjCompra();
    
    
    
     if($compra->getObjUsuario()->getIdUsuario() == $id){
        array_push($compraIniciada, $compra);
     }
    
     
    }
    return $compraIniciada;
}

function imprimirFormato($nosetodaviajeje){

}


?>


<html>
<head>

</head>

<body>
    


<div class="container align-items-center " style="margin-top: 50px;">

<table class="table table-hover table-bordered">
  <thead class="">
    <thead class="table-dark">
      <th colspan="5" scope="col">idCompra</td>
      <th colspan="1" scope="col">fecha iniciado</td>
      <th colspan="1" scope="col">fecha terminada</th>
    </thead>
  </thead>
  
    
  
  <tbody>
    <tr class="table-primary">
      <th scope="col">id</th>
      <th scope="col">nombre_producto</th>
      <th scope="col">foto_prod</th>
      <th scope="col">descripcion_prod</th>
      <th scope="col">cant</th>
      <th scope="col">total</th>
      <th scope="col">estado</th>
      
    </tr>

    <div>
  </div>
  </tbody>
</table>
</div>








</body>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</html>
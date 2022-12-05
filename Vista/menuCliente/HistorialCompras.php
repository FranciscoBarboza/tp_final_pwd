<?php
include_once("../menu/cabecera.php");
include_once("../../configuracion.php");

$idUsuario= 1;

/* aca van las mejores funciones creadas por el hombre */

function arrayComprasDeUnUsuario($idUsuario){
  $objC_Compra= new c_compra();
  $idUsuario= intval($idUsuario);

  $arrayComprasDeUnUsuario= $objC_Compra->buscar(["idUsuario" => $idUsuario]);


  return $arrayComprasDeUnUsuario;
}

function buscarCompraEstadosDeUnaCompra($idCompra){
  $idCompra= intval($idCompra);
  $objC_compraEstado= new c_compraEstado();
  $arrayComprasEstado= $objC_compraEstado->buscar(["idCompra" => $idCompra]);


  return $arrayComprasEstado;
}


function compraItemsDeUnaCompra($idCompra){
  $idCompra= intval($idCompra);
  $objC_compraItem= new c_compraItem();

  $arrayObjCompraItem= $objC_compraItem->buscar(["idcompra" => $idCompra]);


  return $arrayObjCompraItem;
}


function crearHistorial($idUsuario){

$arrayCompra= arrayComprasDeUnUsuario($idUsuario);

$i= 1;
foreach ($arrayCompra as $compra) {
  $compra= new Compra();

  $idcompra= $compra->getIdCompra();//aislo el id compra

  $arrayCompraEstados= buscarCompraEstadosDeUnaCompra($idcompra);//obtengo el array con todos los compraEstados de una compra

  foreach($arrayCompraEstados as $compraestado){


  }



  
}

function imprimirCabecera(){

}

};








?>


<html>
<head>

</head>

<body>
    


<div class="container align-items-center " style="margin-top: 50px;">

<table class="table table-hover table-bordered">
  <thead class="">
    <thead class="table-dark">
      <th colspan="4" scope="col">idCompra</td>
      <th colspan="3" scope="col"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#historial1">HISTORIAL</button></td>
    </thead>
  </thead>
  
    
  
  <tbody>
    <!-- esto es solo son subtitulos -->
    <tr class="table-primary">
      <th scope="col">id</th>
      <th scope="col">nombre_producto</th>
      <th scope="col">foto_prod</th>
      <th scope="col">descripcion_prod</th>
      <th scope="col">cant</th>
      <th scope="col">precio_u</th>
      <th scope="col">total</th>
      
      <!-- aca empieza la informacion -->
      
    </tr>

    <div>
  </div>
  </tbody>
</table>
</div>





<?php  
crearHistorial($idUsuario); 
?>










<!-- Modal -->
<div class="modal fade" id="historial1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      

<div class="container align-items-center " >
<table class="table table-hover table-bordered">
  <thead>
    <th>estado</th>
    <th>fechaIni</th>
    <th>fechaFinal</th>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>      
    </tr>
  </tbody>
</table>
</div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>












</body>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</html>
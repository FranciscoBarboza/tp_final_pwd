<?php
include_once("../Menu/Cabecera.php");
include_once("../../configuracion.php");


/* ESTO DEL SESSION LO HACE MANU */
$idUsuario= 1;// esto es provisional

$controlCompraItem= new c_compraItem();
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
  $controlCompraItem->crearCarrito(1);
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
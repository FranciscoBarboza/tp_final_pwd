<?php
include_once("../Menu/Cabecera.php");
include_once("../../configuracion.php");

/**
 * busca e imprime todos los productos que compro alguien segun un id
 *  @param int $id unico de un usuario
 */
function cargarCarritoSegunId($id){
  echo "hola";
}

/* ESTO DEL SESSION LO HACE MANU */
$idUsuario= 1;// esto es provisional


$base= new baseDatos();










function cargarCarrito($id){
  /* inicializo variables */
$objCompra= new Compra();
$objCompraItem= new CompraItem();
$objCompraEstado= new CompraEstado();


$objCompraEstado->listar("idCompraEstadoTipo = 1");//si no tiene ninguna significa que el carrito esta vacio y una sola compra
$idCompra= $objCompraEstado->getObjCompra()->getIdCompra();//las compras con estado 1 iniciada siempre tienen una sola compra;
$comprasDeUnUsuario= $objCompra->listar("idCompra= {$idCompra} AND idUsuario={$id}")//lista todas las compras con un id y estado iniciado




}
/**
 * @param obj $objCompraItem
 */
function formato($objCompraItem){
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
      <!-- aca iria la funcion que crearia la tabla o no -->
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
<?php
    include "../../configuracion.php";
    // include_once("Menu/Cabecera.php");
    include_once "../Menu/Cabecera.php";


    function crearTienda(){
      $producto= new Producto();
      $arrayProductos= $producto->listar();

      foreach ($arrayProductos as $objProducto) {
        formato($objProducto);
      }




    }
    /**
     * imprime un 
     */
    function formato($objProducto){
        

        $idProducto= $objProducto->getIdProducto();
        $proNombre= $objProducto->getProNombre();
        $proDetalle= $objProducto->getProDetalle();
        $proCantStock= $objProducto->getProCantStock();
        $proPrecio= $objProducto->getProPrecio();
        $urlItem= $objProducto->getUrlItem();

        echo "
        <div class=\"col-12 col-sm-12 col-md-4 col-lg-3 container py-2\" style=\"background-color: blue;\">
        <div class=\"caja_producto id container col-9 col-sm-12 col-md-12 py-2\">
            <div class=\"img_producto\">
                <img src=\"{$urlItem}\" class=\"img-thumbnail rounded col-8 col-md-11 col-sm-9 \"  style=\"width: auto;height: 260px\">
            </div>
            <div class=\"titulo_producto text-center\"><h4 style=\"display: inline-block;\">{$proNombre}-{$proPrecio}</h4></div>
            <form action=\"\">
                <input type=\"number\" name=\"\" class=\"cantidad col-2\">
                stock: {$proCantStock}
                <button>COMPRAR</button>
                <div class=\"d-none\">{$idProducto}</div>
            </form>
            
            <hr>
            <div class=\"desc_producto \">{$proDetalle}</div>

        </div>
    </div>
        ";
    };



?>




<html>
    <head>
        <title>tienda</title>
        <link rel="stylesheet" href="../css/tienda.css">
        <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <script src="../Vista/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    </head>

    
    
<body>

   


<div class="container-fluid" >  

    <div class="row" id="tienda_productos">

    <?php crearTienda() ?>

  
    </div>
</div> 





<script src="javascript/tienda.js"></script>
</body>
</html>


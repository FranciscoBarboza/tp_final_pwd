<?php
    include "../configuracion.php";
    // include_once("Menu/Cabecera.php");
    include_once "Menu/Cabecera.php";


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
            <form action=\"\" method=\"post\" class=\"needs-validation\" novalidate>
                <input type=\"text\" name=\"idProducto\" id=\"idProducto\" class=\"d-none\">
                <div>
                    <input type=\"number\" name=\"ciCantidad\" id=\"cantidad_input\" min=\"1\" max=\"{$proCantStock}\" class=\"form-control\" placeholder=\"cant\" required cols=\"2\">
                    <div class=\"invalid-feedback mb-1\">
                        sin stock
                    </div>
                    <div class=\"invalid-feedback mb-1\">
                        bien!
                    </div>
                    <input class=\"btn btn-success me-2\" type=\"submit\" name=\"boton_enviar\" value=\"comprar\">
                    stock: {$proCantStock}
                    
                </div>
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
        <link rel="stylesheet" href="css/tienda.css">
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <script src="/Vista/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    </head>

    
    
<body>

    <!-- menu principal -->
    <!--
    <div class="fondoLogo" id="fondo">
    <a href="inicio.html"></a>
    <div class="logo" id="pnglogo">
        <p><a href="curriculum.html">quieres trabajar <br> con nosotros?</a></p>
        <img src="./css/imagenes/logo.png"></div>
    </a>
    <div class="navegacion">
        <a href="inicio.php">Inicio</a>
        <a href="sobre_nosotros.php">Sobre nosotros</a>
        <a href="tienda.php">Tienda</a>
        <a href="calculadora2.php">pedido</a>
    </div>
</div>

-->


<div class="container-fluid" >  

    <div class="row" id="tienda_productos">

    <?php crearTienda() ?>

    <!--
    <div class="col-12 col-sm-12 col-md-4 col-lg-3 container py-2" style="background-color: blue;">
        <div class="caja_producto id container col-9 col-sm-11 col-md-12 py-2">
            <div class="img_producto">
                <img src="https://i.pinimg.com/originals/3b/01/4a/3b014ad3e88e199cea4862a0efddca4b.jpg" class="col-8 col-md-11 col-sm-9 " height="">
            </div>
            <div clas="titulo_producto text-start"><h3 style="display: inline-block;">titulo-$3500</h3></div>
            <form action="">
                <input type="number" name="" class="cantidad col-3">
                stock:
                <button>COMPRAR</button>
            </form>
            
            <hr style="margin-top: 7px; margin-bottom: 0px;">
            <div class="desc_producto ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ullam nihil aliquid similique iste vel? Totam corrupti eligendi ipsum et.</div>

        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-4 col-lg-3" style="background-color: yellow;">
        <div class="caja_producto id container col-9 col-sm-12 col-md-12">
            <div class="img_producto">
                <img src= class="col-8 col-md-11 col-sm-9" height="">
            </div>
            <div clas="titulo_producto">titulo</div>
            <hr>
            <div class="desc_producto">descripcion</div>

        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-3" style="background-color: black;">aaaa</div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-3" style="background-color: blue;">aaaa</div>
-->
    </div>
</div> 





<script src="javascript/tienda.js"></script>
</body>
</html>


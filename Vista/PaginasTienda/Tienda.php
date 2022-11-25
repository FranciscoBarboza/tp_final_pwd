<?php
    include "../../configuracion.php";
    // include_once("Menu/Cabecera.php");
    include_once "../menu/cabecera.php";


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
            <form action=\"acciones/accionAgregarAlCarrito.php\" method=\"post\" class=\"needs-validation\" novalidate>
                <input type=\"text\" name=\"idProducto\" id=\"idProducto\" class=\"d-none\" value=\"{$idProducto}\">
                <div>
                    <input type=\"number\" name=\"ciCantidad\" id=\"cantidad_input\" min=\"1\" max=\"{$proCantStock}\" class=\"form-control\" placeholder=\"cant\" required cols=\"2\">
                    <div class=\"invalid-feedback mb-1\">
                        sin stock
                    </div>
                    <div class=\"valid-feedback mb-1\">
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
        <link rel="stylesheet" href="../css/tienda.css">
        <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
        <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
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
    </div>
</div> 
<script>
    (function () {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<script src="javascript/tienda.js"></script>
</body>
</html>


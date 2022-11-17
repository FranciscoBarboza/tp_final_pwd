<?php
    include "../configuracion.php";
    // include_once("Menu/Cabecera.php");
    include_once "Menu/Cabecera.php";

    $objProducto= new Producto();

    $arrayProductos= $objProducto->listar();
    //inicializo los objetos producto

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


<div class="container-fluid">  

    <div class="row">

    <div class="col-12 col-sm-12 col-md-3" style="background-color: blue;">
        <div class="caja_producto id container col-9 col-sm-12">
            <div class="img_producto">
                <img src="https://i.pinimg.com/originals/3b/01/4a/3b014ad3e88e199cea4862a0efddca4b.jpg" class="col-8 col-md-10 col-sm-8" height="">
            </div>
            <div clas="titulo_producto">titulo</div>
            <hr>
            <div class="desc_producto">descripcion</div>

        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-3" style="background-color: yellow;">aaaa</div>
    <div class="col-12 col-sm-12 col-md-3" style="background-color: black;">aaaa</div>
    <div class="col-12 col-sm-12 col-md-3" style="background-color: blue;">aaaa</div>

    </div>
</div> 





<script src="javascript/tienda.js"></script>
</body>
</html>


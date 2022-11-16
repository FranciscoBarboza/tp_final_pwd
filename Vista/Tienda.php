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

<div class="tienda">
    
    
<div class="productos">
    <div class="p" id="p1" value="1">
        <div id="img"></div>
        <div id="fotito"></div>
        <div id="titulo">
            MACHIMBRE 1cm x 6cm x 1 mt<span><br><br>$1800</span> <br>
            <input type="button" value="comprar" id="producto1" >
        </div>
        <br>
        
    </div>

    <div class="p" id="p2">
        <div id="img"></div>
        <div id="fotito"></div>
        <div id="titulo">
            estacas 3"x3"x55cm 20unidades <span><br>$2100 c/u</span>
            <br><input type="button" value="comprar" id="producto2">
        </div>
    </div>
    <div class="p" id="p3">
        <div id="img"></div>
        <div id="fotito"></div>
        <div id="titulo">
            TIRANTE DE PINO 3"x 6"x3,66mts <span><br>$270 c/u</span>
            <br><input type="button" value="comprar" id="producto3">
        </div>
    </div>

    <div class="p" id="p4">
        <div id="img"></div>
        <div id="fotito"></div>
        <div id="titulo">
            LISTONES DE PINO 1"x3"x3mts<span><br><br>$2100</span><br>
            <input type="button" value="comprar" id="producto4">
        </div>
    </div>

    <div class="p" id="p5">
        <div id="img"></div>
        <div id="fotito"></div>
    </div>

    <div class="p" id="p6">
        <div id="img"></div>
        <div id="fotito"></div>
        
    </div>

    <div class="p" id="p7">
        <div id="img"></div>
        <div id="fotito"></div>
    </div>

    <div class="p" id="p8">
        <div id="img"></div>
        <div id="fotito"></div>
    </div>
</div>





<div class="carrito">
    <div class="cositaslogo">
    <h2>C A R R I T O</h2>
    <div id="logocarrito"></div>
    </div>
    
    
    <hr/>
    <div>
        <ul id="comprado">
        <!-- aca van los productos comprados -->
    
        
        </ul>
    </div>
    


    <div id="total">Total: $<span>0</span></div>;
    <input type="button" value="comprar" id="botoncompra">

    
</div>

</div>
    


<script src="javascript/tienda.js"></script>
</body>
</html>


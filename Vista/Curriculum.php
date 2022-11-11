<html>
<head>
    <title>curriculum</title>
    <link rel="stylesheet" href="css/curriculum.css">
</head>
<body>
    
    <!-- menu principal -->
<div class="fondoLogo" id="fondo">
    <a href="inicio.html"></a>
    <div class="logo" id="pnglogo">
        <p><a href="#">quieres trabajar <br> con nosotros?</a></p>
        <img src="./css/imagenes/logo.png"></div>
    </a>
    <div class="navegacion">
        <a href="inicio.html">Inicio</a>
        <a href="sobreNosotros.html">Sobre nosotros</a>
        <a href="tienda.html">Tienda</a>
        <a href="contacto.html">contacto</a>
    </div>
</div>

<div id="pantalla">
<div id="pestanya1">
    <div>DATOS</div>
<form action="" id="formulario1">

    <div class="datos"><input type="text" name="nombre_form" id="nombre" placeholder="nombre completo" class="inputsF1"></div>
    <span class="mensajesError mensajesError_true" id="error_nombre">tiene que ser nombre apellido de 4 letras minimo cada uno</span>

    <div class="datos"><input type="date" name="fecha_form" id="fecha" class="inputsF1" value="2021-08-24" min="1940-01-01" max="2022-08-23"></div>
    <span class="mensajesError mensajesError_true" id="error_fecha" >es menor de edad o ingreso incorrectamente el dia</span>

    <div class="datos"><input type="email" name="email_form" id="email" placeholder="ejemplo@email.com" class="inputsF1"></div>
    <span class="mensajesError mensajesError_true" id="error_email">tiene que ser un email real</span>

    <div class="datos"><input type="text" name="dni_form" id="dni" placeholder="DNI sin punto ni espacios" class="inputsF1"></div>
    <span class="mensajesError mensajesError_true" id="error_dni">el dni tiene que ser 8 digitos separado</span>
    <input type="button" name="" id="siguienteF1" value="SIGUIENTE" onclick="mayorDe18(), siguiente()" >

</form>
</div>
</div>
<!--pestaña 2-->
<div id="pestanya2" class="pestanya1_hidden">
    <div> DATOS </div>
    <hr>
    <p>ESTUDIOS</p>
    <div contenteditable id="estudios" class="fake-textarea"></div>
    <span id="error_estudios" class="error_pestanya2">ingrese una descripcion de 20 caracteres minimo</span>
    
    
    <P>ESCRIBA UNA DESCRIPCION Y EXPERIENCIAS</P>
    <div contenteditable id="descripcion" class="fake-textarea"></div>
    <span id="error_descripcion" class="error_pestanya2">ingrese una descripcion de mas de 30 caracteres</span>
    <input type="button" id="enviar"  value="enviar">
    
</div>











</body>

<script src="javascript/curriculum.js"></script>

</html>
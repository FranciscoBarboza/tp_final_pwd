<html>
    <head>
        <title>envio</title>
        <link rel="stylesheet" href="css/mapa_envio.css">
    </head>
    <body onload="cargar()">
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

<div id="pantalla">
    <div id="caja1">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3103.340054126661!2d-68.21809118501336!3d-38.93905910703529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x960bcb49f5694f1d%3A0xfdf1c5102ef5a118!2sAserradero%20plottier!5e0!3m2!1ses!2sar!4v1661244064552!5m2!1ses!2sar" width="533" height="520" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="aserradero_plottier"></iframe>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.816718246566!2d-68.228510785013!3d-38.951015307737215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x960bcc074247cb49%3A0x44c6e815745a656d!2sFerreter%C3%ADa%20Pintureria%20Electricidad%20TITAN!5e0!3m2!1ses!2sar!4v1661244663641!5m2!1ses!2sar" width="533" height="520" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="ferreteria_titan"></iframe>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3103.0606518890695!2d-68.27044207978808!3d-38.945442751599664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x960bc9393b502e11%3A0x427bc31af41a7d40!2sCorralon%20IPC!5e0!3m2!1ses!2sar!4v1661244733259!5m2!1ses!2sar" width="533" height="520" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="corralon_ipc"></iframe>
    </div>

    <div id="caja2">
        <div id="div_seleccion">
            <span id="span_titulo">SELECCIONE UNO:</span>
            <ul id="opciones_de_envio">
                <li onclick="seleccionarAserraderoPlottier()">
                    <div class="justificar">
                        <span class="titulo_ubicacion">Aserradero Plottier</span><span class="precio">$600</span>
                    </div>
                    <hr>
                    <span class="descripcion_ubicacion">calle pellegrini 808, Plottier</span><br>
                    <a href="https://goo.gl/maps/Ls5tPdbA8o3L3u31A">UBICACION</a>
                    
                </li>
                <li onclick="seleccionarCorralonIPC()">
                    <div class="justificar">
                        <span class="titulo_ubicacion">Corralon IPC</span><span class="precio">$850</span>
                    </div>
                    <hr>
                    <span class="descripcion_ubicacion">calle Candolle 2651, plottier</span><br>
                    <a href="https://goo.gl/maps/dW5aZDSp9hvXD9Eh8">UBICACION</a>
                </li>
                <li onclick="seleccionarFerreteriaTitan()">
                    <div class="justificar">
                        <span class="titulo_ubicacion">Ferreteria Titan</span><span class="precio">$1000</span>
                    </div>
                    <hr>
                    <span class="descripcion_ubicacion">Av. San Martín 268, Plottier</span><br>
                    <a href="https://goo.gl/maps/DeXNSdgzioStVu8d9">UBICACION</a>
                </li>
            </ul>
        </div>
        <div id="div_encargar">
            

        </div>
    </div>





</div>







    </body>
    <script src="javascript/mapa_envio.js"></script>
</html>
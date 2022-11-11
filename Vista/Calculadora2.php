<html>
    <head>
        <title>calculadora2</title>
        <link rel="stylesheet" href="css/calculadora2.css">
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
        <a href="inicio.html">Inicio</a>
        <a href="sobre_nosotros.html">Sobre nosotros</a>
        <a href="tienda.html">Tienda</a>
        <a href="calculadora2.html">pedido</a>
    </div>
</div>

<div id="pantalla">
    <!-- maderas que tienen los precios por metro cuadrado -->
    <div id="maderas">


        <div id="titulo_maderas">
            <span class="TITULO">PRECIOS</span>
            <hr>
            <ul id="lista_productos" >
                
                <li id="madera_pino">
                    <div class="foto"></div>


                    <div class="cajita2">
                        
                        <p class="titulo">PINO</p>
                        
                        <p class="medidas">
                            18mm 1,22 x 3,00 mts <br>
                            16mm 1,22 x 3,00 mts
                        </p>
                        <p class="precios">
                            $10000 <br>
                            $7000
                        </p>

                        <input type="button" value="comprar" id="pino_comprar">
                        
                   
                    </div>
                </li>
                
                <li id="madera_cedro">
                    <div class="foto"></div>


                    <div class="cajita2">
                        <p class="titulo">CEDRO</p>
                        <p class="medidas">
                            30mm 0,90 x 3,00 mts <br>
                            18mm 0,90 x 3,00 mts
                        </p>
                        <p class="precios">
                            $30000 <br>
                            $18000
                        </p>
                        <input type="button" value="comprar" id="cedro_comprar">
                    </div>
                </li>
                
                <li id="madera_nogal">
                    <div class="foto"></div>


                    <div class="cajita2">
                        <p class="titulo">NOGAL</p>

                        <p class="medidas">
                            34mm 1,22 x 3,00 mts <br>
                            18mm 1,22 x 3,00 mts
                        </p>
                        <p class="precios">
                            $20500 <br>
                            $11000
                        </p>
                        <input type="button" value="comprar" id="nogal_comprar">
                    </div>
                </li>

                <li id="madera_haya">
                    <div class="foto"></div>


                    <div class="cajita2">
                        <p class="titulo">HAYA</p>

                        <p class="medidas">
                            20mm 1,00 x 2,00 mts <br>
                            18mm 1,00 x 2,00 mts
                        </p>
                        <p class="precios">
                            $19000 <br>
                            $15000
                        </p>

                        <input type="button" value="comprar" id="haya_comprar">
                    </div>
                </li>

                
            </ul>
        </div>


    </div>
    <!-- calculadora que recibe los centimetros -->
    <div id="calculadora">


        <div id="titulo_calculadora">
            <div id="calculos">
                <SPAN class="TITULO">PEDIDO</SPAN>
                <hr>
                <ul id="elementos_calculo">
                    

                    
                </ul>
            </div>



            <div id="resultados"> <!-- resultados -->
                <span class="TITULO" id="titulo_resultados">TOTALES</span>
                <hr>
                <p>
                    TOTAL PINO: $ <span id="total_pino">0</span>
                </p><br>
                <P>
                    TOTAL CEDRO: $ <span id="total_cedro">0</span>
                </P><br>
                <P>
                    TOTAL NOGAL: $ <span id="total_nogal">0</span>
                </P><br>
                <p>
                    TOTAL HAYA: $ <span id="total_haya">0</span>
                </p>
                <span id="total_div">TOTAL: $<span id="total_maderas">0</span></span>
                <input type="button" value="COMPRAR" id="comprar" onclick="comprar()">
            </div>
        </div>


    </div>
</div>

<script src="javascript/calculadora2.js"></script>
</body>
</html>
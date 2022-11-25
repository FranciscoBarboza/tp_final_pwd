<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>




<?php
include_once "Menu/Cabecera.php";
include "../configuracion.php";

function actualizar(){
    $objProducto= new Producto;
    $arrayProductos= $objProducto->listar();

    $hola= ["hola"=>2, "adios"=>3];

    print_r($hola["hola"]);

    print_r($arrayProductos[0]->getIdProducto());

    echo "
        <script>
            prompt(\"hola\")
        </script>
    ";
}

actualizar();



?>




<div style="border: 1px black red; width: 100%; height: 100px;" id="hola">

</div>


</body>
</html>
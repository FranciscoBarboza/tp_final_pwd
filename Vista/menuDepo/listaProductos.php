<?php
include_once("../Menu/Cabecera.php");
include_once("../../configuracion.php");
    $objProducto = new c_producto();
    $arrayProductos = $objProducto->buscar(null);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div  class="container-fluid">
            <div class="container col-md-10">
                <h2>Lista de todos los productos de la plataforma</h2>
                <div class="mb-3">
                    <div class="mt-3 mb-3">
                        <a class="btn text-decoration-none btn btn-outline-light" href="cargarProducto.php">AGREGAR PRODUCTO</a>
                    </div>
                    <?php
                        if ($arrayProductos != null) {
                    ?>
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>ID producto</th>
                                    <th>Nombre</th>
                                    <th>Detalle</th>
                                    <th>Precio</th>
                                    <th>En stock</th>
                                    <th>URL imagen</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while ($i < $cantUsuarios){
                            ?>
                            <?php
                                if(isset($arrayProductos)){ //isset se fija si la variable tiene algo
                                    foreach ($arrayProductos as $producto){ 
                                        echo '<tr>';
                                        echo '<td>'. $producto->getIdProducto().'</td>';
                                        echo '<td>'. $producto->getProNombre().'</td>';
                                        echo '<td>'. $producto->getProDetalle().'</td>';
                                        echo '<td>'. $producto->getProPrecio().'</td>';
                                        echo '<td>'. $producto->getProCantStock().'</td>';
                                        echo '<td>'. $producto->getUrlItem().'</td>';
                                        echo '<td><a class="btn btn-dark" href="accionHabilitacionUsuario.php>Habilitar/Deshabilitar</a></td>'; 
                                    }
                                }else{
                                    echo '<p class="lead"> Actualmente no hay personas registradas </p>';
                                }
                            ?>
                            <?php
                                $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</body>
</html>
<?php
    include_once("Menu/Pie.php")
?>
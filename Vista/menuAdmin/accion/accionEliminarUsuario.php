<?php
include_once("../Menu/Cabecera.php");
include_once("../../configuracion.php");
$datos = data_submitted();
$objUsuario = new c_usuario();
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
    <div class="container-fluid">
        <div class="container col-md-10">
            <h2>Resultado la busqueda:</h2>
            <div class="mb-3">
                <?php
                if ($objUsuario->baja($datos)) {
                    echo "<h3 class='text-success'>El usuario se pudo eliminar con exito!</h3>";
                } else {
                    echo "<h3 class='text-danger'>El usuario no se pudo eliminar!</h3>";
                }
                ?>
            </div>
            <div>
                <div class="mb-3">
                    <a href="listaUsuarios.php" class="btn btn-dark">Volver</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
    include_once("../menu/pie.php")
?>
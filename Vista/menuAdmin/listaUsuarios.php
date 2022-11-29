<?php
include_once("../Menu/Cabecera.php");
include_once("../../configuracion.php");
    $objUsuario = new c_usuario();
    $arrayUsuarios = $objUsuario->buscar(null);
    $objAuto = new c_rol();
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
                <h2>Lista de todos los usuarios</h2>
                <div class="mb-3">
                        <table class="table table-hover">
                            <tr>
                                <th>ID usuario</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Mail Usuario</th>
                                <th>Roles</th>
                                <th>Habilitado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php
                                if(isset($arrayUsuarios)){ //isset se fija si la variable tiene algo
                                    foreach ($arrayUsuarios as $usuario){ 
                                        echo '<tr>';
                                        echo '<td>'. $usuario->getIdUsuario().'</td>';
                                        echo '<td>'. $usuario->getUsNombre().'</td>';
                                        echo '<td>'. $usuario->getUsPass().'</td>';
                                        echo '<td>'. $usuario->getUsMail().'</td>';
                                        echo '<td>'. $usuario->getTelefono().'</td>';
                                        echo '<td>'. $usuario->getUsDeshabilitado().'</td>';
                                        echo '<td><a class="btn btn-dark" href="accionHabilitacionUsuario.php>Habilitar/Deshabilitar</a></td>'; 
                                    }
                                }else{
                                    echo '<p class="lead"> Actualmente no hay personas registradas </p>';
                                }
                            ?>
                        </table>
                </div>
            </div>
    </div>
</body>
</html>
<?php
    include_once("Menu/Pie.php")
?>
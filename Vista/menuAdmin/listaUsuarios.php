<?php
include_once("../menu/cabecera.php");
include_once("../../configuracion.php");
    $objControlUsuario = new c_usuario();
    $arrayBusqueda = [];
    $arrayUsuarios = $objControlUsuario->listar($arrayBusqueda);
    /* echo '<pre>';
    var_dump($arrayUsuarios);
    echo '</pre>'; */
    /* die();  */
    $objUsuarioRol = new c_usuarioRol();
    $arrayRolesUsuario = $objUsuarioRol->buscar(null);
    /* echo '<pre>';
        var_dump($arrayRolesUsuario);
    echo '</pre>'; */
    if ($arrayUsuarios != null) {
        $cantUsuarios = count($arrayUsuarios);
        // $rolesDesc = $objUsuarioRol->darDescripcionRoles($arrayUsuarios);
    } else {
        $cantUsuarios = -1;
    }
    $i = 0;
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body> -->
    <div  class="container-fluid">
            <div class="container col-md-10">
                <h2>Lista de todos los usuarios</h2>
                <div class="mb-3">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>ID usuario</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Mail Usuario</th>
                                    <th>Roles</th>
                                    <th>Estado actual</th>
                                    <th>Editar Usuario</th>
                                    <th>Deshabilitar/Habilitar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                /* echo '<pre>';
                                var_dump($arrayRolesUsuario);
                                echo '</pre>';  */
                                if(isset($arrayUsuarios)){ //isset se fija si la variable tiene algo
                                    foreach ($arrayUsuarios as $usuario){ 
                                        echo '<tr>';
                                        echo '<td>'. $usuario->getIdUsuario().'</td>';
                                        echo '<td>'. $usuario->getUsNombre().'</td>';
                                        echo '<td>'. $usuario->getUsPass().'</td>';
                                        echo '<td>'. $usuario->getUsMail().'</td>';
                                        // echo '<td>'. 
                                    /* foreach($arrayRolesUsuario as $usRol){
                                        echo '<td>';
                                            echo $usRol->getIdRol();
                                            $sepRoles = "-";
                                            $idUsuario= intval($usuario->getIdUsuario());
                                            $usRol= $objUsuarioRol->buscar(['idUsuario' => $idUsuario]);
                                            foreach ($arrayUsRol[0] as $rol) {
                                                $sepRoles = $sepRoles . $rol->getObjRol()->getRolDescripcion() . "-";
                                            }
                                            echo $sepRoles .
                                            '</td>';
                                        } */
                                        /* echo '<td>'. $usuario->getTelefono().'</td>'; */
                                        echo '<td>'. $usuario->getUsDeshabilitado().'</td>';
                                        // echo '<td><a class="btn btn-dark" href="accionHabilitacionUsuario.php>Habilitar/Deshabilitar</a></td>'; 
                                        echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#exampleModal" data-bs-whatever="@mdo">Editar Usuario</button>';
                                        echo '<td><button type="button" class="btn btn-warning remove">Deshabilitar</button></td>';
                                        echo '<td><button type="button" class="btn btn-warning unRemove">Habilitar</button></td>';
                                        echo '</tr>';
                                    }
                                }else{
                                    echo '<p class="lead"> Actualmente no hay personas registradas </p>';
                                }
                            ?>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
<!-- </body> -->
<script src="js/deshabilitarUsuario.js"></script>;
<script src="js/habilitarUsuario.js"></script>;
<!-- </html> -->
<?php
    include_once("../menu/pie.php");
?>
<?php
include_once("../menu/cabecera.php");
include_once("../../configuracion.php");
    $objProducto = new c_producto();
    $arrayProductos = $objProducto->buscar(null);
    if ($arrayProductos != null) {
        $cantProductos = count($arrayProductos);
    } else {
        $cantProductos = -1;
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
</head> -->
<!-- <body> -->
<div class="container col-md-10">
    <form action="" class="form-control needs-validation" method="POST" novalidate>         
    <table id="formulario_CrearProducto" class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Url Imagen</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="proNombre" id="" class="form-control" required>
                    <div class="valid-feedback mb-1">bien</div>
                    <div class="invalid-feedback mb-1">ingrese un nombre valido</div>
                </td>
                <td>
                    <input type="text" name="proDetalle" id="" minlength="10" class="form-control" required>
                    <div class="valid-feedback mb-1">biem</div>
                    <div class="invalid-feedback mb-1">ingrese una descripcion 10 letras min</div>
                </td>
                <td>
                    <input type="number" name="proCantStock" id="" min="1" class="form-control" required>
                    <div class="valid-feedback mb-1">bien</div>
                    <div class="invalid-feedback mb-1">stock minimo "1"</div>
                </td> 


                <td>
                    <input type="number" name="proPrecio" id="" min="1" class="form-control" required>
                    <div class="valid-feedback mb-1">bien</div>
                    <div class="invalid-feedback mb-1">precio minimo "1"</div>
                </td>
                <td>
                    <input type="url" name="urlImagen" id="" class="form-control" required>
                    <div class="valid-feedback mb-1">bien</div>
                    <div class="invalid-feedback mb-1">ingrese un url</div>
                </td>
                <td>
                    <input class="btn btn-success me-2" type="submit" name="boton_enviar" value="Agregar" class="form-control">
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
    <div class="container-fluid">
            <div class="container col-md-10">
                <h2>Lista de todos los productos de la plataforma</h2>
                <div class="mb-3">
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
                                if(isset($arrayProductos)){ //isset se fija si la variable tiene algo
                                    foreach ($arrayProductos as $producto){ 
                                        echo '<tr>';
                                        echo '<td>'. $producto->getIdProducto().'</td>';
                                        echo '<td>'. $producto->getProNombre().'</td>';
                                        echo '<td>'. $producto->getProDetalle().'</td>';
                                        echo '<td>'. $producto->getProPrecio().'</td>';
                                        echo '<td>'. $producto->getProCantStock().'</td>';
                                        echo '<td>'. $producto->getUrlItem().'</td>';
                                        echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#exampleModal" data-bs-whatever="@mdo">Editar Producto</button>';
                                        echo '<td><a class = "remove"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></a></td>';
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
                        </tbody>
                    </table>
                </div>
            </div>
<!-- </body> -->
<script>
    (function () {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<!-- </html> -->
<?php
    include_once("../menu/pie.php")
?>
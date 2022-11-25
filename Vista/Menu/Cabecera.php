<?php
include_once('../../configuracion.php');

$objSession= new C_Session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Head</title>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../alertas/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../alertas/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../css/genera.css">
  <script src="../jQuery/jquery-3.6.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-xl navbar-light  barra_navegacion" aria-label="Third navbar example"  id="header" style="background-color: #4B515D">
    <div class="container-fluid">
    <span class="navbar-brand" style="font-family: 'Chivo', sans-serif;">Trabajo Final</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          
          <li class="nav-item">
            <a class="nav-link active" href="../paginasTienda/inicio.php" style="font-family: 'Chivo', sans-serif;">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../paginasTienda/tienda.php" style="font-family: 'Chivo', sans-serif;">Tienda</a>
          </li>
          <?php
          /*switch($rol){
            case "Usuario":$a;
            case "Administrador":; */
          ?>
          <li class="nav-item">
            <a class="nav-link active" href="../menuRoles/administrador.php" style="font-family: 'Chivo', sans-serif;">administrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../login/login.php" style="font-family: 'Chivo', sans-serif;">Ingresar</a>
          </li>
          <?php /*
            case "Deposito":;
          }*/
          ?>
          
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
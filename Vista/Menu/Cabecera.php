<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Head</title>
  <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css_header_footer.css">
</head>
<body>
  <nav class="navbar navbar-expand-xl navbar-light barra_navegacion" aria-label="Third navbar example"  id="header">
    <div class="container-fluid">
    <span class="navbar-brand" style="font-family: 'Chivo', sans-serif;">Trabajo Final</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="VerAutos.php" style="font-family: 'Chivo', sans-serif;">Ver Autos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="buscarAuto.php" style="font-family: 'Chivo', sans-serif;">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="listaPersona.php" style="font-family: 'Chivo', sans-serif;">Tienda</a>
          </li>
          <?php
          switch($rol){
            case "Usuario":$a;
            case "Administrador":;
          ?>
          <li class="nav-item">
            <a class="nav-link active" href="nuevaPersona.php" style="font-family: 'Chivo', sans-serif;">Administrar cuentas</a>
          </li>
          <?php
            case "Deposito":;
          }
          ?>
          
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
<?php
include_once("../Menu/Cabecera.php");
$metodo = data_submitted();
$metodo['usPass'] = md5($metodo["usPass"]);
$objUsuario = new C_Usuario();
if($objSession->validar($metodo)){
    ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'La sesion se inicio correcptamente!',
            showConfirmButton: false,
            timer: 1500
        })

        function redireccionarPagina() {
            location.href = "../Inicio.php"
        }
        setTimeout("redireccionarPagina()", 1450);
    </script>
    <?php
}else{
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'La contraseña y/o el usuario no coinciden!',
            showConfirmButton: false,
            timer: 1500
        })

        function redireccionarPagina() {
            location.href = "login.php"
        }
        setTimeout("redireccionarPagina()", 1450);
    </script>
<?php
    $objSession->cerrar();
}
?>

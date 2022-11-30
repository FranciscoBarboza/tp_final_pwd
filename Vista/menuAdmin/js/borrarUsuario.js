function registerSuccess() {
    Swal.fire({
        icon: 'success',
        title: 'El producto se ha eliminado correctamente!',
        showConfirmButton: false,
        timer: 1500
    })
    setTimeout(function () {
        recargarPagina();
    }, 1500);
}

function registerFailure() {
    Swal.fire({
        icon: 'error',
        title: 'No se ha podido eliminar el producto!',
        showConfirmButton: false,
        timer: 1500
    })
    setTimeout(function () {
        recargarPagina();
    }, 1500);
}

function recargarPagina() {
    location.reload();
}

var cantidadBorrar;
$(document).on('click', '.remove', function () {

    var fila = $(this).closest('tr');
    console.log();
    $.ajax({
        type: "POST",
        url: 'accion/accionEliminarUsuario.php',
        data: { idUsuario: fila[0].children[0].innerHTML},
        success: function (respuesta) {
            var jsonData = JSON.parse(respuesta);

            // user is logged in successfully in the back-end
            // let's redirect
            if (jsonData.success == "1") {
                registerSuccess();
            }
            else if (jsonData.success == "0") {
                registerFailure();
            }
        }
    });

});
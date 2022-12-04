$(document).ready(function () {
    $('.editarBoton').on('click', function(){
       
        $('#exampleModal').modal('show');
        
            var tr = $(this).closest('tr');
            var data = tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#usNombre').val(data[1]);
        $('#usMail').val(data[3]);
    });
});

/* $(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();
        const forms = document.querySelectorAll('.needs-validation');
        if (forms[0].checkValidity()) {
            if(document.getElementById('input_contrasena').value == document.getElementById('input_contrasenaRep').value){
            var password = document.getElementById("input_contrasena").value;
            var passhash = hex_md5(password).toString();
            document.getElementById("input_contrasena").value = passhash;
            $.ajax({
                type: "POST",
                url: 'accion/accionActualizarUsuario.php',
                data: $(this).serialize(),
                success: function (response) {
                    var jsonData = JSON.parse(response);

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
            } else { 
                document.getElementsByClassName('invalid-password')[0].style = "display: block; color:red";
                document.getElementsByClassName('invalid-password')[1].style = "display: block; color:red";
            }
        } else {
            forms[0].classList.add('was-validated');
        }
    });
}); */
/* f1 */
const formulario1= document.getElementById("formulario1")
const inputsF1= document.querySelectorAll("#formulario1 input")
const siguienteF1= document.getElementById("siguienteF1");

let siguiente_nombre= false;
let siguiente_fecha= false;
let siguiente_email= false;
let siguiente_dni= false;

const expresiones= {
    nombre_form: /^[a-zA-ZñáéíóúüÁÉÍÓÚÜ]{4,20}[\s][a-zA-ZñáéíóúüÁÉÍÓÚÜ ]{4,20}$/i,/// ^ [a-zA-Z] + [a-zA-Z] + $ / /^[a-zñáéíóúü]{4,16}$/i
    fecha_form: 0,
    email_form: /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/,
    dni_form: /^[0-9]{1,2}\.[0-9]{3}\.[0-9]{3}$/

}

/* asigno eventos */


const validarform = (formulario)=>{
    switch (formulario.target.name){
        case "nombre_form":
            /* /^[a-zA-ZÀ-ÿ]{4,16}$/ */
            if (expresiones.nombre_form.test(formulario.target.value)) {//en caso de que coincida con la exprecion regular
                document.getElementById("nombre").classList.remove("formulario_incorrecto")
                document.getElementById("nombre").classList.add("formulario_correcto")
                //mensaje de error
                document.getElementById("error_nombre").classList.remove("mensajesError_false")
                document.getElementById("error_nombre").classList.add("mensajesError_true")

                siguiente_nombre= true
            } else{
                document.getElementById("nombre").classList.add("formulario_incorrecto")//usuario div
                document.getElementById("nombre").classList.remove("formulario_correcto")
                //mensaje de error
                document.getElementById("error_nombre").classList.remove("mensajesError_true")
                document.getElementById("error_nombre").classList.add("mensajesError_false")
                
                siguiente_nombre= false
            }


        break;
        case "fecha_form":
            if (mayorDe18()) {//en caso de ser mayor de 18
                document.getElementById("fecha").classList.remove("formulario_incorrecto")
                document.getElementById("fecha").classList.add("formulario_correcto")
                //mensaje de error

                document.getElementById("error_fecha").classList.remove("mensajesError_false")
                document.getElementById("error_fecha").classList.add("mensajesError_true")

                siguiente_fecha= true
            } else {
                document.getElementById("fecha").classList.remove("formulario_correcto")
                document.getElementById("fecha").classList.add("formulario_incorrecto")
                //mensaje de error

                document.getElementById("error_fecha").classList.remove("mensajesError_true")
                document.getElementById("error_fecha").classList.add("mensajesError_false")

                siguiente_fecha= false
            }
        break;
        case "email_form":
            if (expresiones.email_form.test(formulario.target.value)) {// en caso de que coincida la exprecion regular
                document.getElementById("email").classList.remove("formulario_incorrecto")
                document.getElementById("email").classList.add("formulario_correcto")
                //mensaje de error
                
                document.getElementById("error_email").classList.remove("mensajesError_false")
                document.getElementById("error_email").classList.add("mensajesError_true")

                siguiente_email= true

            } else {
                document.getElementById("email").classList.remove("formulario_correcto")
                document.getElementById("email").classList.add("formulario_incorrecto")
                //mensaje de error
                document.getElementById("error_email").classList.remove("mensajesError_true")
                document.getElementById("error_email").classList.add("mensajesError_false")

                siguiente_email= false
            }
        break;
        case "dni_form":
            if (expresiones.dni_form.test(formulario.target.value)) {// en caso de que coincida el documento con el exp reg
                document.getElementById("dni").classList.remove("formulario_incorrecto")
                document.getElementById("dni").classList.add("formulario_correcto")
                // mensaje de error
                document.getElementById("error_dni").classList.remove("mensajesError_false")
                document.getElementById("error_dni").classList.add("mensajesError_true")

                siguiente_dni= true
            } else {
                document.getElementById("dni").classList.remove("formulario_correcto")
                document.getElementById("dni").classList.add("formulario_incorrecto")
                //mensaje de error
                document.getElementById("error_dni").classList.remove("mensajesError_true")
                document.getElementById("error_dni").classList.add("mensajesError_false")

                siguiente_dni= false
            }
        break;
    }
}


inputsF1.forEach((input) => {
    input.addEventListener("keyup", validarform)
    input.addEventListener("mousedown", validarform)
})



function  siguiente() {
    if(siguiente_nombre && siguiente_email && siguiente_dni && siguiente_fecha){
        document.getElementById("pestanya1").classList.add("pestanya1_hidden")
        document.getElementById("pestanya2").classList.remove("pestanya1_hidden")
        document.getElementById("pestanya2").classList.add("pestanya1_block")
    } else {
        alert("ERROR: ingrese correctamente los datos")
    }
}

function mayorDe18() {
    let hoy= new Date
    hoy= hoy.toLocaleDateString()// fecha hoy
    let input= document.getElementById("fecha").value//fecha del input
    let maximo= hoy.split("/")
    let aux= maximo[2]+"-"+maximo[1]+"-"+maximo[0]
    console.log(aux);
    
    

    let esMayor= false

    console.log(input);
   if (existeFecha(input) && input != "" && parseInt((input.split("-"))[0])>1940) {
       console.log("es una fecha real");
       
       
   

    let fecha_hoy= hoy.split("/")// me devuelve la fecha de hoy en arrar dia mes año
        
    let fecha_input= input.split("-")// devuelve la fecha año mes dia

        

        fecha_input= esBiciesto(fecha_input)
        
    /* reviso si es mayor */ 

    if (parseInt(fecha_hoy[2])-parseInt(fecha_input[0]) > 18) {// si la resta da mayor a 18 es mayor
        esMayor= true;
    } else if (parseInt(fecha_hoy[2])-parseInt(fecha_input[0]) == 18){//verifico si concuerdan los meses
        if (parseInt(fecha_hoy[1]) > parseInt(fecha_input[1])) {//en caso de que sea mismo año pero un mes mayor
            esMayor= true
        } else if (parseInt(fecha_hoy[1])== parseInt(fecha_input[1])) {//mismo año mismo mes
            if (parseInt(fecha_hoy[0]) >= parseInt(fecha_input[2])) {// en caso de tener mismo año mismo mas y dias mayor a 18
                esMayor= true
            } else {//si no cumple los requisitos entonces es menor
                esMayor= false
            }   
        } else {//si es mismo año pero un mes manor
            esMayor= false
        }
    } else {//en caso de que no coincida en nada
        esMayor= false
    }


} else {
    console.log("es una fecha falsa");
    return false
}
    console.log("esmayor?"+esMayor);
    return esMayor

}

/**
 * revisa el array por si es biciesto y esta en 29 de febrero en ese caso
 * devuelve el array el 1 del siguiente mes del siguiente año
 * recibe de fecha en año mes dia
 * 
 * @param array fecha
 *  
 */
function esBiciesto(fecha) {
    if (((parseInt(fecha[0])%4) == 0) && parseInt(fecha[1]) == 2 && parseInt(fecha[2]) == 29) {
        fecha[1]=3
        fecha[2]=1
    }

    return fecha
}



/* 
let ano= {
    enero: 31,
    marzo: 31,
    mayo: 31,
    julio: 31,
    agosto: 31,
    octubre: 31,
    diciembre: 31,
    abril: 30,
    junio: 30,
    septiembre: 30,
    noviembre: 30,
    febrero: 28,
    febrerob: 29
}

function fechaReal(fecha) {

    let real= true

    let anio= {
        1: 31,//enero
        2: 28,//febrero
        3: 31,//marzo
        4: 30,//abril
        5: 31,//
        6: 30,//junio
        7: 31,//julio
        8: 31,//agosto
        9: 30,//septiembre
        10: 31,//octubre
        11: 30,//noviembre
        12: 31,//diciembre
    }

    if (parseInt(fecha[0])%4 == 0) {//comprueba que sea biciesto
        anio[2]= 29
    }

    if (fecha[1]) {
        
    }



} */

/*

function existeFecha(fecha){
    var fechaf = fecha.split("/");
    var day = fechaf[0];
    var month = fechaf[1];
    var year = fechaf[2];
    var date = new Date(year,month,'0');
    

    if ((day== "29" && month == "2") && parseInt(year)%4 != 0 ) {
        return true
    }
    if((day-0)>(date.getDate()-0)){
        return false;
    }

    return true;
}*/
function existeFecha(fecha){
    var fechaf = fecha.split("-");
    var dia = fechaf[2];
    var mes = fechaf[1];
    var anio = fechaf[0];
    var date = new Date(anio,mes,'0');
    
    
    if ((dia== "29" && mes == "02") && ((parseInt(anio)%4)==0) ) {
        return true
    }

    if((dia-0)>(date.getDate()-0)){
        return false;
    }

    return true;
}
/* pestanya 2 */
const estudios_descripcion={
    estudios: /.{20}/,
    descripcion: /.{30}/
}

const estudiosDiv= document.getElementById("estudios");
estudiosDiv.addEventListener("keyup", validarEstudios)
const descripcionDiv= document.getElementById("descripcion")
descripcionDiv.addEventListener("keyup", validarDescripcion)


const estudios= document.getElementById("estudios")

const descripcion= document.getElementById("descripcion")




function validarEstudios() {
    let texto= document.getElementById("estudios").textContent
    let resp= false

    
    if (estudios_descripcion.estudios.test(texto)) {
        document.getElementById("estudios").classList.add("validacionP2_correcto")
        document.getElementById("estudios").classList.remove("validacionP2_incorrecto")
        /* errores */
        document.getElementById("error_estudios").classList.add("span_hidden")
        document.getElementById("error_estudios").classList.remove("span_block")

        resp= true
    } else {
        document.getElementById("estudios").classList.add("validacionP2_incorrecto")
        document.getElementById("estudios").classList.remove("validacionP2_correcto")
        /* errores */
        document.getElementById("error_estudios").classList.add("span_block")
        document.getElementById("error_estudios").classList.remove("span_hidden")

        resp= false
    }

    return resp
}


function validarDescripcion() {
    let texto= document.getElementById("descripcion").textContent
    let resp= false

    if (estudios_descripcion.descripcion.test(texto)) {
        document.getElementById("descripcion").classList.add("validacionP2_correcto")
        document.getElementById("descripcion").classList.remove("validacionP2_incorrecto")
        /* errores */
        document.getElementById("error_descripcion").classList.add("span_hidden")
        document.getElementById("error_descripcion").classList.remove("span_block")

        resp= true
    } else {
        document.getElementById("descripcion").classList.add("validacionP2_incorrecto")
        document.getElementById("descripcion").classList.remove("validacionP2_correcto")
        /* errores */
        document.getElementById("error_descripcion").classList.add("span_block")
        document.getElementById("error_descripcion").classList.remove("span_hidden")

        resp= false
    }

    return resp

}

/* boton de enviar */ 

const botonEnviar= document.getElementById("enviar")
botonEnviar.addEventListener("click", validacionEnviar)

//botonEnviar.addEventListener("click")

function validacionEnviar(){

    let p1= validarDescripcion();
    let p2= validarEstudios()

    if (p1 && p2) {
        
            alert("GRACIAS sus datos fueron enviados recibira respuesta en unos dias")    
        
        
    } else {
        alert("ERROR termine de completar los campos")
    }
}
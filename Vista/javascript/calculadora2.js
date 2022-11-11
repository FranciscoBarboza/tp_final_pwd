/* constantes */ 
const pino= document.getElementById("madera_pino")
const cedro= document.getElementById("madera_cedro")
const nogal= document.getElementById("madera_nogal")
const haya= document.getElementById("madera_haya")

const lista_pedido= document.getElementById("elementos_calculo")

const cedro_comprar= document.getElementById("cedro_comprar")
const pino_comprar= document.getElementById("pino_comprar")
const nogal_comprar= document.getElementById("nogal_comprar")
const haya_comprar= document.getElementById("haya_comprar")

/* botones */
pino_comprar.addEventListener("mousedown", agregarPino);
cedro_comprar.addEventListener("mousedown" , agregarCedro);
nogal_comprar.addEventListener("mousedown", agregarNogal);
haya_comprar.addEventListener("mousedown", agregarHaya);

pino_comprar.addEventListener("mouseup", totales)
cedro_comprar.addEventListener("mousedown", totales)
nogal_comprar.addEventListener("mousedown", totales)
haya_comprar.addEventListener("mousedown", totales)

//comprar final

let comprar_final= document.getElementById("comprar")
comprar_final.addEventListener("mousedown", totales)


/* funciones */

function eliminar(elemento) {
    elemento.parentNode.parentNode.remove();
}

function agregarPino(){
    let li= document.createElement("li");

    li.innerHTML+= "<div onclick='simpleSumaPino(this),totales()'>"+
    "<div class='foto_pino_producto'></div>"+
    "<button onclick= 'eliminar(this)' class='eliminar'>X</button></p>"+
    "<div class='caja_3'>"+
    
        

    "<div class='titulo_total'>"+
        "<span>PINO</span>"+
        "<p>Total:$<span class='total_pino'>27.32</span></p>"+
    "</div>"+
    

    
        
        "<div class='div_medidas_c'>"+
        "<span>G:</span>"+
        "<select  class='grosor_pino'>"+
            "<option value='18'>18</option>"+
            "<option value='16'>16</option>"+
        "</select>"+
        "<span>mm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>A:</span>"+
        "<input type='number' class='ancho_pino' step='0.1' min='10' max='122' value='10'>"+
        "<span>cm</span>"+
        "</div>"+
        
        "<div class='div_medidas_c'>"+
        "<span>L:</span>"+
        "<input type='number' class='largo_pino' step='0.1' min='10' max='300' value='10'>"+
        "<span>cm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>C:</span>"+
        "<input type='number' class='cantidad_pino'  value='1' min='1'>"+
        "<span>cm</span>"+
        "</div>"+
    "</div>"+
    "</div>";

    lista_pedido.appendChild(li);
}

function agregarCedro() {
    let li= document.createElement("li");

    li.innerHTML= "<div onclick='simpleSumaCedro(this),totales()'>"+
    "<div class='foto_cedro_producto'></div>"+
    "<button onclick= 'eliminar(this)' class='eliminar'>X</button></p>"+
    "<div class='caja_3'>"+
    
        

    "<div class='titulo_total'>"+
        "<span>CEDRO</span>"+
        "<p>Total:$<span class='total_cedro'>111.11</span></p>"+
    "</div>"+

    
        
        "<div class='div_medidas_c'>"+
        "<span>G:</span>"+
        "<select  class='grosor_cedro'>"+
            "<option value='30'>30</option>"+
            "<option value='18'>18</option>"+
        "</select>"+
        "<span>mm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>A:</span>"+
        "<input type='number' class='ancho_cedro' step='0.1' min='10' max='90' value='10'>"+
        "<span>cm</span>"+
        "</div>"+
        
        "<div class='div_medidas_c'>"+
        "<span>L:</span>"+
        "<input type='number' class='largo_cedro' step='0.1' min='10' max='300' value='10'>"+
        "<span>cm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>C:</span>"+
        "<input type='number' class='cantidad_cedro'  value='1' min='1'>"+
        "<span>cm</span>"+
        "</div>"+
        "</div>"+
    "</div>";

    lista_pedido.appendChild(li);
}

function agregarNogal(){
    
    let li= document.createElement("li")

    li.innerHTML="<div onclick='simpleSumaNogal(this),totales()'>"+
    "<div class='foto_nogal_producto'></div>"+
    "<button onclick= 'eliminar(this)' class='eliminar'>X</button></p>"+
    "<div class='caja_3'>"+
    
        

    "<div class='titulo_total'>"+
        "<span>NOGAL</span>"+
        "<p>Total:$<span class='total_nogal'>56.01</span></p>"+
    "</div>"+

    
        
        "<div class='div_medidas_c'>"+
        "<span>G:</span>"+
        "<select  class='grosor_nogal'>"+
            "<option value='34'>34</option>"+
            "<option value='18'>18</option>"+
        "</select>"+
        "<span>mm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>A:</span>"+
        "<input type='number' class='ancho_nogal' step='0.1' min='10' max='122' value='10'>"+
        "<span>cm</span>"+
        "</div>"+
        
        "<div class='div_medidas_c'>"+
        "<span>L:</span>"+
        "<input type='number' class='largo_nogal' step='0.1' min='10' max='300' value='10'>"+
        "<span>cm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>C:</span>"+
        "<input type='number' class='cantidad_nogal'  value='1' min='1'>"+
        "<span>cm</span>"+
        "</div>"+
    "</div>"+
    "</div>";

    lista_pedido.appendChild(li);
}

function agregarHaya(){

    let li= document.createElement("li")

    li.innerHTML="<div onclick='simpleSumaHaya(this),totales()' >"+
    
    "<div class='foto_haya_producto'></div>"+
    "<button onclick= 'eliminar(this)' class='eliminar'>X</button></p>"+
    "<div class='caja_3'>"+
    
        

    "<div class='titulo_total'>"+
        "<span>HAYA</span>"+
        "<p>Total:$<span class='total_haya'>95.00</span></p>"+
    "</div>"+

    
        
        "<div class='div_medidas_c'>"+
        "<span>G:</span>"+
        "<select  class='grosor_haya'>"+
            "<option value='20'>20</option>"+
            "<option value='18'>18</option>"+
        "</select>"+
        "<span>mm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>A:</span>"+
        "<input type='number' class='ancho_haya' step='0.1' min='10' max='100' value='10'>"+
        "<span>cm</span>"+
        "</div>"+
        
        "<div class='div_medidas_c'>"+
        "<span>L:</span>"+
        "<input type='number' class='largo_haya' step='0.1' min='10' max='200' value='10'>"+
        "<span>cm</span>"+
        "</div>"+

        "<div class='div_medidas_c'>"+
        "<span>C:</span>"+
        "<input type='number' class='cantidad_haya'  value='1' min='1'>"+
        "<span>cm</span>"+
        "</div>"+
    "</div>";

    lista_pedido.appendChild(li);

}









/*FUNCIONES SUMA */ 
function simpleSumaPino(this_Pino){//devuelve el total de cada li de pino
    let precio18mm= 10000/36600;//precio en pesos
    let precio16mm= 7000/36600;//precio en pesos
    let total= 0;
    

    //declaracion de variables
    let totalPINO= this_Pino.children[3].children[0].children[1].children[0];
    
    let grosorPINO= this_Pino.children[3].children[1].children[1];

    let anchoPINO= this_Pino.children[3].children[2].children[1];

    let largoPINO= this_Pino.children[3].children[3].children[1];

    let cantidadPINO= this_Pino.children[3].children[4].children[1];

    console.log(totalPINO);
    console.log(grosorPINO);
    console.log(anchoPINO);
    console.log(largoPINO);
    console.log(cantidadPINO);
    console.log(grosorPINO.value);

    
    /*CALCULOS */
    console.log("CALCULOS");
    if (grosorPINO.value== "18") {// en caso de tener 18mm
        total= (parseFloat(anchoPINO.value))*(parseFloat(largoPINO.value))* precio18mm;
        total=  total.toFixed(2)
        
    } else if (grosorPINO.value=="16"){// en caso de tener 16mm
        total= (parseFloat(anchoPINO.value))*(parseFloat(largoPINO.value))* precio16mm;//precio por cada uno
        console.log(precio16mm);
        total= total.toFixed(2)// redondeamos

    }
    total= total * parseFloat(cantidadPINO.value)

    totalPINO.textContent= total.toFixed(2);
    
    

}

function simpleSumaCedro(this_Cedro) {
    let precio30mm= 30000/27000
    let precio18mm= 18000/27000

    let total= 0;

    console.log(precio30mm);

    let totalCedro= this_Cedro.children[3].children[0].children[1].children[0];
    
    let grosorCedro= this_Cedro.children[3].children[1].children[1];

    let anchoCedro= this_Cedro.children[3].children[2].children[1];

    let largoCedro= this_Cedro.children[3].children[3].children[1];

    let cantidadCedro= this_Cedro.children[3].children[4].children[1];

    console.log(totalCedro);
    console.log(grosorCedro);
    console.log(anchoCedro);
    console.log(largoCedro);
    console.log(cantidadCedro);
    
    /* calculos */

    console.log("CALCULOS");
    if (grosorCedro.value == "18") {//en caso de tener 18mm
        total= (parseFloat(anchoCedro.value))*(parseFloat(largoCedro.value))* precio18mm;
        total= total.toFixed(2)
    } else if (grosorCedro.value == "30") {// en caso de tener 30mm de grosor
        total= (parseFloat(anchoCedro.value))*(parseFloat(largoCedro.value))* precio30mm;
        total= total.toFixed(2);
    }

    total= total * parseFloat(cantidadCedro.value)//multiplicamos por la cantidad de pedidos

    totalCedro.textContent= total.toFixed(2);

}

function simpleSumaNogal(this_Nogal) {
    let precio34mm= 20500/36600
    let precio18mm= 11000/36600


    let totalNogal= this_Nogal.children[3].children[0].children[1].children[0];
    
    let grosorNogal= this_Nogal.children[3].children[1].children[1];

    let anchoNogal= this_Nogal.children[3].children[2].children[1];

    let largoNogal= this_Nogal.children[3].children[3].children[1];

    let cantidadNogal= this_Nogal.children[3].children[4].children[1];

    let total= 0;

    console.log(totalNogal);
    console.log(grosorNogal);
    console.log(anchoNogal);
    console.log(largoNogal);
    console.log(cantidadNogal);

    /* CALCULOS */

    if (grosorNogal.value == "34") {
        total= (parseFloat(anchoNogal.value))*(parseFloat(largoNogal.value))* precio34mm;
        total= total.toFixed(2)
    } else if (grosorNogal.value == "18") {
        total= (parseFloat(anchoNogal.value))*(parseFloat(largoNogal.value))* precio18mm;
        total= total.toFixed("")
    }

    total= total *  parseFloat(cantidadNogal.value)//multiplicamos por la cantidad de pedido

    totalNogal.textContent= total.toFixed(2);

}

function simpleSumaHaya(this_Haya) {
    let precio20mm= 19000/20000;
    let precio18mm= 15000/20000;


    let totalHaya= this_Haya.children[3].children[0].children[1].children[0];
    
    let grosorHaya= this_Haya.children[3].children[1].children[1];

    let anchoHaya= this_Haya.children[3].children[2].children[1];

    let largoHaya= this_Haya.children[3].children[3].children[1];

    let cantidadHaya= this_Haya.children[3].children[4].children[1];

    console.log(totalHaya);
    console.log(grosorHaya);
    console.log(anchoHaya);
    console.log(largoHaya);
    console.log(cantidadHaya);

    let total= 0;

    /* CALCULOS */
    if (grosorHaya.value=="20") {//en caso de tener 20mm
        total= (parseFloat(anchoHaya.value))*(parseFloat(largoHaya.value))* precio20mm;
        total= total.toFixed(2)
    } else if (grosorHaya.value== "18") {//en caso de tener 18mm
        total= (parseFloat(anchoHaya.value))*(parseFloat(largoHaya.value))* precio18mm;
    }
    
    total= total * (parseFloat(cantidadHaya.value))//multiplicamos por la cantidad de pedidos
    totalHaya.textContent= total.toFixed(2);
}

/* sumatorias*/
function sumatoriaPINO() {
    let totales_pino= document.getElementsByClassName("total_pino")
    
    /*totales individuales */
    let totales_pino_aux= 0;

    console.log(totales_pino);

    /* me falta hacer la sumatoria y mostrar todo */
    //pino
    for (let key = 0; key < totales_pino.length; key++) {//recorro el array de pino buscando los totales
        const element = totales_pino[key].textContent;//me devuelve el total en string

        totales_pino_aux+= parseFloat(element)      
    }

    return totales_pino_aux;
}

function sumatoriaCEDRO() {//devuelve la sumatoria de totales cedro
    let totales_cedro= document.getElementsByClassName("total_cedro")

    let totales_cedro_aux= 0;

    console.log(totales_cedro);
    
    //cedro
    for (let key = 0; key < totales_cedro.length; key++) {//recorro el array de pino buscando los totales
        const element = totales_cedro[key].textContent;//me devuelve el total en string
        
        totales_cedro_aux+= parseFloat(element)
    }

    return totales_cedro_aux
}

function sumatoriaNOGAL() {
    let totales_nogal= document.getElementsByClassName("total_nogal")

    let totales_nogal_aux= 0;

    console.log(totales_nogal);

    //nogal
    for (let key = 0; key < totales_nogal.length; key++) {
        const element = totales_nogal[key].textContent;//me devuelve el float
        
        totales_nogal_aux+= parseFloat(element);
    }

    return totales_nogal_aux
}

function sumatoriaHAYA() {
    let totales_haya= document.getElementsByClassName("total_haya")

    let totales_haya_aux= 0;

    console.log(totales_haya_aux)

    for (let key = 0; key < totales_haya.length; key++) {
        const element = totales_haya[key].textContent;//me devuelve el total en string
        
        totales_haya_aux+= parseFloat(element)
    }

    return totales_haya_aux
}

function totales() {
    //inicializo variables
    
    let pino_t= sumatoriaPINO();
    let cedro_t= sumatoriaCEDRO();
    let nogal_t= sumatoriaNOGAL();
    let haya_t= sumatoriaHAYA()

    /* selecciono totales */ 
    let span_pino= document.getElementById("total_pino")
    let span_cedro= document.getElementById("total_cedro")
    let span_nogal= document.getElementById("total_nogal")
    let span_haya= document.getElementById("total_haya")

    

    let total_maderas= document.getElementById("total_maderas")


    let total= pino_t + cedro_t + nogal_t + haya_t;

    console.log(total.toFixed(2));
    /*redondeo */
    
    
    /* asigno los totales */

    span_pino.textContent= pino_t.toFixed(2);
    span_cedro.textContent= cedro_t.toFixed(2);
    span_nogal.textContent= nogal_t.toFixed(2);
    span_haya.textContent= haya_t.toFixed(2);


    total_maderas.textContent= total.toFixed(2);

    localStorage.setItem("total", total.toFixed(2))
}

/* comprar */
function comprar() {
    let pino_t= sumatoriaPINO();
    let cedro_t= sumatoriaCEDRO();
    let nogal_t= sumatoriaNOGAL();
    let haya_t= sumatoriaHAYA()

    let total= pino_t + cedro_t + nogal_t + haya_t;

    if (total == 0) {
        alert("ERROR: tiene que agregar un elemento al carrito")
    } else {
        localStorage.setItem("total", total.toFixed(2))
        console.log(localStorage);
        location.href= "mapa_envio.html"
    }


    
}


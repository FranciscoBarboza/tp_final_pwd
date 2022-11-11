const comprado=[];

//base de datos

const baseDeDatos = 
[
    {
        nombre: "machimbre 1cm x 6cm x 1mt",
        id: 1,
        precio: 1800,
    },
    {
        nombre: "estacas",
        id: 2,
        precio:2100
    },
    {
        nombre: "tirante",
        id: 3,
        precio: 270
    },
    {
        nombre: "listones",
        id: 4,
        precio: 1700
    }
]
//declaro los doms
//carrito
const DOMcarrito = document.getElementById("comprado");
//boton p1
const DOMbotonP1= document.getElementById("producto1");
const DOMbotonP2= document.getElementById("producto2");
const DOMbotonP3= document.getElementById("producto3");
const DOMbotonP4= document.getElementById("producto4");


function agregarP1() {
    var li= document.createElement("li");
    li.innerHTML= "<button onclick= 'eliminar(this)'>X</button>"+
    "<div id='img' class='p1foto'></div>"+
    "<p>&nbsp;&nbsp;machimbre<br> 1cm x 6cm x 1mt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>"+
    "<div id='numerox'><input type='number'  value='1' class='numero1' max='100' min='0' maxlength='3' onchange='actualizarTotal()' onkeyup='actualizarTotal()'></div>";

    DOMcarrito.appendChild(li);
    
}


function agregarP2() {
    var li= document.createElement("li");
    li.innerHTML="<button onclick= 'eliminar(this)'>X</button>"+
    "<div id='img' class='p2foto'></div>"+
    "<p>&nbsp;&nbsp;Estacas<br>3\" x 3\" x 55cm&nbsp;<span>2100&nbsp;</span></p>"+
    "<div id='numerox'><input type='number'  value='1' class='numero2' max='100' min='0' maxlength='3' onchange='actualizarTotal()' onkeyup='actualizarTotal()'></div>";

    DOMcarrito.appendChild(li);
}

function agregarP3() {
    var li= document.createElement("li");
    li.innerHTML="<button onclick= 'eliminar(this)'>X</button>"+
    "<div id='img' class='p3foto'></div>"+
    "<p>&nbsp;&nbsp;Tirante de Pino<br>3\" x 6\" x 3,66mts<span>270</span></p>"+
    "<div id='numerox'><input type='number'  value='1' class='numero3' max='100' min='0' maxlength='3' onchange='actualizarTotal()' onkeyup='actualizarTotal()'></div>";

    DOMcarrito.appendChild(li);
}

function agregarP4() {
    var li= document.createElement("li");
    li.innerHTML= li.innerHTML="<button onclick= 'eliminar(this)'>X</button>"+
    "<div id='img' class='p4foto'></div>"+
    "<p>&nbsp;&nbsp;Listones de Pino<br>1\" x 3\" x 3mts<span>2100&nbsp;&nbsp;&nbsp;</span></p>"+
    "<div id='numerox'><input type='number'  value='1' class='numero4' max='100' min='0' maxlength='3' onchange='actualizarTotal()' onkeyup='actualizarTotal()'></div>";
    
    DOMcarrito.appendChild(li);
}


function eliminar(elemento) {
    elemento.parentNode.remove();
    actualizarTotal();
}

//agregar productos
DOMbotonP1.addEventListener("click", agregarP1);
DOMbotonP2.addEventListener("click",agregarP2);
DOMbotonP3.addEventListener("click", agregarP3);
DOMbotonP4.addEventListener("click", agregarP4);

//actualizo todos los productos
DOMbotonP1.addEventListener("click", actualizarTotal);
DOMbotonP2.addEventListener("click", actualizarTotal);
DOMbotonP3.addEventListener("click", actualizarTotal);
DOMbotonP4.addEventListener("click", actualizarTotal);



//actualizacion del total

const total= document.querySelector("#total span")
const cantP1= document.querySelector(".numero1")
const comprarB= document.getElementById("botoncompra");

function mensajeCompra() {
    let productos1= document.getElementsByClassName("numero1");
    let productos2= document.getElementsByClassName("numero2");
    let productos3= document.getElementsByClassName("numero3");
    let productos4= document.getElementsByClassName("numero4");


    let suma= productos1.length + productos2.length + productos3.length + productos4.length

    if (suma == 0) {
        alert("ERROR: no se agrego nada al carrito")

    } else {
        
        actualizarTotal()
        location.href= "mapa_envio.html"
    }   
}

comprarB.addEventListener("click", mensajeCompra)





function actualizarTotal() {
    console.log("aaaa")
    let aux= 0;
    let lista= document.getElementById("comprado");
    //productos
    let productos1= document.getElementsByClassName("numero1");
    let productos2= document.getElementsByClassName("numero2");
    let productos3= document.getElementsByClassName("numero3");
    let productos4= document.getElementsByClassName("numero4");
    //sumatorias
    let sumaP1= 0;
    let sumaP2= 0;
    let sumaP3= 0;
    let sumaP4= 0;
    let tes= 0;
    
    for (let i = 0; i < productos1.length; i++) {
        const element = productos1[i];
        
        console.log(element.value);

        sumaP1+= parseInt(element.value) * 1800;
    }
    

    for (let i = 0; i < productos2.length; i++) {
        const element = productos2[i];
        
        console.log(element.value);

        sumaP2+= parseInt(element.value) * 2100;
    }

    for (let i = 0; i < productos3.length; i++) {
        const element = productos3[i];

        sumaP3+= parseInt(element.value) * 270;
    }

    for (let i = 0; i < productos4.length; i++) {
        const element = productos4[i];

        sumaP4 += parseInt(element.value) * 2100;
   
    }
    tes=  sumaP1 + sumaP2 + sumaP3 + sumaP4;
   
    console.log(tes);

    total.textContent= tes;

    localStorage.setItem("total", tes)
    

    if (total.textContent == "$NaN") {
        total.textContent= "ERROR"
    }

}



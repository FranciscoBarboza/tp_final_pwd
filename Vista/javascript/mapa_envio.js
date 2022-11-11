const aserraderoPlottier= document.getElementById("aserradero_plottier")
const ferreteriaTitan= document.getElementById("ferreteria_titan")
const corralonIPC= document.getElementById("corralon_ipc")

ferreteriaTitan.classList.add("hidden")
corralonIPC.classList.add("hidden")



function seleccionarAserraderoPlottier() {
    const costoPedido= document.getElementById("costo_pedido")
const costoEnvio= document.getElementById("costo_envio")
const Total_span= document.getElementById("total")
let precioAnterior= localStorage.getItem("total")

    ferreteriaTitan.classList.remove("block")
    ferreteriaTitan.classList.add("hidden")

    corralonIPC.classList.remove("block")
    corralonIPC.classList.add("hidden")

    aserraderoPlottier.classList.remove("hidden")
    aserraderoPlottier.classList.add("block")

    costoEnvio.textContent= "600"

    total.textContent= parseFloat(precioAnterior) + 600
}


function seleccionarFerreteriaTitan(){
    const costoPedido= document.getElementById("costo_pedido")
    const costoEnvio= document.getElementById("costo_envio")
    const Total_span= document.getElementById("total")
    let precioAnterior= localStorage.getItem("total")

    aserraderoPlottier.classList.remove("block")
    aserraderoPlottier.classList.add("hidden")

    corralonIPC.classList.remove("block")
    corralonIPC.classList.add("hidden")

    ferreteriaTitan.classList.remove("hidden")
    ferreteriaTitan.classList.add("block")

    costoEnvio.textContent= "1000"

    total.textContent= parseFloat(precioAnterior)+ 1000;
}

function seleccionarCorralonIPC(){
    const costoPedido= document.getElementById("costo_pedido")
    const costoEnvio= document.getElementById("costo_envio")
    const Total_span= document.getElementById("total")
    let precioAnterior= localStorage.getItem("total")

    
    aserraderoPlottier.classList.remove("block")
    aserraderoPlottier.classList.add("hidden")

    ferreteriaTitan.classList.remove("block")
    ferreteriaTitan.classList.add("hidden")

    corralonIPC.classList.remove("hidden")
    corralonIPC.classList.add("block")

    costoEnvio.textContent= "850"

    total.textContent= parseFloat(precioAnterior)+ 850;
}


let precioAnteriorAux= parseFloat(localStorage.getItem("total"))
const divTotal= document.getElementById("div_encargar") 

/* crear html */ 

function cargar() {
    let total= precioAnteriorAux + 600;
    divTotal.innerHTML= "<span id='calculos'>Costo de pedido: $<span id='costo_pedido'>"+precioAnteriorAux+"</span><br> costo envio: $ <span id='costo_envio'>600</span></span><br>"+
    "<span id='span_total'>TOTAL: $ <span id='total'>"+total+"</span></span><br>"+
    "<input type='button' value='ENGARGAR' onclick='encargar()'>"
}

function encargar() {
    alert("Serian $"+ total.textContent +" con envio " + "\nEl pedido llegara en 3 dias")
}

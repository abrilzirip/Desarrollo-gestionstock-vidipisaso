function inicio() {
    document.getElementById("autocompletadoBuscarCliente").addEventListener("input", buscarCliente, false);
}


// implemento Json para recibir de base de datos
let keyword=[
    {id:0,marca:"Milka",nombre:"Alfajor Triple Milka Oreo 61g",precio:300,cantidad:200},
    {id:1,marca:"Milka",nombre:"Alfajor Milka Mousse Simple 42g",precio:300,cantidad:200},
    {id:2,marca:"Leys",nombre:"Papas fritas Lays clásica 379 g",precio:1500,cantidad:200},
    {id:3,marca:"Tatin",nombre:"Chupetin de coca",precio:150,cantidad:200},
    {id:4,marca:"Sugus",nombre:"Caramelos Sugus",precio:30,cantidad:200} 
];  

function buscarCliente() {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");
    const inputTexto = autocompletadoInput.value.toLowerCase();

    const listaCliente = document.getElementById("listaCliente");

    if (inputTexto.trim() === "") {
        listaCliente.classList.add("d-none");
    }
    else {
        //comienza a buscar luego de las 2 coincidencias
        if (inputTexto.length>2) {
            let templista=[];
            listaCliente.classList.remove("d-none");
            //const palabraFiltrada = keyword.filter(keyword => keyword.toLowerCase().includes(inputTexto));
            const AuxPalabraFiltrada = keyword.filter( keyword => templista.push(keyword.nombre));
            const palabraFiltrada = templista.filter(templista => templista.toLowerCase().includes(inputTexto));

            //console.log(templista);
            mostrarListadoCliente(palabraFiltrada);
        }

    }
}

function mostrarListadoCliente(palabraFiltrada) {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");

    const listaCliente = document.getElementById("listaCliente");

    const smsErrorResultado = document.getElementById('smsResultado');

    listaCliente.innerHTML = '';

    if (palabraFiltrada.length === 0) {
        smsErrorResultado.classList.remove("d-none")
    } else {
        smsErrorResultado.classList.add("d-none")

        palabraFiltrada.forEach(listado => {
            const li = document.createElement('li');
            li.textContent = listado;
            li.addEventListener('click', () => {
                autocompletadoInput.value = listado;
                listaCliente.innerHTML = '';
            });
            listaCliente.appendChild(li);
        });
    }
}


window.addEventListener("load", inicio, false);


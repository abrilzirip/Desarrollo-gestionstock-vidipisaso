function inicio() {
    setTimeout(() => {
        verificarstock();
    }, 100);
}

function verificarstock() {
    const URL = "../Controlador/SelectIndicador.php";

    fetch(URL)
        .then(response => {
            if (!response.ok) {
                throw new Error("Error en la solicitud. Código de estado: " + response.status);
            }
            return response.json();
        })
        .then(data => {
            const productosBajoStock = data.filter(indicador => indicador.CANTIDAD < indicador.NIVEL);

            if (productosBajoStock.length) {
                document.getElementById("divNoNotificacion").classList.add("d-none")
                productosBajoStock.forEach(producto => mostrarToast(producto));
                console.log(productosBajoStock);
            } else {
                document.getElementById("divNoNotificacion").classList.remove("d-none")
            }
        })
        .catch(error => {
            console.log(error);
        });
}

function mostrarToast(indicador) {
    let divnotificaciones = document.getElementById("divNotificaciones");
    let ul = document.createElement("ul");
    let li = document.createElement("li");
    ul.setAttribute("class", "list-unstyled listaNotificaciones");
    li.setAttribute("class", "rounded-3");
    li.innerHTML = "<h6><span class='text-danger'>Bajo stock</h6></span><span class='text-success'>El producto:&nbsp;</span>" + " " + "<span class='text-dark'>" + indicador.NOMBRE + "</span>" + " " + "<span class='text-danger'>" + "tiene" + " " + indicador.CANTIDAD + " " + "de cantidad</span>";
    ul.appendChild(li);
    divnotificaciones.appendChild(ul);


    let indicadorColor = document.getElementById('indicadorColor');
    if (indicadorColor.classList.contains("bg-success")) {
        indicadorColor.classList.remove("bg-success");
        indicadorColor.classList.add("bg-danger");
    }
}
window.addEventListener("load", inicio, false)
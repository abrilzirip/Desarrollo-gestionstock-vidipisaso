function inicio() {
    setTimeout(() => {
        verificarstock();
    }, 1000);
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
                productosBajoStock.forEach(producto => mostrarToast(producto));
                console.log(productosBajoStock);
            }
        })
        .catch(error => {
            console.log(error);
        });
}

function mostrarToast(indicador) {
    let notificaciones = document.getElementById("listaNotificaciones");
    let li = document.createElement("li");
    li.innerHTML = "<h6><span class='text-danger'>Bajo stock</h6></span><span class='text-success'>El producto: </span>" + " " + indicador.NOMBRE + " " + "tiene" + " " + indicador.CANTIDAD + " de cantidad";
    notificaciones.appendChild(li);

    let indicadorColor = document.getElementById('indicadorColor');
    if (indicadorColor.classList.contains("bg-success")) {
        indicadorColor.classList.remove("bg-success");
        indicadorColor.classList.add("bg-danger");
    }
}

window.addEventListener("load", inicio, false)
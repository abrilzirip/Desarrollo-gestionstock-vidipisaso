function inicio() {

    URL = "../Controlador/SelectInidicador.php";

    fetch(URL)
        .then(Response => {
            if (!Response.ok) {
                throw new Error("Error en la solicitud. Código de estado: " + Response.status);
            }
            return Response.json();
        })
        .then(data => {

        })
        .catch(error => {
            console.error(error);
        })
}

function mostrarToast(indicador) {
    // Asegúrate de que el indicador se pase como parámetro
    var myToast = new bootstrap.Toast(document.querySelector('.toast'));
    myToast.show();

    document.getElementById('tituloToast').innerText = "Bajo Stock";
    document.getElementById('mensajeToats').innerText = "El producto:" + " " + indicador.NOMBRE + " " + "tiene la cantidad en:" + " " + indicador.CANTIDAD;

    let indicadorColor = document.getElementById('indicadorColor');
    if (indicadorColor.classList.contains("bg-success")) {
        indicadorColor.classList.remove("bg-success");
        indicadorColor.classList.add("bg-danger");
    }
}

window.addEventListener("load", inicio, false);
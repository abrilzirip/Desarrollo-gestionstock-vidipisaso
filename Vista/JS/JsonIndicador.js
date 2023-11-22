function ocultarAlert() {
    setTimeout(function() {
        let mensajeExito = document.getElementById('smsExitoso');
        if (mensajeExito.classList.contains("ok")) {
            mensajeExito.classList.add("d-none");
        }
    }, 2000);

    // Espera 4000 milisegundos (4 segundos) antes de ejecutar la siguiente función setTimeout
    setTimeout(function() {
        let mensajeError = document.getElementById('smsError');
        if (mensajeError.classList.contains("problem")) {
            mensajeError.classList.add("d-none");
        }
    }, 4000);
}

window.addEventListener("load", ocultarAlert, false);
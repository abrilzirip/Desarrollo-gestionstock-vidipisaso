function inicio() {
    document.getElementById("formLogin").addEventListener("submit", formulario, false);
}

function formulario(evento) {
    evento.preventDefault();
    if (validacionForm()) {
        document.getElementById("formLogin").submit();
    }
}

function validacionForm() {

    //Validacion Nombre
    let nombreInput = document.getElementById("idUsuarioNombre");
    let nombreArray = nombreInput.value.split(/ +/);
    let nombre = nombreInput.value;

    let smsErrorNombre = document.getElementById("errorUsuarioNombre");
    let expresionRegularNombre = /^[a-zA-Z\s]+$/;

    nombreInput.classList.remove("is-invalid");
    nombreInput.classList.remove("is-valid");

    if (nombre.trim() === "") {
        nombreInput.classList.add("is-invalid");
        smsErrorNombre.innerHTML = "El campo Nombre se encuentra vacio";
        return false;
    }
    if (!expresionRegularNombre.test(nombre)) {
        nombreInput.classList.add("is-invalid");
        smsErrorNombre.innerHTML = "El campo Nombre solo acepta caracteres alfabeticos"
        return false;
    } else {
        nombreInput.classList.add("is-valid");
    }

    if (nombreArray.length > 2) {
        nombreInput.classList.add("is-invalid");
        smsErrorNombre.innerHTML = "El campo nombre solo acepta uno o dos palabras";
        return false;
    } else {
        nombreInput.classList.add("is-valid");
    }

    for (let palabra of nombreArray) {
        if (palabra.length < 2 || palabra.length > 16) {
            nombreInput.classList.add("is-invalid");
            smsErrorNombre.innerHTML = "El campo Nombre solo acepta como minimo 2 caracteres y como maximo 16 por palabra";
            return false;
        } else {
            nombreInput.classList.add("is-valid");
        }
    }
    //Validacion Nombre Fin

    //Validacion Contraseña

    let passwordInput = document.getElementById("idUsuarioPassword");
    let password = passwordInput.value;

    let smsErrorPassword = document.getElementById("errorUsuarioPassword");
    let expresionRegularPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    passwordInput.classList.remove("is-invalid");
    passwordInput.classList.remove("is-valid");

    if (password.trim() === "") {
        passwordInput.classList.add("is-invalid");
        smsErrorPassword.innerHTML = "El campo Contraseña se encuentra vacío";
        return false;
    }

    if (!expresionRegularPassword.test(password)) {
        passwordInput.classList.add("is-invalid");
        smsErrorPassword.innerHTML = "La contraseña debe contener al menos 8 caracteres, una letra minúscula, una letra mayúscula y un dígito";
        return false;
    } else {
        passwordInput.classList.add("is-valid");
    }
    // Validacion Contraseña Fin

    return true;
}

window.addEventListener("load", inicio, false);
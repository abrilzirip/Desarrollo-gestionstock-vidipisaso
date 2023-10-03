const login = document.getElementById("template-log-in");
const pantalla_principal_vendedor = document.getElementById("template-pantalla-principal-Vendedor").innerHTML;
const pantalla_principal_administrador = document.getElementById("template-pantalla-principal-administrador").innerHTML;
const fragment = document.createDocumentFragment();

const Hardusuario = "user";
const Hardpassword = "123"

const HardAdminUser="admin";
const HardAdminPass="123";
const tocar_boton = document.getElementById("idbotonlogIn");
let botoSalir = document.getElementById("salir");



tocar_boton.addEventListener("click", e => {
    const usuario = document.getElementById("idNombreDeUsuario").value;
    const password = document.getElementById("idpassword").value;

    if (usuario === Hardusuario && password === Hardpassword) {
        console.log(usuario + " " + password);

        document.getElementById("idContenedor").innerHTML = pantalla_principal_vendedor;
    
    }else if (usuario === HardAdminUser && password === HardAdminPass) {
        document.getElementById("idContenedor").innerHTML = pantalla_principal_administrador;
        
    } else {

        document.getElementById("idalerta").innerHTML = "<p>Error</p>";
    }

});

botoSalir.addEventListener("click", e => {
    
    document.getElementById("idContenedor").innerHTML = login;
});





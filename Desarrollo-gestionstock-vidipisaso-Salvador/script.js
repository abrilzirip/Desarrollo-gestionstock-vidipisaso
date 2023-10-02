import admin from './administrador.html';

const login = document.getElementById("template-log-in");
const pantalla_principal_vendedor = document.getElementById("template-pantalla-principal").innerHTML;
const pantalla_principal_administrador = document.getElementById("template-pantalla-principal-administrador").innerHTML;
// const pantalla_principal_administrador2 = document.getElementById("template-pantalla-principal-administrador2").innerHTML;
const fragment = document.createDocumentFragment();
const contenido_prod = document.getElementById("contenidoprod");

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
        document.addEventListener("DOMContentLoaded", function() {
            // Encuentra los elementos en el documento donde se mostrarán los templates
            // const contenido_prod = document.getElementById("contenidoprod");
            // const resultado2 = document.getElementById("resultado2");
            // const resultado3 = document.getElementById("resultado3");
        });

        if(contenido_prod){
            const producto = document.importNode(templateHTML.getElementById("template1template-pantalla-principal-administrador2").content, true);
            contenido_prod.appendChild(producto);
        }
        // document.getElementById("idContenedor").innerHTML = pantalla_principal_administrador2;
        
    } else  {

        document.getElementById("idalerta").innerHTML = "<p>Error</p>";
    }

});

botoSalir.addEventListener("click", e => {
    
    document.getElementById("idContenedor").innerHTML = login;
});





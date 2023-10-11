//idnombreProducto-input

const inputBuscarProducto=document.getElementById("idnombreProductoBuscar");
const clickSelection=document.getElementById("idresultado");

// Lista de productos (ejemplo)
// let productos = [
//      "Alfajor Triple Milka Oreo 61g",
//      "Alfajor Milka Mousse Simple 42g",
//      "Papas fritas Lays clásica 379 g", 
//      "Chupetin de coca",
//      "Caramelos Sugus"
// ];


let productosDos=[
    {id:0,marca:"Milka",nombre:"Alfajor Triple Milka Oreo 61g",precio:300,cantidad:200},
    {id:1,marca:"Milka",nombre:"Alfajor Milka Mousse Simple 42g",precio:300,cantidad:200},
    {id:2,marca:"Leys",nombre:"Papas fritas Lays clásica 379 g",precio:1500,cantidad:200},
    {id:3,marca:"Tatin",nombre:"Chupetin de coca",precio:150,cantidad:200},
    {id:4,marca:"Sugus",nombre:"Caramelos Sugus",precio:30,cantidad:200} 
];    



inputBuscarProducto.addEventListener("keydown",e=>{
    Buscar(); 
    let optiontemp= document.getElementById("idresultado")  
    optiontemp.style.display = 'block';


});
//idresultado

clickSelection.addEventListener("dblclick",e=>{
    let optiontemp= document.getElementById("idresultado")
    inputBuscarProducto.value=clickSelection.value;
    optiontemp.style.display = 'none';
});


function Buscar(){

    let consulta=document.getElementById("idnombreProductoBuscar").value;
    
    console.log(consulta);

    if (consulta.trim()==="") {
        return;
    }

    let resultado=[];

    let productoslista=[];
    let idtemp=0;

    productosDos.forEach(element => {
        productoslista.push(element.nombre);
        idtemp=element.id;
        console.log("acata"+idtemp);
        console.log(element.nombre);
    });

    for (let i = 0; i < productoslista.length; i++) {
       if (productoslista[i].toLowerCase().includes(consulta.toLowerCase())) {
            
            resultado.push(productoslista[i]);
       }
        
    }
    document.getElementById("idresultado").innerHTML="";

    if (resultado.length>0) {
        for (let i = 0; i < resultado.length; i++) {

            if ( resultado[i].startsWith(consulta)) {
                let option=document.createElement("option");
                option.textContent=resultado[i];
                document.getElementById("idresultado").appendChild(option);  
                idtemp=i;
            }
           
        }
    }

    //productoslista[idtemp].marca

    let tempmarca=document.getElementById("idmarcaproducto");
    let tempprecio=document.getElementById("idprecioproducto");
    let tempcantidad=document.getElementById("idcantidadproducto");
    console.log("sssss"+productosDos[idtemp].marca);
    tempmarca.innerText=productosDos[idtemp].marca;
    tempprecio.innerText=productosDos[idtemp].precio;

    tempcantidad.addEventListener("click",e=>{

        if (tempcantidad.value>=productosDos[idtemp].cantidad) {
            tempcantidad.value=productosDos[idtemp].cantidad;
        }

    });

    
}



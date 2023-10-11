//idnombreProducto-input

const inputBuscarProducto=document.getElementById("idnombreProducto-input");
const clickSelection=document.getElementById("idresultado");

// Lista de productos (ejemplo)
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




let idtemp=0;

function Buscar(){

    let consulta=document.getElementById("idnombreProducto-input").value;
    
    //console.log(consulta);

    if (consulta.trim()==="") {
        return;
    }

    let resultado=[];
    let productoslista=[];
    //let idtemp=0;

    productosDos.forEach(element => {
        productoslista.push(element.nombre);
        idtemp=element.id;
        //console.log("acata"+idtemp);
        //console.log(element.nombre);
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

    //cargar
    let tempmarca=document.getElementById("idmarcaproducto");
    let tempprecio=document.getElementById("idprecioproducto");
    let tempcantidad=document.getElementById("idcantidadproducto");

    tempmarca.innerText=productosDos[idtemp].marca;
    tempprecio.innerText=productosDos[idtemp].precio;

    tempcantidad.addEventListener("click",e=>{

        if (tempcantidad.value>=productosDos[idtemp].cantidad) {
            tempcantidad.value=productosDos[idtemp].cantidad;
        }

    });
}

//agregar fila a tabla

let TablaRef=document.getElementById("idfila");


let botonAgregarProductoTabla=document.getElementById("idagregarproducto");

let cantida="1";
let cantidaNum=1;
let SumadeProductos=0;

botonAgregarProductoTabla.addEventListener("click",e=>{


        document.getElementById(`idmarcafila${cantida}`).innerHTML=productosDos[idtemp].marca;
        document.getElementById(`idnombrefila${cantida}`).innerHTML=productosDos[idtemp].nombre;
        document.getElementById(`idpreciofila${cantida}`).innerHTML=productosDos[idtemp].precio;
        document.getElementById(`idcantidadfila${cantida}`).innerHTML=document.getElementById("idcantidadproducto").value;

        cantidaNum++;
        cantida=cantidaNum.toString();

        SumadeProductos=SumadeProductos+(productosDos[idtemp].precio*document.getElementById("idcantidadproducto").value)
        console.log("total"+SumadeProductos);

        document.getElementById("idsumadeproductos").innerHTML=SumadeProductos+"$";
        document.getElementById("idtotal").innerHTML=SumadeProductos+"$";

        // // Inserta una fila en la tabla, en el índice 0
        // var newRow = TablaRef.insertRow();

        // // Inserta una celda en la fila, en el índice 0
        // var newCell = newRow.insertCell();
    
        // // Añade un nodo de texto a la celda
        // // var newText = document.createTextNode(`
        // //                 <tr>
        // //                     <td scope="row">1</td>
        // //                     <td></td>
        // //                     <td></td>
        // //                     <td></td>
        // //                     <td></td>
        // //                     <td></td>
        // //                 </tr>`);
        // newCell.innerHTML="1";
        // newCell = newRow.insertCell();
        // newCell.innerHTML=productosDos[idtemp].marca;
        // newCell = newRow.insertCell();
        // newCell.innerHTML=document.getElementById("idnombreProducto-input").value;
        // newCell = newRow.insertCell();
        // newCell.innerHTML=productosDos[idtemp].precio;
        // newCell = newRow.insertCell();
        // newCell.innerHTML=document.getElementById("idcantidadproducto").value;
        // newCell = newRow.insertCell();

});


// let FilaEjemplo= `<td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td>
// `;
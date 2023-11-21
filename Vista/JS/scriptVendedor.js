function inicio() {
    document.getElementById("autocompletadoBuscarProducto").addEventListener("input", buscarProducto, false);
    document.getElementById("id_Agregar_producto_Tabla").addEventListener("click", agregarProductoTabla, false);
    document.getElementById("id_Eliminar_producto_Tabla_cancelar").addEventListener("click", eliminarProductosTabla, false);
    document.getElementById("listaProductos").addEventListener("click", seleccionarListaProducto, false);
    document.getElementById("idvenderboton").addEventListener("click", e=>{venderProductos(e)},false);
    document.getElementById("idabonacheck").addEventListener("click",InporteAbonado,false);
    document.getElementById("idbotonconfirmar").addEventListener("click",ModificarModalVender,false);

}
//json de para generar el resumen de toda la venta para enviar ala base
let jsonEnvio=[
        //{id:0,marca:"Milka",nombre:"Alfajor Triple Milka Oreo 61g",precio:300,cantidad:200},

    ];  







const posicionJson=0;
let cantidadDeFilas=1, subTotal=0,TotalApagar=0;
let ProductoSeleccionado;
localStorage.setItem("cantidadDeFilas", cantidadDeFilas);
localStorage.setItem("subTotal", subTotal);


function InporteAbonado(){
 
    let valorAbonado= document.getElementById("idabona").value;

    if (valorAbonado>=TotalApagar && jsonEnvio.length!=0) {
        console.log("abona con");
        document.getElementById("idbotonconfirmar").disabled = false;
    }else{
        document.getElementById("idbotonconfirmar").disabled = true;
    }
}

function ModificarModalVender(){
    document.getElementById("idcantidadprodmodal").innerHTML=jsonEnvio.length;
    document.getElementById("idtotalapagarmodal").innerHTML=(TotalApagar).toFixed(2)+" $";
    let valorAbonado= document.getElementById("idabona").value;

    let vueltoAmostrar=valorAbonado-TotalApagar;
    console.log(vueltoAmostrar);

    document.getElementById("idvueltomodal").innerHTML=(vueltoAmostrar).toFixed(2)+" $";
}

function buscarProducto() {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarProducto");
    const inputTexto = autocompletadoInput.value.toLowerCase();

    const listaCliente = document.getElementById("listaProductos");

    if (inputTexto.trim() === "") {
        listaCliente.classList.add("d-none");
    }
    else {
        //comienza a buscar luego de las 2 coincidencias
        if (inputTexto.length>3) {

            listaCliente.classList.remove("d-none");

            TraerProductosdeDDBB(inputTexto);
       
        }

    }
}

function mostrarListadoCliente(palabraFiltrada,objetoProductoSeleccionado) {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarProducto");

    const listaCliente = document.getElementById("listaProductos");

    const smsErrorResultado = document.getElementById('smsResultado');

    listaCliente.innerHTML = '';

    if (palabraFiltrada.length === 0) {
        smsErrorResultado.classList.remove("d-none")
    } else {
        smsErrorResultado.classList.add("d-none")

        //console.log("cantidad de obtejtos  "+objetoProductoSeleccionado.length);
            objetoProductoSeleccionado.forEach(obj=>{
                const li = document.createElement('li'); 
               // console.log("+-"+obj.NOMBRE);
                li.textContent = obj.NOMBRE+" "+obj.MARCA+" "+
                obj.PROD_PRECIO_VENTA+"$";
                

                if (obj.CANTIDAD==0) {
                    li.textContent=obj.NOMBRE+" Nos Quedamos sin Stock";
                    listaCliente.appendChild(li);
                    ProductoSeleccionado=obj;
                }else{
                    li.addEventListener('click', () => {
                    autocompletadoInput.value = obj.NOMBRE;
                    listaCliente.innerHTML = '';
                    ProductoSeleccionado=obj;
                    });
                    listaCliente.appendChild(li);              
                }


            
            

        });
    }
}

function seleccionarListaProducto(){
    //console.log("selcciono producto lista");
    const filaProductoPrecio=document.getElementById("idfilaPrecio");
   // const filaProductoCantidad=document.getElementById("idfilaCantidad");

    if (ProductoSeleccionado.CANTIDAD!=0) {
        filaProductoPrecio.innerHTML=ProductoSeleccionado.PROD_PRECIO_VENTA+" $";

    
        let cantidamax=ProductoSeleccionado.CANTIDAD;
        
        const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');
        
        filaProductoPrincipal.classList.remove("d-none")

        const filaCantidadinput = document.getElementById('idfilaCantidadinput');
        filaCantidadinput.setAttribute("max",cantidamax);
    }
}

function eliminarProductosTabla(){
    console.log("eliminos productos");
    document.getElementById("tablaProductos").innerHTML="";
    let filaProductoPrincipal=document.getElementById("idfilaProductoprincipal");
    filaProductoPrincipal.classList.add("d-none");
    document.getElementById("autocompletadoBuscarProducto").value="";
    document.getElementById("idRedondeo").innerHTML="0 $"
    document.getElementById("idtotal").innerHTML="0 $"
    document.getElementById("idtotalApagar").innerHTML="0 $"
    document.getElementById("idbotonconfirmar").disabled = true;
    document.getElementById("idabona").value=null;
    jsonEnvio=[];
    localStorage.setItem("subTotal",0);
    subTotal=0;
    TotalApagar=0;
    cantidadDeFilas=1
    localStorage.setItem("cantidadDeFilas",1);
}

function venderProductos(e) {
    e.preventDefault();
    console.log("vendio productos");

    document.getElementById("idinputdatosTxt").value=JSON.stringify(jsonEnvio);
    console.log("mando esto+"+document.getElementById("idinputdatosTxt").value);
    GuardarVenta();
}


function agregarProductoTabla(){
   
    
    
    if (document.getElementById("autocompletadoBuscarProducto").value.length>=3) {
    
        

            let tablaVenta= document.getElementById("tablaProductos");
            let marca=ProductoSeleccionado.MARCA;
            let nombre=ProductoSeleccionado.NOMBRE;
            let precio=ProductoSeleccionado.PROD_PRECIO_VENTA;
           // let cantida=keyword[posicionJson].cantidad;

            let filaCantidadInput=document.getElementById("idfilaCantidadinput").value;
           

            tablaVenta.insertRow(0).innerHTML =` <tr>
            <td class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md" scope="row">${cantidadDeFilas}</td>
            <td class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center" scope="col">${marca}</td>
            <td class="text-center" scope="col">${nombre}</td>
            <td class="col-1 ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center" scope="col">
            ${precio} $
            </td>
            <td class="col-1 ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center"
             scope="col">                                                        
            ${filaCantidadInput}
             </td>

            <td  class="col-1 ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center"scope="col">
            <button type="button" class="btn btn-danger btn-sm text-center"
                                 data-btn-grupo="eliminar-cliente"><i
                 class="bi bi-trash"></i></button>
            </td>
        </tr>`;    
        cantidadDeFilas++;
     

        let cantidaDeProductosInput=document.getElementById("idfilaCantidadinput").value;
        subTotal=subTotal+(precio*cantidaDeProductosInput);

        localStorage.setItem("subTotal", subTotal);        
                  
        localStorage.getItem("cantidadDeFilas", cantidadDeFilas);
  
        let AUXcantidaDeProductosInput=document.getElementById("idfilaCantidadinput").value;
        jsonEnvio.push({id:cantidadDeFilas,idproducto:ProductoSeleccionado.ID_PRODUCTO,
            marca:ProductoSeleccionado.MARCA,nombre:ProductoSeleccionado.NOMBRE,
            precio:ProductoSeleccionado.PROD_PRECIO_VENTA,cantidad:AUXcantidaDeProductosInput});
        //cantidadDeFilas++; conflicto      
        
        //console.log(jsonEnvio);
        
    }
    document.getElementById("autocompletadoBuscarProducto").value="";
    
    document.getElementById("idfilaCantidadinput").value=1;
    const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');
    filaProductoPrincipal.classList.add("d-none")

    document.getElementById("idtotal").innerHTML= (subTotal).toFixed(2)+" $";

    //idRedondeo idtotalApagar

    let valorResiduo=subTotal-Math.trunc(subTotal);

    RedondeValor=document.getElementById("idRedondeo").innerHTML=(valorResiduo).toFixed(2)+" $";
    
    //console.log(Math.trunc(subTotal));
    
        
    //idtotalApagar

    TotalApagar=Math.round(subTotal);
    RedondeValor=document.getElementById("idtotalApagar").innerHTML=TotalApagar+" $";

   
}

function GuardarVenta() {
    let formularioProductos=document.getElementById("idformularioProductos");
    fetch('../Controlador/RealizarVenta.php', {
        method: 'POST',
        body: new FormData(formularioProductos)
    })
  

    .then((data)=>{

        console.log(data);

        swal("Vendido","Gracias por elegirnos","success");
        document.getElementById("idvenderboton").disabled = true;
        setTimeout(function(){
            window.location.reload();
        },4000);
        //document.getElementById("idestadoDeVenta").innerHTML="Venta Exitosa"+data;

    });
}

function TraerProductosdeDDBB(inputTexto){
    let datasalida="",resultado="";
    fetch('../Controlador/MostrarProductos.php', {
        method: 'POST'
    })
   
    .then((res)=>res.json())

    .then((data)=>{
        //console.log(data);
        datasalida=JSON.parse(JSON.stringify(data));
       
        let templista=[];
        const AuxPalabraFiltrada = datasalida.filter( datasalida => templista.push(datasalida.NOMBRE)
                                                     , resultado=datasalida);
        //console.log(datasalida);
        const palabraFiltrada = templista.filter(templista => templista.toLowerCase().includes(inputTexto));
        
        //console.log("---"+resultado[0].PROD_PRECIO_VENTA);
        //ProductoSeleccionado=resultado[0];


        //console.log(datasalida);
        let pos=1,objetoArray=[];
        datasalida.forEach(element => {
           // console.log(element.NOMBRE);    
            if (palabraFiltrada.includes(element.NOMBRE)) {
                //ProductoSeleccionado=element;
                objetoArray.push(element);
                //console.log("++"+element.NOMBRE)
            
            }
            pos++;    
            
        });
        
        mostrarListadoCliente(palabraFiltrada,objetoArray); 

        
    });
    return resultado;
}

window.addEventListener("load", inicio, false);


    
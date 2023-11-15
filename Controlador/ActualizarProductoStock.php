<?php

require_once("./db.php");

//$cantidadProducto=$_POST["cantidaStock"];

if (isset($_POST["cantidaStock"])) {
    $cantidadProducto=$_POST["cantidaStock"];
    $jsonDatos =json_decode($cantidadProducto,false);
    
    echo "recibido".$jsonDatos;  

}



// if (isset($_POST["nombreProducto"]) && isset($_POST["pesoKilos"]) && $_POST["pesoPrecio"])   {

//     //escribo en la base

//     Escribir("INSERT INTO `Productos`(`nombre`, `kilos`, `precio`) VALUES ('$nombreProducto',$pesoKilos,$pesoPrecio)");
    
//     echo "guardo Producto con exito";

// }else{
//     echo "error en al grabar Producto";

// }


?>
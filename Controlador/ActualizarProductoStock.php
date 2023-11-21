<?php

require_once("./db.php");

//$cantidadProducto=$_POST["cantidaStock"];
$producto=19;
$cantidad=1;

if (isset($_POST["datostxtstock"])) {
    $cantidadProducto=$_POST["datostxtstock"];
    $jsonDatos =json_decode($cantidadProducto,false);
    
    echo "recibido".$jsonDatos; 
    $consultaUpdataStock="UPDATE `producto` SET `CANTIDAD`=CANTIDAD+:cantidad
                          WHERE `ID_PRODUCTO`=:producto"; 

    $consulta =$conn->prepare($consultaUpdataStock);
    $consulta->bindParam(':cantidad', $jsonDatos[0]->cantidad);
    $consulta->bindParam(':producto', $jsonDatos[0]->id);
    $consulta->execute();
    $conn->beginTransaction();
    $conn->commit();


}






// if (isset($_POST["nombreProducto"]) && isset($_POST["pesoKilos"]) && $_POST["pesoPrecio"])   {

//     //escribo en la base

//     Escribir("INSERT INTO `Productos`(`nombre`, `kilos`, `precio`) VALUES ('$nombreProducto',$pesoKilos,$pesoPrecio)");
    
//     echo "guardo Producto con exito";

// }else{
//     echo "error en al grabar Producto";

// }


?>
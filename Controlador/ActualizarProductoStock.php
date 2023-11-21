<?php

require_once("./db.php");

//$cantidadProducto=$_POST["cantidaStock"];
$producto=19;
$cantidad=1;
$stringdato1="";
$stringdato2="";

if (isset($_POST["datostxtstock"])) {
    $cantidadProducto=$_POST["datostxtstock"];
    $jsonDatos =json_decode($cantidadProducto,false);
    
    try {
        echo "recibido".$jsonDatos[0]->nombre; 
        $consultaUpdataStock="UPDATE `producto` SET `CANTIDAD`=CANTIDAD+:cantidad
                            WHERE `ID_PRODUCTO`=:producto"; 

        $consulta =$conn->prepare($consultaUpdataStock);
        $consulta->bindParam(':cantidad', $jsonDatos[0]->cantidad);
        $consulta->bindParam(':producto', $jsonDatos[0]->id);
        $consulta->execute();
        $conn->beginTransaction();
        $conn->commit();

        //actualizar
        //INSERT INTO `log`(`fecha`, `operacion`, `detalle`, `id_usuario`, `perfil`)
        // VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $FECHA_ALTA = date('Y-m-d H:i:s');
        $insertLog="INSERT INTO `log`(`fecha`, `operacion`, `detalle`, `id_usuario`, `perfil`) 
        VALUES (:FECHA_ALTA,:stringdato1, :stringdato2,1,2)"; 
        
        $consulta =$conn->prepare($insertLog);

        $stringdato1= "Actualizo";
        $stringdato2= $jsonDatos[0]->nombre." Agrego ".$jsonDatos[0]->cantidad;
        $consulta->bindParam(':FECHA_ALTA', $FECHA_ALTA);
        $consulta->bindParam(':stringdato1', $stringdato1);
        $consulta->bindParam(':stringdato2', $stringdato2);
        $consulta->execute();
        $conn->beginTransaction();
        $conn->commit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}else{
    echo"error en actualizacion";
}






// if (isset($_POST["nombreProducto"]) && isset($_POST["pesoKilos"]) && $_POST["pesoPrecio"])   {

//     //escribo en la base

//     Escribir("INSERT INTO `Productos`(`nombre`, `kilos`, `precio`) VALUES ('$nombreProducto',$pesoKilos,$pesoPrecio)");
    
//     echo "guardo Producto con exito";

// }else{
//     echo "error en al grabar Producto";

// }


?>
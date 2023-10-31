<?php

require_once("./db.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');
$FECHA_ALTA = date('Y-m-d H:i:s');

$consultaInsert = "INSERT INTO `venta`(`ID_USUARIO_REGISTRADO`, `FECHA`, `ID_CLIENTE`) 
VALUES (2,:FECHA_ALTA,1)";

$consultaInsertDos="INSERT INTO `detalle_venta`(`ID_VENTA`, `ID_PRODUCTO`, `precio`, `cantidad`, `TOTAL`) 
VALUES (:idUltimaVenta,1,150,1,150),(:idUltimaVenta,1,150,1,150)";

        try {
            $consulta = $conn->prepare($consultaInsert);
            $consulta->bindParam(':FECHA_ALTA', $FECHA_ALTA);
            // };
            
            //realiza primer insert
            $consulta->execute();
            $idUltimaVenta = $conn->lastInsertId();
            $conn->beginTransaction();
            $conn->commit();

            //realiza segundo insert 
            $consulta =$conn->prepare($consultaInsertDos);
            $consulta->bindParam(':idUltimaVenta', $idUltimaVenta);
            $consulta->execute();
            $conn->beginTransaction();
            $conn->commit();

            echo "<h6>Insercion exitosa</h6>";
            //header("Location: VendedorCrearCliente.php?exito=true");
            //exit; 

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }


//ultimo id de venta
echo  $idUltimaVenta;


// // if (isset($_POST["nombreProducto"])&& &&$_POST["nombreProducto"] !=""  &&
// //     strlen($_POST["nombreProducto"]) >= 10) {

//     // $nombreProducto=$_POST["nombreProducto"];
//     date_default_timezone_set('America/Argentina/Buenos_Aires');
//     $fecha_venta = date('Y-m-d H:i:s');
//     //$fecha_venta = 1;
//     echo $fecha_venta;
//     // //SELECT `id`, `descripcion` FROM `provincias` WHERE 1
//     // print_r( json_encode(Escribir('INSERT INTO `venta`( `ID_USUARIO_REGISTRADO`,
//     //  `ID_PRODUCTO`,`FECHA`, `HORA`, `DESCRIPCION`) VALUES ('1','$nombreProducto',
//     //  '$fecha_venta ','','n/a')')));


//    // $resultado= print_r(json_encode(Escribir('INSERT INTO `venta`(`ID_USUARIO_REGISTRADO`, 
//    //`FECHA`, `ID_CLIENTE`) VALUES (2,'.$fecha_venta.',1)')));

//     $resultado= print_r(json_encode(Escribir('INSERT INTO 
//     `venta`(`ID_USUARIO_REGISTRADO`, `FECHA`, `ID_CLIENTE`) 
//     VALUES (2,0 ,1)')));

//     echo "Realizo Venta".$resultado;
//     echo "<h6>Venta exitosa</h6>";

//     // }else{
//     // echo "Error al Realizar Venta";
//     // }
?>
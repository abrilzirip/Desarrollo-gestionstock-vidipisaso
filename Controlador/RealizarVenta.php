<?php

require_once("./db.php");


$producto=0;
$cantidad=0;
$precio=0;
$total=0;

$search = $_POST['datostxt'];

$jsonDatos =json_decode($search,false);

// //echo $search;
// echo "-----";
//echo  $jsonDatos[0]->marca;

//echo $auxjson->marca;

// $auxjson=$jsonDatos[0];
// foreach ($jsonDatos as $key => $value) {
//     # code...
//     foreach ($value as $key2 => $value2) {
//         # code...
//         echo $key2."-". $value2;
//     }
   

// }




//asi funciona
// $jsonDatos =json_decode($search,false);

// // //echo $search;
// // echo "-----";
// echo  $jsonDatos[0]->marca;
//[{"id":1,"marca":"DIA","nombre":"Arvejas Secas Remojadas 340 Gr","precio":250,"cantidad":"1"}]

if(!empty($search)){
    //escribo en la base
   
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $FECHA_ALTA = date('Y-m-d H:i:s');

    $consultaInsert = "INSERT INTO `venta`(`ID_USUARIO_REGISTRADO`, `FECHA`, `ID_CLIENTE`, `TOTAL`) 
    VALUES (2,:FECHA_ALTA,1,0)";

    $consultaInsertDos="INSERT INTO `detalle_venta`(`ID_VENTA`, `ID_PRODUCTO`, `precio`, `cantidad`, `TOTAL`) 
    VALUES (:idUltimaVenta,:producto,:precio,:cantidad,:total)";

    $consultaUpdataStock="UPDATE `producto` SET `CANTIDAD`=CANTIDAD-:cantidad
                          WHERE `ID_PRODUCTO`=:producto";



    try {
        $consulta = $conn->prepare($consultaInsert);
        $consulta->bindParam(':FECHA_ALTA', $FECHA_ALTA);
        // };
        
        //realiza primer insert
        $consulta->execute();
        $idUltimaVenta = $conn->lastInsertId();
        $conn->beginTransaction();
        $conn->commit();


        foreach ($jsonDatos as $key => $value) {
   
            foreach ($value as $key2 => $value2) {
                    //realiza segundo insert 

                    if ($key2=="cantidad") {
                     
                        $cantidad=$value2;
                    }
                  
                    if ($key2=="precio") {
                        $precio=$value2;
                    }
                    if ($key2=="idproducto") {
                        $producto=$value2;
                    }
                }       
                            $consulta =$conn->prepare($consultaInsertDos);
                            $consulta->bindParam(':idUltimaVenta', $idUltimaVenta);
                            $consulta->bindParam(':cantidad', $cantidad);
                            $consulta->bindParam(':producto', $producto);
                            $consulta->bindParam(':precio', $precio);
                            $total=$total+($precio*$cantidad);
                            $consulta->bindParam(':total', $total);
                            $consulta->execute();
                            $conn->beginTransaction();
                            $conn->commit();

                            $consulta =$conn->prepare($consultaUpdataStock);
                            $consulta->bindParam(':cantidad', $cantidad);
                            $consulta->bindParam(':producto', $producto);
                            $consulta->execute();
                            $conn->beginTransaction();
                            $conn->commit();
            
        }
        $consultaUpdataventa="UPDATE `venta` SET `TOTAL`=:total
        WHERE `ID_VENTA`=:idUltimaVenta";

        $consulta =$conn->prepare($consultaUpdataventa);
        $consulta->bindParam(':total', $total);
        $consulta->bindParam(':idUltimaVenta', $idUltimaVenta);
        $consulta->execute();
        $conn->beginTransaction();
        $conn->commit();

        echo "<h6>Insercion exitosa</h6>";
        //header("Location: VendedorCrearCliente.php?exito=true");
        //exit; 

        //actualiza log
        $stringdato1="";
        $stringdato2="";
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $FECHA_ALTA = date('Y-m-d H:i:s');
        $insertLog="INSERT INTO `log`(`fecha`, `operacion`, `detalle`, `id_usuario`, `perfil`) 
        VALUES (:FECHA_ALTA,:stringdato1, :stringdato2,1,2)"; 
        
        $consulta =$conn->prepare($insertLog);

        $stringdato1= "Venta";
        $stringdato2= "Realizo la Venta Nº ".$idUltimaVenta;
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
    echo "error en al grabar Producto";

}




//ultimo id de venta
//echo  $idUltimaVenta;


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
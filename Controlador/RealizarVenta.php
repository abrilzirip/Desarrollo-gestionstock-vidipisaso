<?php

require_once("./db.php");


if (isset($_POST["nombreProducto"])&& &&$_POST["nombreProducto"] !=""  &&
    strlen($_POST["nombreProducto"]) >= 10) {

    $nombreProducto=$_POST["nombreProducto"];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha_venta = date('Y-m-d H:i:s');

    //SELECT `id`, `descripcion` FROM `provincias` WHERE 1
    print_r( json_encode(Escribir('INSERT INTO `venta`( `ID_USUARIO_REGISTRADO`,
     `ID_PRODUCTO`,`FECHA`, `HORA`, `DESCRIPCION`) VALUES ('1','$nombreProducto',
     '$fecha_venta ','','n/a')')));

    echo "Realizo Venta";

    }else{
    echo "Error al Realizar Venta";
    }
?>
<?php
include '../Controlador/dbTwo.php';
// destruir la sesion
session_start();
session_unset();
session_destroy();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$FECHA_ALTA = date('Y-m-d H:i:s');
$insertLog="INSERT INTO `log`(`fecha`, `operacion`, `detalle`, `id_usuario`, `perfil`) 
VALUES (:FECHA_ALTA,:stringdato1, :stringdato2,1,2)"; 

$consulta =$conn->prepare($insertLog);

$stringdato1= "log-off";
$stringdato2="Cerro sesion el usuario";
$consulta->bindParam(':FECHA_ALTA', $FECHA_ALTA);
$consulta->bindParam(':stringdato1', $stringdato1);
$consulta->bindParam(':stringdato2', $stringdato2);
$consulta->execute();
$conn->beginTransaction();
$conn->commit();

// redirigir
header("Location:../Vista/index.php");
?>
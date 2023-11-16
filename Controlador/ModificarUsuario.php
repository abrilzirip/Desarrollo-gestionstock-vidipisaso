<?php

include("db.php");
$con = connection();

$id=$_POST["id"];
$nombre = $_POST['nombre'];
$password = $_POST['password'];
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaBaja = date('Y-m-d H:i:s');
$password = $_POST['password'];
$email = $_POST['email'];
UPDATE `usuario` SET `ID_PERFIL`='[value-3]',`NOMBRE`='[value-4]',`PASSWORD`='[value-5]',`F_BAJA`='[value-6]',`F_ALTA`='[value-7]',`MAIL`='[value-8]' 
$sql="UPDATE usuario SET NOMBRE='$name', PASSWORD='$password', F_BAJA='$fechaBaja', F_ALTA='$password', MAIL='$email' WHERE ID_PERFIL='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: AdministradorCrearUsuario.php");
}else{

}

?>
<?php include '../Controlador/dbTwo.php' ?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Id_Perfil'], $_POST['nombre'], $_POST['password'], $_POST['email'])) {

    $idturno = 1;
    $idperfil = $_POST['Id_Perfil'];
    $Nombre = $_POST['editaNombre'];
    $pass = $_POST['editaPassword'];
    $mail = $_POST['editaEmail'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $pFechaalta = date('Y-m-d H:i:s');
    $passEncriptada = password_hash($pass, PASSWORD_DEFAULT);

    if (!empty($Nombre) && !empty($pass) && !empty($mail)) {
        try {
            $consultaUpdate = $conn->prepare("UPDATE usuario SET `ID_TURNO`= :turno,`ID_PERFIL`= :Id_Perfil, `NOMBRE` = :Nombre,`PASSWORD` = :pass, `MAIL` = :email WHERE `ID_USUARIO_REGISTRADO` = :idUsuario");
            $consultaUpdate->bindParam(':turno',$idturno);
            $consultaUpdate->bindParam(':Id_Perfil',$idperfil);
            $consultaUpdate->bindParam(':Nombre', $Nombre);
            $consultaUpdate->bindParam(':pass', $passEncriptada);
            $consultaUpdate->bindParam(':mail', $mail);
            $consultaUpdate->bindParam(':idUsuario', $idUsuario);
            $consultaUpdate->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
}

?>
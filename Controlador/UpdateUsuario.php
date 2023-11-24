<?php include '../Controlador/dbTwo.php' ?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['Turnos']) && !empty($_POST['Perfiles'] && !empty($_POST['nombre']) && !empty($_POST['password']) && !empty($_POST['email']))) {

        $idUsuario = $_POST['idUsuario'];
        $idTurno = $_POST['Turnos'];
        $idPerfil = $_POST['Perfiles'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $email = $_POST['email'];


        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $pFechaalta = date('Y-m-d H:i:s');
        // $passEncriptada = password_hash($pass, PASSWORD_DEFAULT);

        if (!empty($Nombre) && !empty($pass) && !empty($mail)) {
            try {
                $consultaUpdate = $conn->prepare("UPDATE usuario SET  `NOMBRE` = :Nombre,`PASSWORD` = :pass, `MAIL` = :email WHERE `ID_USUARIO_REGISTRADO` = :idUsuario");
                // $consultaUpdate->bindParam(':turno', $idturno);
                // $consultaUpdate->bindParam(':Id_Perfil', $idperfil);
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
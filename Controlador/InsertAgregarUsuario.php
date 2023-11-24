<?php
include '../Controlador/dbTwo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['Turnos']) && !empty($_POST['Perfiles'] && !empty($_POST['nombre']) && !empty($_POST['password']) && !empty($_POST['email']))) {

        $idTurno = $_POST['Turnos'];
        $idPerfil = $_POST['Perfiles'];
        $nombre = $_POST['nombre'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $pFechaalta = date('Y-m-d H:i:s');
        $passEncriptada = password_hash($pass, PASSWORD_DEFAULT);

        $consultaInsert = "INSERT INTO `usuario`( `ID_TURNO`, `ID_PERFIL`, `NOMBRE`, `PASSWORD`,  `F_ALTA`, `MAIL`)
        VALUES (:Turnos,:Perfiles,:nombre,:pass,:fechaA,:email)";

        try {
            $consulta = $conn->prepare($consultaInsert);
            $consulta->bindParam(':Turnos', $idTurno);
            $consulta->bindParam(':Perfiles', $idPerfil);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':pass', $passEncriptada);
            $consulta->bindParam(':fechaA', $pFechaalta);
            $consulta->bindParam(':email', $email);
            $consulta->execute();
            // $conn->commit();

            header('Location: ' . htmlspecialchars($_SERVER["PHP_SELF"]) . "?success_ok=1", true, 303);
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Campos incompletos o vacíos.";
    }
}

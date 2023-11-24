<?php
include '../Controlador/dbTwo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si los campos necesarios están definidos en $_POST y no están vacíos
    if (
        isset($_POST['Id_Perfil'], $_POST['nombre'], $_POST['password'], $_POST['email']) &&
        !empty($_POST['Id_Perfil']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['password']) &&
        !empty($_POST['email'])
    ) {
        $idturno = 1;
        $idperfil = $_POST['Id_Perfil'];
        $Nombre = $_POST['nombre'];
        $pass = $_POST['password'];
        $mail = $_POST['email'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $pFechaalta = date('Y-m-d H:i:s');
        $passEncriptada = password_hash($pass, PASSWORD_DEFAULT);

        $consultaInsert = "INSERT INTO `usuario`(`ID_PERFIL`, `NOMBRE`, `PASSWORD`, `F_ALTA`, `MAIL`) 
            VALUES (:idperfil, :Nombre, :passEncriptada, :pFechaalta, :mail)";

        try {
            $consulta = $conn->prepare($consultaInsert);
            $consulta->bindParam(':idperfil', $idperfil);
            $consulta->bindParam(':Nombre', $Nombre);
            $consulta->bindParam(':passEncriptada', $passEncriptada);
            $consulta->bindParam(':pFechaalta', $pFechaalta);
            $consulta->bindParam(':mail', $mail);

            $consulta->execute();
            $conn->commit();

            header('Location: ' . htmlspecialchars($_SERVER["PHP_SELF"]) . "?success_ok=1", true, 303);
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Campos incompletos o vacíos.";
    }
}
?>

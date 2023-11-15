<?php

session_start();

include '../Controlador/dbTwo.php';


if (isset($_SESSION['usuario']) && isset($_SESSION['perfil'])) {

    if ($_SESSION['perfil'] == 1) {
        header('Location:../Vista/Administrador.php');
        die();
    } elseif ($_SESSION['perfil'] == 2) {
        header('Location:../Vista/VendedorVender.html');
        die();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if (isset($_POST["usuario"]) && isset($_POST['contraseña'])) {

        $consultaSelect = "SELECT `NOMBRE`, `PASSWORD`, `ID_PERFIL` FROM `usuario`  WHERE `NOMBRE`=:nombre";
        $consulta = $conn->prepare($consultaSelect);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();
        $usuarioDb = $consulta->fetch();

        if ($usuarioDb && $contraseña === $usuarioDb["PASSWORD"]) {
            // LOGIN OK
            $_SESSION['usuario'] = $nombre;
            $_SESSION['perfil'] = $usuarioDb["ID_PERFIL"];

            if ($_SESSION['perfil'] == 1) {
                header('Location:../Vista/Administrador.php', true, 302);
                die();
            } elseif ($_SESSION['perfil'] == 2) {
                header('Location:../Vista/VendedorVender.html', true, 302);
                die();
            }
            header('Location:../Vista/PaginaNoEncontrada.php', true, 302);
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert">Credenciales incorrectas. Por favor, inténtelo de nuevo.</div>';
        }
    } else {
        echo 'Error los datos se encuentran vacio';
    }
}

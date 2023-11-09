<?php

session_start();

include '../Controlador/dbTwo.php';

if (isset($_SESSION['usuario'])) {
    header('location:../Vista/VendedorListaCliente.php');
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if (isset($_POST["usuario"]) && isset($_POST['contraseña'])) {

        $consultaSelect = "SELECT  `NOMBRE`, `PASSWORD` FROM `usuario` WHERE `NOMBRE`=:nombre";
        $consulta = $conn->prepare($consultaSelect);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();
        $usuarioDb = $consulta->fetch();

        if ($usuarioDb && $contraseña === $usuarioDb["PASSWORD"]) {
            // LOGIN OK
            $_SESSION['usuario'] = $nombre;
            // $_SESSION['contraseña'] =$contraseña;
            header('Location:../Vista/VendedorVender.html');
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert">Credenciales incorrectas. Por favor, inténtelo de nuevo.</div>';
        }
    } else {
        echo 'Error los datos se encuentran vacio';
    }
}

<?php

session_start();

include '../Controlador/dbTwo.php';


if (isset($_SESSION['usuario']) && isset($_SESSION['perfil'])) {

    if ($_SESSION['perfil'] == 1) {
        header('Location:../Vista/Administrador.php');
        die();
    } elseif ($_SESSION['perfil'] == 2) {
        header('Location:../Vista/VendedorListaCliente.php');
        die();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if (isset($_POST["usuario"]) && isset($_POST['contraseña'])) {

        $consultaSelect = "SELECT `ID_USUARIO_REGISTRADO`, `NOMBRE`, `PASSWORD`, `ID_PERFIL` FROM `usuario`  WHERE `NOMBRE`=:nombre";
        $consulta = $conn->prepare($consultaSelect);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();
        $usuarioDb = $consulta->fetch();
        if ($usuarioDb && password_verify($contraseña, $usuarioDb['PASSWORD'])) {
            // LOGIN OK
            $_SESSION['usuario'] = $nombre;
            $_SESSION['perfil'] = $usuarioDb["ID_PERFIL"];
            $_SESSION["ID"]=$usuarioDb["ID_USUARIO_REGISTRADO"];

            if ($_SESSION['perfil'] == 1) {
                ActualizarLog(2,1,$conn); 
                header('Location:../Vista/Administrador.php', true, 302);
                die();
            } elseif ($_SESSION['perfil'] == 2) {
                ActualizarLog(1,2,$conn);
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

function ActualizarLog($a,$b,$conn){
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $FECHA_ALTA = date('Y-m-d H:i:s');
    $insertLog="INSERT INTO `log`(`fecha`, `operacion`, `detalle`, `id_usuario`, `perfil`) 
    VALUES (:FECHA_ALTA,:stringdato1, :stringdato2,:a,:b)"; 
    
    $consulta =$conn->prepare($insertLog);

    $stringdato1= "log-in";
    $stringdato2=" Inicio de sesion del usuario";
    $consulta->bindParam(':FECHA_ALTA', $FECHA_ALTA);
    $consulta->bindParam(':stringdato1', $stringdato1);
    $consulta->bindParam(':stringdato2', $stringdato2);
    $consulta->bindParam(':a', $a);
    $consulta->bindParam(':b', $b);
    $consulta->execute();
    $conn->beginTransaction();
    $conn->commit();
}

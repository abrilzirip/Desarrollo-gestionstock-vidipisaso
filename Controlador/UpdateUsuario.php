<?php include '../Controlador/dbTwo.php' ?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    if (!empty($_POST['IDUpdate']) && !empty($_POST['TurnosUpdate']) && !empty($_POST['PerfilesUpdate']) && !empty($_POST['NombreUpdate'])  && !empty($_POST['EmailUpdate'])) {

        $IDUpdate = $_POST['IDUpdate'];
        $TurnosUpdate = $_POST['TurnosUpdate'];
        $PerfilesUpdate = $_POST['PerfilesUpdate'];
        $NombreUpdate = $_POST['NombreUpdate'];
        $Contraseña = $_POST['ContraseñaUpdate'];
        $EmailUpdate = $_POST['EmailUpdate'];
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $pFechaalta = date('Y-m-d H:i:s');
        //$passEncriptada = password_hash($ContraseñaUpdate, PASSWORD_DEFAULT);

        try {
            $consultaUpdate = $conn->prepare("UPDATE `usuario` SET `ID_TURNO`=:Turnos,`ID_PERFIL`= :Perfil,`NOMBRE`= :Nombre,`PASSWORD`=:Contraseña,`F_ALTA`=:FechaAlta,`MAIL`=:Mail WHERE `ID_USUARIO_REGISTRADO` = :IDUsuario");
            $consultaUpdate->bindParam(':Turnos', $TurnosUpdate);
            $consultaUpdate->bindParam(':Perfil', $PerfilesUpdate);
            $consultaUpdate->bindParam(':Nombre', $NombreUpdate);
            $consultaUpdate->bindParam(':Contraseña', $Contraseña);
            $consultaUpdate->bindParam(':FechaAlta', $pFechaalta);
            $consultaUpdate->bindParam(':Mail', $EmailUpdate);
            $consultaUpdate->bindParam(':IDUsuario', $IDUpdate);
            $consultaUpdate->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "falla algo";
    }
}

?>

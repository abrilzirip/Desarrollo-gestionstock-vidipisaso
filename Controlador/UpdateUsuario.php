<?php include '../Controlador/dbTwo.php' ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tipoFormulario'])) {
        $tipoFormulario = $_POST['tipoFormulario'];
        if ($tipoFormulario == 'update') {
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
    
        } elseif ($tipoFormulario == 'carga') {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST['Turnos']) && !empty($_POST['Perfiles'] && !empty($_POST['nombre']) && !empty($_POST['password']) && !empty($_POST['email']))) {
            
                    $idTurno = $_POST['Turnos'];
                    $idPerfil = $_POST['Perfiles'];
                    $nombre = $_POST['nombre'];
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    date_default_timezone_set('America/Argentina/Buenos_Aires');
                    $pFechaalta = date('Y-m-d H:i:s');
                    //$passEncriptada = password_hash($pass, PASSWORD_DEFAULT);
            
                    $consultaInsert = "INSERT INTO `usuario`( `ID_TURNO`, `ID_PERFIL`, `NOMBRE`, `PASSWORD`,  `F_ALTA`, `MAIL`)
                    VALUES (:Turnos,:Perfiles,:nombre,:pass,:fechaA,:email)";
            
                    try {
                        $consulta = $conn->prepare($consultaInsert);
                        $consulta->bindParam(':Turnos', $idTurno);
                        $consulta->bindParam(':Perfiles', $idPerfil);
                        $consulta->bindParam(':nombre', $nombre);
                        $consulta->bindParam(':pass', $pass);
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
            
        }
    }
}

       
?>

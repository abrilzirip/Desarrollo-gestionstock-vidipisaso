<?php
include '../Controlador/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST['editaUsuarioId'];
    $nombre = $_POST['editaNombre'];
    $password = $_POST['editaPassword'];
    $email = $_POST['editaEmail'];
      // Encriptar la contraseña
    

    try {
        if (!empty($nombre) && !empty($password) && !empty($email)) {
           
        }
        $consultaUpdate = $conn->prepare("UPDATE usuario SET NOMBRE = :nombre, PASSWORD = :password, MAIL = :email WHERE ID_USUARIO_REGISTRADO = :idUsuario");
        $consultaUpdate->bindParam(':nombre', $nombre);
        $consultaUpdate->bindParam(':password', $password);
        $consultaUpdate->bindParam(':email', $email);
        $consultaUpdate->bindParam(':idUsuario', $idUsuario);
        $consultaUpdate->execute();

        // Obtener los datos actualizados para enviarlos como respuesta
        $datosActualizados = obtenerDatosUsuario($conn, $idUsuario);

        // Enviar respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($datosActualizados);
    } catch (PDOException $e) {
        // Enviar respuesta de error en formato JSON
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Error al actualizar los datos.'));
    }
}

// Función para obtener los datos actualizados del usuario
function obtenerDatosUsuario($conn, $idUsuario) {
    $consultaSelect = $conn->prepare("SELECT * FROM usuario WHERE ID_USUARIO_REGISTRADO = :idUsuario");
    $consultaSelect->bindParam(':idUsuario', $idUsuario);
    $consultaSelect->execute();
    return $consultaSelect->fetch(PDO::FETCH_ASSOC);
}
?>

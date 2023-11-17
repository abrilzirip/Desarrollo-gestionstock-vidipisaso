<?php
// tu_url_actualizacion.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario POST
    $idUsuario = $_POST['pk'];
    $campo = $_POST['name'];
    $nuevoValor = $_POST['value'];

    // Realizar la actualización en la base de datos
    try {
        // Configura la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "stvent";

        $conn = new PDO("mysql:host=$servername;dbname=" . $db . ";charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Actualizar el campo en la base de datos
        $consultaUpdate = "UPDATE `usuario` SET `$campo` = :nuevoValor WHERE `ID_USUARIO_REGISTRADO` = :idUsuario";
        $stmt = $conn->prepare($consultaUpdate);
        $stmt->bindParam(':nuevoValor', $nuevoValor);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();

        // Responder con éxito
        echo json_encode(['success' => true, 'message' => 'Actualización exitosa']);
    } catch (PDOException $e) {
        // Manejar errores de base de datos
        echo json_encode(['success' => false, 'message' => 'Error al actualizar: ' . $e->getMessage()]);
    }
} else {
    // Responder si la solicitud no es POST
    echo json_encode(['success' => false, 'message' => 'Solicitud no válida']);
}
?>
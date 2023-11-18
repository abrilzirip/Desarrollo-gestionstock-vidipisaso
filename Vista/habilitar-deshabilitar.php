<?php
include '../Controlador/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];

    if (isset($_POST['habilitar'])) {
        // Query para habilitar usuario (cambia el estado según la lógica de tu base de datos)
        $consultaUpdate = "UPDATE `usuario` SET `ESTADO` = 'Habilitado' WHERE `ID_USUARIO_REGISTRADO` = :id_usuario";
    } elseif (isset($_POST['deshabilitar'])) {
        // Query para deshabilitar usuario (cambia el estado según la lógica de tu base de datos)
        $consultaUpdate = "UPDATE `usuario` SET `ESTADO` = 'Deshabilitado' WHERE `ID_USUARIO_REGISTRADO` = :id_usuario";
    }

    try {
        $consulta = $conn->prepare($consultaUpdate);
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->execute();

        // Redirige de vuelta a la página principal
        header('Location: ' . htmlspecialchars($_SERVER["PHP_SELF"]), true, 303);
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>

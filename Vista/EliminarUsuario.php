<?php
include '../Controlador/dbTwo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = $_POST['idUsuario'];

    $stmt = $conn->prepare("DELETE FROM usuario WHERE ID_USUARIO_REGISTRADO = :idUsuario");
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

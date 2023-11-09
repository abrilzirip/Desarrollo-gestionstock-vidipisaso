<?php include '../Controlador/dbTwo.php' ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $limiteDeAviso = $_POST['limiteDeAviso'];
    $limiteDeDia = $_POST['limiteDeDia'];

    if (!empty($limiteDeAviso) && !empty($limiteDeDia)) {
        $insertConsulta = "INSERT INTO `notificaciones` (`limiteDeAviso`, `limiteDeDia`) VALUES (:limiteDeAviso, :limiteDeDia)";

        try {
            $consulta = $conn->prepare($insertConsulta);
            $consulta->bindParam(':limiteDeAviso', $limiteDeAviso);
            $consulta->bindParam(':limiteDeDia', $limiteDeDia);
            $consulta->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
    }
}
?>
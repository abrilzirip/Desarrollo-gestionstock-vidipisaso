<?php include 'conetDataBase.php' ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si la solicitud es de tipo POST

    $id = $_POST['frmEditarClienteID'];
    $nombre = $_POST['frmEditarClienteNombre'];
    $apellido = $_POST['frmEditarClienteApellido'];
    $apodo = $_POST['frmEditarClienteApodo'];

    if (!empty($id) && !empty($nombre) && !empty($apellido)) { // Comprueba si las variables no están vacías

        try {
            $consultaUpdate = "UPDATE `cliente` SET `NOMBRE`=:nombre, `APELLIDO`=:apellido, `APODO`=:apodo WHERE `ID_CLIENTE`=:id";

            $consulta = $conn->prepare($consultaUpdate);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellido', $apellido);
            $consulta->bindParam(':apodo', $apodo);
            $consulta->bindParam(':id', $id);

            $consulta->execute();
            $conn->beginTransaction();
            $conn->commit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
    }
}
?>


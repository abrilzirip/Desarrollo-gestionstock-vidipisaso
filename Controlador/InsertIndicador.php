<?php
include '../Controlador/dbTwo.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Acierto = [];
    $Error = [];
    $Verificador = false;

    $nivel = $_POST['limiteDeAviso'];
    $producto = $_POST['selectProducto'];
    $categoria = $_POST['selectCategoria'];
    $idUsuario = $_SESSION['ID'];

    if (!empty($nivel) && !empty($producto) && !empty($categoria) && !empty($idUsuario)) {

        // Consulta para verificar si el producto ya existe
        $checkProductoQuery = "
            SELECT 
                i.`ID_INDICADOR`, 
                i.`NIVEL`,
                p.ID_PRODUCTO, 
                p.`NOMBRE`, 
                p.`MARCA`, 
                p.`CANTIDAD`, 
                c.`NOMBRE` AS `NOMBRE_CATEGORIA` 
            FROM 
                `indicador` AS i 
            INNER JOIN 
                `producto` AS p ON i.`ID_PRODUCTO` = p.`ID_PRODUCTO` 
            INNER JOIN 
                `categoria` AS c ON i.`ID_CATEGORIA` = c.`ID_CATEGORIA`
            WHERE 
                i.`ID_USUARIO_REGISTRADO` = :IDUsuario 
                AND i.`ID_CATEGORIA` = :IDCategoria 
                AND i.`ID_PRODUCTO` = :IDProducto
        ";

        $checkProductoStatement = $conn->prepare($checkProductoQuery);
        $checkProductoStatement->bindParam(':IDUsuario', $idUsuario);
        $checkProductoStatement->bindParam(':IDCategoria', $categoria);
        $checkProductoStatement->bindParam(':IDProducto', $producto);
        $checkProductoStatement->execute();
        $productoExistente = $checkProductoStatement->fetch();

        if (!$productoExistente) {
            // El producto no existe, procede con la inserción
            $insertConsulta = "
                INSERT INTO `indicador`(`ID_USUARIO_REGISTRADO`, `ID_CATEGORIA`, `ID_PRODUCTO`, `NIVEL`) 
                VALUES (:IDUsuario,:IDCategoria,:IDProducto,:Nivel)
            ";
            try {
                $consulta = $conn->prepare($insertConsulta);
                $consulta->bindParam(':IDUsuario', $idUsuario);
                $consulta->bindParam(':IDCategoria', $categoria);
                $consulta->bindParam(':IDProducto', $producto);
                $consulta->bindParam(':Nivel', $nivel);
                $consulta->execute();
                $Acierto["exitoso"] = "Creacion exitosa.";
                $Verificador = true;
            } catch (PDOException $e) {
                echo "Error en la consulta de inserción: " . $e->getMessage();
            }
        } else {
            $Error["indicador"] = "El Indicador ya existe";
            $Verificador = true;
        }
    } else {
        echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
    }
}

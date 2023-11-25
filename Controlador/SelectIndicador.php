<?php include "dbTwo.php" ?>

<?php
$consultaSelect = "SELECT i.`NIVEL`,p.`NOMBRE`, p.`MARCA`, p.`CANTIDAD`, c.`NOMBRE` AS `NOMBRE_CATEGORIA`
FROM `indicador` AS i
INNER JOIN `producto` AS p ON i.`ID_PRODUCTO` = p.`ID_PRODUCTO`
INNER JOIN `categoria` AS c ON i.`ID_CATEGORIA` = c.`ID_CATEGORIA`;";
try {
    $consulta = $conn->query($consultaSelect);
    $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);  
    header('Content-Type: application/json');
    echo json_encode($registro);
} catch (Exception $e) {

    error_log("Error al realizar la consulta: " . $e->getMessage());
    echo "Error al realizar la consulta. Por favor, inténtelo de nuevo más tarde.";
}
?>


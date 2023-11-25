<?php require_once "dbTwo.php" ?>

<?php
class Indicador
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function SelectIndicadores()
    {
        $nroFila = 1;
        $consulta = "SELECT i.ID_INDICADOR,i.ID_USUARIO_REGISTRADO, i.`NIVEL`,p.ID_PRODUCTO, p.`NOMBRE`, p.`MARCA`, p.`CANTIDAD`,  c.ID_CATEGORIA, c.`NOMBRE` AS `NOMBRE_CATEGORIA`
        FROM `indicador` AS i
        INNER JOIN `producto` AS p ON i.`ID_PRODUCTO` = p.`ID_PRODUCTO`
        INNER JOIN `categoria` AS c ON i.`ID_CATEGORIA` = c.`ID_CATEGORIA`";
        $resultado = $this->conn->query($consulta);

        while ($registro = $resultado->fetch()) {
            echo "<tr>";
            echo "<td class='text-center'>" . $nroFila . "</td>";
            echo "<td class='text-center d-none'>" . $registro['ID_INDICADOR'] . "</td>";
            echo "<td class='text-center d-none'>" . $registro['ID_USUARIO_REGISTRADO'] . "</td>";
            echo "<td class='text-center'>" . $registro['NIVEL'] . "</td>";
            echo "<td class='text-center d-none'>" . $registro['ID_PRODUCTO'] . "</td>";
            echo "<td class='text-center'>" . $registro['NOMBRE'] . "</td>";
            echo "<td class='text-center ocultar-en-pantalla-xs ocultar-en-pantalla-sm'>" . $registro['MARCA'] . "</td>";
            echo "<td class='text-center ocultar-en-pantalla-xs ocultar-en-pantalla-sm'>" . $registro['CANTIDAD'] . "</td>";
            echo "<td class='text-center d-none'>" . $registro['ID_CATEGORIA'] . "</td>";
            echo "<td class='text-center ocultar-en-pantalla-xs ocultar-en-pantalla-sm'>" . $registro['NOMBRE_CATEGORIA'] . "</td>";
            echo "<td class='text-center'><div class='btn-group' role='group' aria-label='Grupo botones'><button class='btn btn-primary btn-sm' data-btn-grupo='modificar-indicador'><i class='bi bi-pencil'></i></div></td>";
            echo "</tr>";
            $nroFila++;
        }

        try {
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


?>


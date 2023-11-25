<?php
class InsertIndicador
{
    private $conn;
    private $nivel;
    private $categoria;
    private $producto;
    private $IDUsuario;

    public function __construct($conn, $nivel, $categoria, $producto, $IDUsuario)
    {
        $this->conn = $conn;
        $this->nivel = $nivel;
        $this->categoria = $categoria;
        $this->producto = $producto;
        $this->IDUsuario = $IDUsuario;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setProducto($producto)
    {
        $this->producto = $producto;
    }
    public function setIDUsuario($IDUsuario)
    {
        $this->IDUsuario = $IDUsuario;
    }

    public function insertIndicador()
    {
        require_once '../Controlador/dbTwo.php';

        /** @var \PDO $conn */

        $Acierto = [];
        $Error = [];
        $Verificador = false;

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

        $checkProductoStatement = $this->conn->prepare($checkProductoQuery);
        $checkProductoStatement->bindParam(':IDUsuario', $this->IDUsuario);
        $checkProductoStatement->bindParam(':IDCategoria', $this->categoria);
        $checkProductoStatement->bindParam(':IDProducto', $this->producto);
        $checkProductoStatement->execute();
        $productoExistente = $checkProductoStatement->fetch();

        if (!$productoExistente) {

            $insertConsulta = "INSERT INTO `indicador`(`ID_USUARIO_REGISTRADO`, `ID_CATEGORIA`, `ID_PRODUCTO`, `NIVEL`) 
                    VALUES (:IDUsuario,:IDCategoria,:IDProducto,:Nivel)";

            try {
                $consulta = $this->conn->prepare($insertConsulta);
                $consulta->bindParam(':IDUsuario', $this->IDUsuario);
                $consulta->bindParam(':IDCategoria', $this->categoria);
                $consulta->bindParam(':IDProducto', $this->producto);
                $consulta->bindParam(':Nivel', $this->nivel);
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
    }
}

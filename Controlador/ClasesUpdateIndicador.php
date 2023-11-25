<?php
class UpdateIndicador
{
    private $conn;
    private $nivel;
    private $categoria;
    private $producto;
    private $IDUsuario;
    private $IDIndicador;
    public function __construct($conn, $nivel, $categoria, $producto, $IDUsuario, $IDIndicador)
    {
        $this->conn = $conn;
        $this->nivel = $nivel;
        $this->categoria = $categoria;
        $this->producto = $producto;
        $this->IDUsuario = $IDUsuario;
        $this->IDIndicador = $IDIndicador;
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

    public function updateIndicador()
    {
        require_once '../Controlador/dbTwo.php';

        /** @var \PDO $conn */

        $consultaUpdate = "UPDATE `indicador` SET `NIVEL`=:nivel WHERE ID_INDICADOR=:IDIndicador and ID_USUARIO_REGISTRADO=:IDUsuario and ID_CATEGORIA=:IDCategoria and ID_PRODUCTO=:IDProducto";

        try {
            $consulta = $this->conn->prepare($consultaUpdate);
            $consulta->bindParam(":nivel", $this->nivel);
            $consulta->bindParam(":IDIndicador", $this->IDIndicador);
            $consulta->bindParam(":IDUsuario", $this->IDUsuario);
            $consulta->bindParam(":IDCategoria", $this->categoria);
            $consulta->bindParam(":IDProducto", $this->producto);
            $consulta->execute();
        } catch (PDOException $e) {
            echo "Error en la actualización: " . $e->getMessage();
        }
    }
}

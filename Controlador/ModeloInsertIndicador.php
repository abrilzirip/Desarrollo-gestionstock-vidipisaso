<?php require_once "dbTwo.php" ?>
<?php  include "ClasesInsertIndicador.php" ?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nivel = $_POST["limiteDeAviso"];
    $producto = $_POST["selectProducto"];
    $categoria = $_POST["selectCategoria"];
    $IDUsuario = $_SESSION["ID"];

    $Indicador = new InsertIndicador($conn, $nivel, $categoria, $producto, $IDUsuario);
    $Indicador->insertIndicador();
    header("Location:../Vista/AdministradorIndicador.php");
    exit();
}
?>
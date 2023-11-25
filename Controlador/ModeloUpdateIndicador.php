<?php require_once "dbTwo.php" ?>
<?php include "ClasesUpdateIndicador.php" ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $IDUsuario = $_SESSION["ID"];
    $IDIndicador = $_POST["IDIndicador"];
    $Nivel = $_POST["Nivel"];
    $Categoria = $_POST["IDCategoria"];
    $Producto = $_POST["IDProducto"];

    $update = new UpdateIndicador($conn, $Nivel, $Categoria, $Producto, $IDUsuario, $IDIndicador);
    $update->updateIndicador();
    header("Location:../Vista/AdministradorIndicador.php");
    exit();
}
?>
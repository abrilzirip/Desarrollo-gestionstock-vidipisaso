<?php include 'conetDataBase.php'; ?>

<?php
$keywordsCliente = [];
$consulta = $conn->query("SELECT `ID_CLIENTE`, `ID_USUARIO_REGISTRADO`, `NOMBRE`, `APELLIDO`, `APODO`, `FECHA_ALTA`, `FECHA_BAJA` FROM `cliente`");

if ($consulta->rowCount()) {
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

        $keywordsCliente[] = strval($row["ID_CLIENTE"]); //strval se utiliza para convertir un valor en una cadena (string). 
        $keywordsCliente[] = $row["NOMBRE"];
        $keywordsCliente[] = $row["APELLIDO"];
        $keywordsCliente[] = $row["FECHA_ALTA"];
    }
} else {
    echo "No se encontraron resultados en la base de datos.";
}
// Convierte el array en JSON
echo json_encode($keywordsCliente); //json_encode convierte el array en una representación JSON
?>
<?php $conn = null; ?>
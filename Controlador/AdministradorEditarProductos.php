<?php include '../Controlador/db.php';


// $subcategoria = $_POST['subcategoria'];
// date_default_timezone_set('America/Argentina/Buenos_Aires');
// $pFecha = date('Y-m-d H:i:s');
// $Nombre = $_POST['pNombre'];
// $Pmarca = $_POST['marca'];
// $Pcantidad = $_POST['cantidad'];
// $precioDeCompra = $_POST['precioCompra'];
// $precioDeVenta = $_POST['precioVenta'];
// $pPeso = $_POST['peso'];


$consultaUpdate = $conn->query
("UPDATE producto SET ID_SUBCATEGORIA ='$subcategoria',FECHA='$pFecha',NOMBRE='$Nombre', 
MARCA = $Pmarca, CANTIDAD = $Pcantidad, PROD_PRECIO_COMPRA = $precioDeCompra, PROD_PRECIO_VENTA = $precioDeVenta,
PESO_GRAMOS ='$pPeso' WHERE ID_PRODUCTO = '$ID_PRODUCTO'");


$consultaSubcategoria = $conn->query
("SELECT `ID_SUBCATEGORIA`, `ID_CATEGORIA`, `NOMBRE` FROM `subcategoria`");

?>
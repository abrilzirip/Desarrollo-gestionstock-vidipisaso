<?php include '../Controlador/dbTwo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = 2; //AGREGAR USUARIOS
    $subcategoria = $_POST['subcategoria'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $pFecha = date('Y-m-d H:i:s');
    $Nombre = $_POST['pNombre'];
    $Pmarca = $_POST['marca'];
    $precioDeCompra = $_POST['precioCompra'];
    $precioDeVenta = $_POST['precioVenta'];
    $ID_Producto = $_POST['id'];
    
if(!empty($subcategoria) && !empty($Nombre) && !empty($Pmarca) && !empty($pFecha) && !empty($precioDeCompra) && !empty($precioDeVenta)){
    try{
        $consultaUpdate = "UPDATE `producto` SET
        `ID_USUARIO_REGISTRADO`= :id_usuario,`ID_SUBCATEGORIA`= :subcategoria,`FECHA`= :fecha,
        `NOMBRE`= :pNombre,`MARCA`= :marca,`PROD_PRECIO_COMPRA`= :precioCompra,
        `PROD_PRECIO_VENTA`= :precioVenta WHERE `ID_PRODUCTO` = :id";

        $consulta = $conn->prepare($consultaUpdate);
        $consulta->bindParam(':id_usuario', $user);
        $consulta->bindParam(':subcategoria', $subcategoria);
        $consulta->bindParam(':fecha', $pFecha);
        $consulta->bindParam(':pNombre', $Nombre);
        $consulta->bindParam(':marca', $Pmarca);
        $consulta->bindParam(':precioCompra', $precioDeCompra);
        $consulta->bindParam(':precioVenta', $precioDeVenta);
        $consulta->bindParam(':id', $ID_Producto);
        $consulta->execute();
    }

    catch (PDOException $e) {
        echo "Error en la actualización: " . $e->getMessage();
    }

}

}

$conn = null;

?>
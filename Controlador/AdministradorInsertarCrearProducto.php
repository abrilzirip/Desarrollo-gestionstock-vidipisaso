<?php include '../Controlador/dbTwo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = 2;
    $subcategoria = $_POST['subcategoria'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $pFecha = date('Y-m-d H:i:s');
    $Nombre = $_POST['pNombre'];
    $Pmarca = $_POST['marca'];
    $Pcantidad = $_POST['cantidad'];
    $precioDeCompra = $_POST['precioCompra'];
    $precioDeVenta = $_POST['precioVenta'];
    $pPeso = $_POST['peso'];

    if (!empty($Nombre) && !empty($Pmarca) && !empty($Pcantidad) && !empty($pFecha) && !empty($precioDeCompra) && !empty($precioDeVenta)) {
        $consultaInsert =
            "INSERT INTO `producto` 
            (`ID_USUARIO_REGISTRADO`, `ID_SUBCATEGORIA`, `FECHA`, `NOMBRE`, `MARCA`, `CANTIDAD`, `PROD_PRECIO_COMPRA`, `PROD_PRECIO_VENTA`, `PESO_GRAMOS`) 
            VALUES 
            (:user, :subcategoria, :fecha, :Nombre, :marca, :cantidad, :precioCompra,:precioVenta, :peso)";

        try {
            $consulta = $conn->prepare($consultaInsert);
            $consulta->bindParam(':user', $user);
            $consulta->bindParam(':subcategoria', $subcategoria);
            $consulta->bindParam(':fecha', $pFecha);
            $consulta->bindParam(':Nombre', $Nombre);
            $consulta->bindParam(':marca', $Pmarca);
            $consulta->bindParam(':cantidad', $Pcantidad);
            $consulta->bindParam(':precioCompra', $precioDeCompra);
            $consulta->bindParam(':precioVenta', $precioDeVenta);
            $consulta->bindParam(':peso', $peso);
            $consulta->execute();
            $conn->beginTransaction();
            $conn->commit();
            echo "Inserccion exitosa";
            header('Location: ' . htmlspecialchars($_SERVER["PHP_SELF"]) . "?succes_ok=1", true, 303);
            exit;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
    }
}
?>
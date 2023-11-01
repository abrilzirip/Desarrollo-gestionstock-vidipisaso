<?php include 'controlador/db.php';

/*$sql = "SELECT producto.*, subcategoria.nombre AS nombre_subcategoria
        FROM producto
        INNER JOIN subcategoria ON producto.subcategoria_id = subcategoria.id";
        
        SELECT NOMBRE FROM producto
        UNION ALL
        SELECT NOMBRE FROM subcategoria
        

$sql = "select * from producto";
$results = $conn->query($sql);
*/
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="/Icon.ico">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"
        defer></script>
    <script src="" defer></script>
    <title>StVent-Productos</title>
</head>

<body>

    <!-- Navbar Admin. -->
    <nav class="navbar navbar-expand-lg  bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-5" href="#">StVent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="cista/Administrador.htmlollapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-warning mt-1 fs-6" aria-current="page"
                            href="Administrador.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="AdministradorCrearUsuario.php">Crear
                            Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="AdministradorCrearProducto.php">Crear
                            Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="#">Crear Indicador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="#">Crear Ajuste</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link text-warning dropdown-toggle mt-1 fs-6" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Generar Reporte
                        </a>
                        <ul class="dropdown-menu bg-black">
                            <li><a class="dropdown-item text-warning" href="#">Ventas</a></li>
                            <li><a class="dropdown-item text-warning" href="#">Vendedor</a></li>
                            <li><a class="dropdown-item text-warning" href="#">Recaudación</a></li>
                        </ul>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="#">Visualizar Logs</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item text-end">
                    <a class="nav-link" href="index.html"><button class="btn btn-danger py-1" id="salir">Cerrar
                            sesion</button></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Fin navbar -->

    <!-- Menu Productos -->
    <div class="card" id="cardProductos">
        <div class="card-header py-2">
            <h1 class="text-center mt-3">Productos</h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-dark" id="productosTabla">
                        <thead>
                            <th>#</th>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Peso</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            $nroFila = 1;
                            $consultaSelect = $conn->query
                            ("SELECT 
                                    `ID_PRODUCTO`,`FECHA`, `NOMBRE`, `MARCA`, `CANTIDAD`, `PROD_PRECIO_COMPRA`, `PROD_PRECIO_VENTA`, `DESCRIPCION` 
                                    FROM 
                                    `producto`");
                            while ($row = $consultaSelect->fetch()) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $nroFila . "</td>";
                                echo "<td class='text-center'>" . $row['ID_PRODUCTO'] . "</td>";
                                echo "<td class='text-center'>" . $row['FECHA'] . "</td>";
                                echo "<td class='text-center'>" . $row['NOMBRE'] . "</td>";
                                echo "<td class='text-center'>" . $row['MARCA'] . "</td>";
                                echo "<td class='text-center'>" . $row['CANTIDAD'] . "</td>";
                                echo "<td class='text-center'>" . $row['PROD_PRECIO_COMPRA'] . "</td>";
                                echo "<td class='text-center'>" . $row['PROD_PRECIO_VENTA'] . "</td>";
                                echo "<td class='text-center'>" . $row['DESCRIPCION'] . "</td>";
                                echo "<td class='text-center'><div class='btn-group' role='group' aria-label='Grupo botones'></button><button class='btn btn-primary btn-sm' data-btn-grupo='modificar-cliente'><i class='bi bi-pencil'></i></button><button type='button' class='btn btn-danger btn-sm' data-btn-grupo='eliminar-cliente'><i class='bi bi-trash'></i></button></div></td>";
                                echo "</tr>";
                                $nroFila++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="idbotones-pantalla-venta">
                    <div>
                        <button class="btn btn-danger py-1">Buscar</button>
                        <button class="btn btn-danger py-1" id="btnInsertar" data-bs-toggle="modal"
                            data-bs-target="#modalCarga">Agregar Producto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="modalCarga">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header bg-dark text-white">
                    <h4 class="modal-title">Nuevo producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    <!-- Form -->
                    <form method="post" action="/STvent/AdministradorCrearProducto.php" id="formProducto" required>

                        <label for="fecha">Fecha</label><br>
                        <input class="form-control" type="text" id="fecha" name="fecha"><br>

                        <label for="pNombre">Nombre</label><br>
                        <input class="form-control" type="text" id="pNombre" name="pNombre" required><br>

                        <label for="marca">Marca</label><br>
                        <input class="form-control" type="text" id="marca" name="marca" required><br>

                        <label for="cantidad">Cantidad</label><br>
                        <input class="form-control" type="text" id="cantidad" name="cantidad" required><br>

                        <label for="precioCompra">Precio de compra</label><br>
                        <input class="form-control" type="text" id="precioCompra" name="precioCompra" required><br>

                        <label for="precioVenta">Precio de venta</label><br>
                        <input class="form-control" type="text" id="precioVenta" name="precioVenta" required><br>

                        <!-- <label for="peso">Peso</label><br>
                        <input class="form-control" type="text" id="peso" name="peso" required>
                        <select id="unidadPeso">
                            <option value="kilo">Kg.</option>
                            <option value="gramo">gr.</option>
                            <option value="litro">lt.</option>
                        </select><br> -->

                        <label for="descripcion">Descripción</label><br>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" required><br>

                        <!-- Submit btn -->
                        <input type="submit" class="btn btn-success" value="Agregar" id="btnAgregarProducto">

                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-dark text-white">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Volver</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Pie de Indicadores -->
    <br>
    <div id="iddivindicadores" class="fixed-bottom p-3 mb-2 bg-dark text-white">Indicador
        <div class="btn-group btn-group-toggle">
            <label class="btn btn-light" id="idlabelventaverde">
            </label>
            <label class="btn btn-dark" id="idlabelventarojo">
            </label>
        </div>
    </div>
</body>
</html>


<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = 2;
        $subcategoria = 1;
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $pFecha = date('Y-m-d H:i:s');
        $Nombre = $_POST['pNombre'];
        $Pmarca = $_POST['marca'];
        $Pcantidad = $_POST['cantidad'];
        $precioDeCompra = $_POST['precioCompra'];
        $precioDeVenta = $_POST['precioVenta'];
        /*$pPeso = $_POST[''];*/
        $pDescripcion = $_POST['descripcion'];

        if (!empty($Nombre) && !empty($Pmarca) && !empty($Pcantidad) && !empty($pFecha) && !empty($precioDeCompra) && !empty($precioDeVenta)) 
        {
            $consultaInsert =
                "INSERT INTO `producto` 
                (`ID_USUARIO_REGISTRADO`, `ID_SUBCATEGORIA`, `FECHA`, `NOMBRE`, `MARCA`, `CANTIDAD`, `PROD_PRECIO_COMPRA`, `PROD_PRECIO_VENTA`, `DESCRIPCION`) 
                VALUES 
                (:user, :subcategoria, :fecha, :Nombre, :marca, :cantidad, :precioCompra,:precioVenta, :descripcion)";

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
                //$consulta->bindParam(':peso', $peso);
                $consulta->bindParam(':descripcion', $pDescripcion);

                $consulta->execute();
                $conn->beginTransaction();
                $conn->commit();
                echo "Inserccion exitosa";

                exit;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
        }
    }
?>
<?php $conn = null; ?>

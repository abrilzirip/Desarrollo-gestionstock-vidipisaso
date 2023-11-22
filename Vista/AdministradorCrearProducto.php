<?php 

include '../Controlador/dbTwo.php';

include '../Controlador/AdministradorUpdateProducto.php';

// session_start();
// if (!isset($_SESSION['usuario']) && !isset($_SESSION['perfil'])) {
//     header('Location:index.php');
//     die();
// }


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table-locale-all.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="icon" href="/Icon.ico">
    <script src="./js/scriptAdministradorCrearProducto.js"></script>
    <script src="./js/scriptAdministradorUpdateProducto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"
        defer></script>
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
                    <a class="nav-link" href="index.php"><button class="btn btn-danger py-1" id="salir">Cerrar
                            sesion</button></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Fin navbar -->

    <!-- Menu Productos -->
    <div class="container" id="cardProductos">
        <div class="card-header py-2">
            <h1 class="text-center mt-3">Productos</h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-dark" id="productosTabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subcategoria</th>
                                <th>Fecha</th>
                                <th>Descripcion</th>
                                <th>Marca</th>
                                <th>Cantidad</th>
                                <th>Precio de compra</th>
                                <th>Precio de venta</th>
                                <th>Peso</th>
                                <th>#</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $consultaSelect="SELECT `ID_PRODUCTO`, `ID_USUARIO_REGISTRADO`, `ID_SUBCATEGORIA`, `FECHA`, `NOMBRE`, `MARCA`, `CANTIDAD`, `PROD_PRECIO_COMPRA`, `PROD_PRECIO_VENTA`, `PESO_GRAMOS` FROM `producto`";
                            $consulta = $conn->query($consultaSelect);
                            while ($row = $consulta->fetch()) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $row['ID_PRODUCTO'] . "</td>";
                                echo "<td class='text-center'>" . $row['ID_SUBCATEGORIA'] . "</td>";
                                echo "<td class='text-center'>" . $row['FECHA'] . "</td>";
                                echo "<td class='text-center'>" . $row['NOMBRE'] . "</td>";
                                echo "<td class='text-center'>" . $row['MARCA'] . "</td>";
                                echo "<td class='text-center'>" . $row['CANTIDAD'] . "</td>";
                                echo "<td class='text-center'>" . $row['PROD_PRECIO_COMPRA'] . "</td>";
                                echo "<td class='text-center'>" . $row['PROD_PRECIO_VENTA'] . "</td>";
                                echo "<td class='text-center'>" . $row['PESO_GRAMOS'] . "</td>";  
                                echo "<td><button class='btn btn-primary btn-sm bi-pencil' data-bs-toggle='modal' data-bs-target='#modalEditarProducto' editar='tabla'></button></td>";
                                echo "<td><button class='btn btn-danger btn-sm bi-trash'></button></td>";
                                echo "</tr>";
                            }?>
                        </tbody>
                    </table>
                </div>
                <div id="idbotones-pantalla-venta">
                    <div>
                        <button class="btn btn-danger py-1">Buscar</button>
                        <button type="button" class="btn btn-danger py-1" id="btnInsertar">Agregar Producto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Update-->
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModal"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" id="formUpdate">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="mt-2">
                                    <input class="form-control" type="text" id="id" name="id" required>
                                </div>
                                <div class="mt-2">
                                    <label for="subcategoria">Subcategoria</label>
                                </div>
                                <div class="mt-2">
                                    <input class="form-control" type="text" id="subcategoria" name="subcategoria"
                                        required>
                                </div>
                                <div class="mt-2">
                                    <label class ="form-label" for="pNombre">Nombre</label>
                                    <input class="form-control" type="text" id="pNombre" name="pNombre" required>
                                </div>
                                <div class="mt-2">
                                    <label class ="form-label" for="marca">Marca</label>
                                    <input class="form-control" type="text" id="marca" name="marca" required>
                                </div>
                                <div class="mt-2">
                                    <label class ="form-label" for="precioCompra">Precio de compra</label>
                                    <input class="form-control" type="text" id="precioCompra" name="precioCompra"
                                        required>
                                </div>
                                <div class="mt-2">
                                    <label for="precioVenta">Precio de venta</label>
                                    <input class="form-control" type="text" id="precioVenta" name="precioVenta"
                                        required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" form='formUpdate' >Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Carga-->
    <div class="modal fade" id="modalCarga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Agregar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" id="formCarga" required>
                        <label for="subcategoria">Subcategoria</label>
                        <select class="form-select" id="subcategoria" name="subcategoria" size="1">
                            
                        </select><br>
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
                        <label for="mostrarPeso">Colocar Peso</label>
                        <input type="checkbox" id="mostrarPeso" />
                        <div id="campoPeso" class="d-none">
                            <label for="peso">Peso gr</label><br>
                            <input class="form-control" type="text" id="peso" name="peso">
                            </label><br>
                            <!-- Submit btn -->
                            <!-- <input type="submit" class="btn btn-success" value="Agregar" id="btnAgregarProducto"> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php $conn = null;?>
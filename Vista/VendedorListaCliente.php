<?php include 'conetDataBase.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/VendedorBuscador.css">
    <link rel="stylesheet" href="CSS/redimensionar-tabla.css">
    <link rel="icon" href="/Icon.ico">

    <!--icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="./JS/scriptBuscarCliente.js"></script>
    <script src="./JS/scriptFuncionalidadBotones.js"></script>
    <title>StVent-Iniciar Sesion</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg  bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-5" href="#">StVent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-warning mt-1 fs-6" aria-current="page" href="VendedorVender.html">Vender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="VendedorCrearCliente.php">Crear Cliente</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-warning mt-1 fs-6" href="VendedorProductoBuscarCargarStock.html">Producto</a>
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
    <section class="container mt-4 w-75">
        <!-- formulario nuevo usuario - inicio -->
        <div class="bg-black pt-3 pb-3 px-3 rounded-1" id="divOcultarMostrarBusqueda">
            <form class="d-block" role="search" id="divOcultarMostrarBusqueda">
                <div class="input-group">
                    <input class="form-control" type="search" id="autocompletadoBuscarCliente" placeholder="Escribe aquí..." aria-label="Search">
                    <button class="input-group-text btn btn-outline-danger" type="button"><i class="bi bi-search"></i></button>
                </div>
                <ul id="listaCliente" class="list-unstyled">
                </ul>
                <div id="smsResultado" class="d-none text-danger">No se encontraron resultados</div>
            </form>
            <div class="mx-auto mt-3" id="divOcultarMostrarBusqueda">
                <!-- <h6>Filtrar por (predeterminado: nombre):</h6> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioFiltro" id="flexRadioFiltrarPorNombre" checked>
                            <label class="form-check-label text-warning" for="flexRadioFiltrarPorNombre">Nombre</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioFiltro" id="flexRadioFiltrarPorApellido">
                            <label class="form-check-label text-warning" for="flexRadioFiltrarPorApellido">Apellido</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioFiltro" id="flexRadioFiltrarPorId">
                            <label class="form-check-label text-warning" for="flexRadioFiltrarPorId">ID</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioFiltro" id="flexRadioFiltrarPorEmail">
                            <label class="form-check-label text-warning" for="flexRadioFiltrarPorEmail">Email</label>
                        </div>
                    </div>
                </div>
            </div>
            <div id="divOcultarMostrarTablaClientes" class="mx-auto mt-3 mb-1 col-12">
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h5>Clientes</h5>
                    </div>
                    <div class="card-body">
                        <!-- tabla: tabla Cliente - inicio -->
                        <div class="table-responsive mx-auto">
                            <table id="tablaCliente" class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md" scope="col">#</th>
                                        <th class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center" scope="col">ID</th>
                                        <th class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center" scope="col">Nombre</th>
                                        <th class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center" scope="col">Apellido</th>
                                        <th class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center" scope="col">Apodo</th>
                                        <th class="ocultar-en-pantalla-xs ocultar-en-pantalla-sm text-center" scope="col">Email</th>
                                        <th class="text-center" scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nroFila=1;
                                    $consultaSelect = $conn->query("SELECT `id`, `nombre`, `apellido`, `apodo`, `email` FROM `usuario`");
                                    while ($row = $consultaSelect->fetch()) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>".$nroFila. "</td>";
                                        echo "<td class='text-center'>" . $row['id'] . "</td>";
                                        echo "<td class='text-center'>" . $row['nombre'] . "</td>";
                                        echo "<td class='text-center'>" . $row['apellido'] . "</td>";
                                        echo "<td class='text-center'>" . $row['apodo'] . "</td>";
                                        echo "<td class='text-center'>" . $row['email'] . "</td>";
                                        echo "<td class='text-center'><div class='btn-group' role='group' aria-label='Grupo botones'><button class='btn btn-success btn-sm' data-btn-grupo='mostrar-detalles-cliente'><i class='bi bi-eye'></i></button><button class='btn btn-primary btn-sm' data-btn-grupo='modificar-cliente'><i class='bi bi-pencil'></i></button><button type='button' class='btn btn-danger btn-sm' data-btn-grupo='eliminar-cliente'><i class='bi bi-trash'></i></button></div></td>";  
                                        echo "</tr>";
                                        $nroFila++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- tabla: tabla usuarios - fin -->
                        <!-- paginador - inicio -->
                        <nav aria-label="Ejemplo paginador">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link bg-dark text-light" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link bg-dark text-light" href="#">1</a></li>
                                <li class="page-item"><a class="page-link bg-dark text-light" href="#">2</a></li>
                                <li class="page-item"><a class="page-link bg-dark text-light" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link bg-dark text-light" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- paginador - fin -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- formulario: nuevo usuario - fin -->
    <section class="container mt-4 w-75 d-none" id="divMostrarOcultarDetallesCliente">
        <div class="row">
            <div class="bg-black pt-3 pb-3 px-3 rounded-1">
                <div id="divMostrarOcultarDetallesCliente" class="mx-auto my-1 col-12">
                    <form id="frmModificarCliente" action="VendedorListaCliente.php" method="POST">
                        <div class="card bg-dark text-light">
                            <div class="card-header text-light">
                                <h5 id="infoCliente"></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mx-auto mb-3 col-xs-12 col-sm-12 col-md-6 col-lg-4" id="divFrmClienteID">
                                        <label for="frmClienteID" class="form-label">ID</label>
                                        <input type="number" class="form-control" id="frmClienteID" name="frmClienteID" disabled />
                                        <div class="invalid-feedback" id="errorClienteID"></div>
                                    </div>
                                    <div class="mx-auto mb-3 col-xs-12 col-sm-12 col-md-6 col-lg-4" id="divFrmClienteNombre">
                                        <label for="frmClienteNombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="frmClienteNombre" name="frmClienteNombre" disabled />
                                        <div class="invalid-feedback" id="errorClienteNombre"></div>
                                    </div>
                                    <div class="mx-auto mb-3 col-xs-12 col-sm-12 col-md-6 col-lg-4" id="divFrmClienteApellido">
                                        <label for="frmClienteApellido" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" id="frmClienteApellido" name="frmClienteApellido" disabled />
                                        <div class="invalid-feedback" id="errorClienteApellido"></div>
                                    </div>
                                    <div class="mx-auto mb-3 col-xs-12 col-sm-12 col-md-6 col-lg-6" id="divFrmClienteApodo">
                                        <label for="frmClienteApodo" class="form-label">Apodo</label>
                                        <input type="text" class="form-control" id="frmClienteApodo" name="frmClienteApodo" disabled />
                                        <div class="invalid-feedback" id="errorClienteApodo"></div>
                                    </div>
                                    <div class="mx-auto mb-3 col-xs-12 col-sm-12 col-md-6 col-lg-6" id="divFrmClienteEmail">
                                        <label for="frmClienteEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="frmClienteEmail" name="frmClienteEmail" disabled />
                                        <div class="invalid-feedback" id="errorClienteEmail"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <button type="button" id="btnEditarFormulario" class="btn btn-primary"><i class="bi bi-pencil"></i>Editar</button>
                                    <button id="btnGuargarCambios" type="submit" class="btn btn-primary d-none"><i class="bi bi-save"></i> Guardar cambios</button>
                                    <button type="button" id="btnCancelarEdicioncliente" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="row">
            <div id="iddivindicadores" class="position-absolute bottom-0 end-0">
                <div class="btn-group btn-group-toggle">
                    <label class="btn btn-light" id="idlabelventaverde"></label>
                    <label class="btn btn-dark" id="idlabelventarojo"></label>
                </div>
            </div>
        </div>
    </footer>
    <!-- modal mensajes - inicio -->
    <div class="modal fade" id="modalMostrarMensajes" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="modalTitulo"></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" ria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <h6 id="modalTexto"></h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal mensajes - fin -->
</body>

</html>
<!--En correcion-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si la solicitud es de tipo POST

    $id = $_POST['frmClienteID'];
    $nombre = $_POST['frmClienteNombre'];
    $apellido = $_POST['frmClienteApellido'];
    $apodo = $_POST['frmClienteApodo'];
    $email = $_POST['frmClienteEmail'];

    if (!empty($id) && !empty($nombre) && !empty($apellido) && !empty($email)) { // Comprueba si las variables no están vacías

        try {
            $consultaUpdate = "UPDATE `usuario` SET `nombre`=:nombre, `apellido`=:apellido, `apodo`=:apodo, `email`=:email WHERE `id`=:id";
            
            $consulta = $conn->prepare($consultaUpdate);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellido', $apellido);
            $consulta->bindParam(':apodo', $apodo);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':id', $id);
            
            $consulta->execute();
            $conn->beginTransaction();
            $conn->commit();
            // echo "<h6>Actualización exitosa</h6>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
    }
}
?>
<?php $conn = null; ?>
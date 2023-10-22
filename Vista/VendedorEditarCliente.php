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
    <title>Editar Cliente</title>
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
                    <a class="nav-link" href="index.html"><button class="btn btn-danger py-1" id="salir">Cerrarsesion</button></a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="container mt-4 w-75" id="divMostrarOcultarDetallesCliente">
        <div class="row">
            <div class="bg-black py-3 px-3 rounded-1">
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
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <button type="button" id="btnEditarFormulario" class="btn btn-primary"><i class="bi bi-pencil"></i>Editar</button>
                                    <button id="btnGuargarCambios" type="submit" class="btn btn-primary d-none"><i class="bi bi-save"></i> Guardar cambios</button>
                                    <a href="VendedorListaCliente.php"><button type="button" id="btnCancelarEdicioncliente" class="btn btn-secondary w-100"><i class="bi bi-x-circle"></i> Cancelar</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-black text-center text-lg-start mt-4 d-flex">
        <div class="text-center p-3 text-warning">
            © 2020 Copyright:
            <a class="text-warning" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
    </footer>
</body>
</html>
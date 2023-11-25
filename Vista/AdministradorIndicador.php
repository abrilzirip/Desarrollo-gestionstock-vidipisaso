<?php
require_once '../Controlador/dbTwo.php';
require_once '../Controlador/SelectIndicadores.php';
include "../Controlador/ModeloInsertIndicador.php";
include "../Controlador/ModeloUpdateIndicador.php";


$selectI = new Indicador($conn);

if (!isset($_SESSION['usuario']) && !isset($_SESSION['perfil'])) {
    header('Location:index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Vista/CSS/mystyle.css">
    <link rel="stylesheet" href="./CSS/Indicador.css">
    <link rel="stylesheet" href="./CSS/redimensionar-tabla.css">

    <!--icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../Vista/JS/scriptIndicador.js"></script>
    <script src="../Vista/JS/JsonProductoIndicador.js"></script>
    <script src="../Vista/JS/JsonCategoriaIndicador.js"></script>
    <script src="../Vista/JS/botonIndicador.js"></script>
    <script src="../Vista/JS/JsonSelectIndicador.js"></script>
    <script src="../Vista/JS/scriptUpdate.js"></script>
    <title>Indicador</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-5" href="#">StVent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-warning mt-1 fs-6" aria-current="page" href="Administrador.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="AdministradorCrearUsuario.php">Crear Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="AdminsitradorCrearProducto.html">Crear Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="AdministradorIndicador.php">Crear Inidicador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="AdministradorAjuste.php">Crear Ajuste</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-warning dropdown-toggle mt-1 fs-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Generar Reporte</a>
                        <ul class="dropdown-menu bg-black">
                            <li><a class="dropdown-item text-warning" href="#">Ventas</a></li>
                            <li><a class="dropdown-item text-warning" href="#">Vendedor</a></li>
                            <li><a class="dropdown-item text-warning" href="#">Recaudación</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning mt-1 fs-6" href="#">Visualizar Logs</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav pe-2" id="divMainNotificaciones">
                <li class="nav-item text-end">
                    <button type="button" class="btn btn-primary position-relative btn-sm" id="botonIndicador">
                        <span><i class="bi bi-bell-fill"></i></span>
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle d-md-none d-lg-block" id="indicadorColor">
                            <span class="visually-hidden"></span>
                        </span>
                    </button>
                    <div class="bg-white rounded-3 d-none" id="divNotificaciones">
                        <div class="card">
                            <div class="card-header border-bottom border-1 border-secondary py-1 ps-1 bg-black text-light">
                                <h5 class="">Notificaciones</h5>
                            </div>
                            <div id="divNoNotificacion" class="d-none">
                                <h6 class="py-2 px-2">No tiene ninguna notificacion</h6>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item text-end">
                    <a class="nav-link" href="../Controlador/Logout.php"> <button class="btn btn-danger py-1" id="salir">Cerrar sesion</button></a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="container mt-4">
        <div class="row">
            <div class="col">
                <div class=" card bg-black table-responsive">
                    <div class="card-header">
                        <h5 class="text-light">Indicador</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center d-none">Indicador</th>
                                    <th scope="col" class="text-center d-none">ID Usuario</th>
                                    <th scope="col" class="text-center">Nivel</th>
                                    <th scope="col" class="text-center d-none">ID Producto</th>
                                    <th scope="col" class="text-center">Producto</th>
                                    <th scope="col" class="text-center ocultar-en-pantalla-xs ocultar-en-pantalla-sm ">Marca</th>
                                    <th scope="col" class="text-center ocultar-en-pantalla-xs ocultar-en-pantalla-sm ">Cantidad</th>
                                    <th scope="col" class="text-center d-none">ID Categoria</th>
                                    <th scope="col" class="text-center ocultar-en-pantalla-xs ocultar-en-pantalla-sm ">Categoria</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $selectI->SelectIndicadores(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <form action="../Controlador/ModeloInsertIndicador.php" method="post" id="configForm">
                    <div class="card">
                        <div class="card-header bg-black text-light">
                            <h6>Configurar Indicador</h6>
                        </div>
                        <div class="card-body bg-dark text-light">
                            <label for="limiteDeAviso" class="form-label">Limite de bajo stock:</label>
                            <input type="number" class="form-control" name="limiteDeAviso" id="limiteDeAviso">
                            <div class="invalid-feedback" id="errorIndicadorAviso"></div>

                            <select class="form-select mt-2" aria-label="Default select example" id="selectProducto" name="selectProducto">
                                <option selected disabled value="Productos">Productos</option>
                            </select>
                            <div class="invalid-feedback" id="errorIndicadorSelectProducto"></div>

                            <select class="form-select mt-2" aria-label="Default select example" id="selectCategoria" name="selectCategoria">
                                <option selected disabled value="Categorias">Categorias</option>
                            </select>
                            <div class="invalid-feedback" id="errorIndicadorSelectCategoria"></div>
                        </div>
                        <div class="card-footer bg-black">
                            <button type="submit" class="btn btn-primary">Guardar Configuracion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($Acierto['exitoso']) && $Verificador == true) {
            imprimirMensaje('smsExitoso', 'alert-success ok', 'enviado', $Acierto['exitoso']);
        }
        if (isset($Error['indicador']) && $Verificador == true) {
            imprimirMensaje('smsError', 'alert-danger problem', 'error', $Error['indicador']);
        }

        function imprimirMensaje($id, $clases, $claseSpan, $mensaje)
        {
            echo '<div id="' . $id . '" class="alert ' . $clases . ' mt-2" role="alert">';
            echo '<span class="' . $claseSpan . '">' . $mensaje . '</span>';
            echo '</div>';
        }
        ?>
        <!-- Modal Update Indicador -->
        <div class="modal fade" id="modalUpdateIndicador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary bg-gradient text-light">
                        <h1 class="modal-title fs-5" id="tituloModal"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-dark bg-gradient text-light">
                        <form action="../Controlador/ModeloUpdateIndicador.php" method="post" id="formIndicadorUpdate">
                            <label for="IDIndicador" class="form-label mt-2 d-none">ID Indicador:</label>
                            <input type="text" class="form-control  d-none" id="IDIndicador" name="IDIndicador" readonly>

                            <label for="IDUsuario" class="form-label mt-2  d-none">ID Usuario:</label>
                            <input type="text" class="form-control  d-none" id="IDUsuario" name="IDUsuario" readonly>

                            <label for="Nivel" class="form-label mt-2">Nivel:</label>
                            <input type="text" class="form-control" id="Nivel" name="Nivel">
                            <div class="invalid-feedback" id="errorEditarNivel"></div>

                            <label for="IDProducto" class="form-label mt-2  d-none">ID Producto:</label>
                            <input type="text" class="form-control  d-none" id="IDProducto" name="IDProducto" readonly>

                            <label for="Producto" class="form-label mt-2  d-none">Producto:</label>
                            <input type="text" class="form-control  d-none" id="Producto" name="Producto" readonly>

                            <label for="Marca" class="form-label mt-2  d-none">Marca:</label>
                            <input type="text" class="form-control  d-none" id="Marca" name="Marca" readonly>

                            <label for="Cantidad" class="form-label mt-2  d-none">Cantidad:</label>
                            <input type="text" class="form-control  d-none" id="Cantidad" name="Cantidad" readonly>

                            <label for="IDCategoria" class="form-label mt-2  d-none">ID Categoria:</label>
                            <input type="text" class="form-control  d-none" id="IDCategoria" name="IDCategoria" readonly>

                            <label for="Categoria" class="form-label mt-2 d-none">Categoria:</label>
                            <input type="text" class="form-control  d-none" id="Categoria" name="Categoria" readonly>
                        </form>
                    </div>
                    <div class="modal-footer bg-black text-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" form="formIndicadorUpdate">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-black text-center text-white mt-4">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-facebook"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-twitter-x"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-linkedin"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white">StVent</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
<?php

session_start();

include '../Controlador/dbTwo.php';

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

    <!--icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../Vista/JS/JsonIndicador.js"></script>
    <script src="../Vista/JS/JsonProductoIndicador.js"></script>
    <script src="../Vista/JS/JsonCategoriaIndicador.js"></script>
    <script src="./JS/botonIndicador.js"></script>
    <script src="./JS/JsonSelectIndicador.js"></script>
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
            <a class="nav-link text-warning mt-1 fs-6" href="AdministradorCrearProducto.php">Crear Producto</a>
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
              <li><a class="dropdown-item text-warning" href="AdministradorVentas.php">Ventas</a></li>
              <li><a class="dropdown-item text-warning" href="AdministradorVendedor.php">Vendedor</a></li>
              <li><a class="dropdown-item text-warning" href="AdministradorRecaudacion.php">Recaudación</a></li>
            </ul>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning mt-1 fs-6" href="AdministradorLogs.php">Visualizar Logs</a>
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
    <section class="container mt-4 w-75">
        <div class="row">
            <div class="col">
                <form action="" method="post" id="configForm">
                    <div class="card">
                        <div class="card-header bg-black text-light">
                            <h6>Configurar Indicador</h6>
                        </div>
                        <div class="card-body bg-dark text-light">
                            <label for="limiteDeAviso" class="form-label">Limite de bajo stock:</label>
                            <input type="number" class="form-control" name="limiteDeAviso" id="limiteDeAviso">
                            <div class="invalid-feedback" id="errorIndicadorAviso"></div>

                            <select class="form-select mt-2" aria-label="Default select example" id="selectProducto" name="selectProducto">
                                <option selected disabled>Productos</option>
                            </select>
                            <select class="form-select mt-2" aria-label="Default select example" id="selectCategoria" name="selectCategoria">
                                <option selected disabled>Categorias</option>
                            </select>
                        </div>
                        <div class="card-footer bg-black">
                            <button type="submit" class="btn btn-primary">Guardar Configuracion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="alert alert-success d-none mt-2" role="alert" id="errorIndicadorValid">

        </div>
        <div class="alert alert-danger d-none mt-2" role="alert" id="errorIndicadorInvalid">

        </div>
    </section>
</body>

</html>

<?php $conn = null; ?>
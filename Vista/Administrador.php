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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="CSS/mystyle.css" />
  <link rel="stylesheet" href="./CSS/AdministradorReporte.css">
  <link rel="stylesheet" href="./CSS/Indicador.css">
  <link rel="icon" href="/Icon.ico" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <script src="JS/scriptAdministrador.js" defer></script>
  <script src="./JS/botonIndicador.js"></script>
    <script src="./JS/JsonSelectIndicador.js"></script>
  <title>StVent-Iniciar Sesion</title>
</head>

<body>
  <!-- implementar template administrador -->

  <div>
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
        <ul class="navbar-nav pe-2">
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
  </div>
  <div>
    <h1 class="text-center mt-3">Bienvenido - Reportes</h1>
    <div class="container estadisticas text-center mt-5">
      <div class="row">
        <h2>Productos más Vendidos en el mes</h2>
        <div class="row">
          <div class="col-md-6 mx-auto">
            <canvas id="graficoProductosMasVendidos"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="container estadisticas text-center mt-5">
      <div class="row mt-3">
        <h2>Vendedores Destacados</h2>
        <div class="row">
          <div class="col-md-6  mx-auto">
            <canvas id="graficoVendedoresMasVendieron"></canvas>
          </div>
        </div>
      </div>
    </div>
    <br>
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
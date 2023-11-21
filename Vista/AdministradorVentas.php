<?php include("../Controlador/db.php"); ?>

<?php 
session_start();
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

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="CSS/mystyle.css" />
    <link rel="stylesheet" href="./CSS/AdministradorReporte.css">
    <link rel="icon" href="/Icon.ico" />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
      defer
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

    <script src="JS/scriptAdministrador.js" defer></script>
    <title>StVent-Administrador</title>
  </head>

  <body>
    <!-- implementar template administrador -->

        <!-- Navbar Admin. -->
        <div>
    <nav class="navbar navbar-expand-lg bg-black">
      <div class="container-fluid">
        <a class="navbar-brand text-light fs-5" href="#">StVent</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="cista/Administrador.htmlollapse navbar-collapse" id="navbarNav">
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
              <a class="nav-link text-warning mt-1 fs-6" href="#">Visualizar Logs</a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item text-end">
            <a class="nav-link" href="../Controlador/Logout.php"><button class="btn btn-danger py-1" id="salir">Cerrar sesion</button></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
    <!-- Fin navbar -->
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


    







    <!-- Pie de Indicadores -->
    <br>
        <div id="iddivindicadores" class="fixed-bottom p-3 mb-2 bg-dark text-white">Indicador
            <div class="btn-group btn-group-toggle" >
                <label class="btn btn-light" id="idlabelventaverde">
                    
                </label>
                <label class="btn btn-dark" id="idlabelventarojo">
                    
                </label>
            </div>
        </div>
  </body>
</html>
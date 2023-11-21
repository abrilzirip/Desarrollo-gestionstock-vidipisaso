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

    
    <title>StVent-Administrador</title>
  </head>

  <body>
    <!-- implementar template administrador -->

        <!-- Navbar Admin. -->
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
  </div>
    <!-- Fin navbar -->
    <h1 class="text-center mt-3">Logs</h1>
    
      
      
    <div class="table-responsive mx-auto" style="height: 560px !important; width: 100%; overflow-y: scroll;">
        <table class="table table-striped table-dark">


        <thead>
        <tr>
            <th class='text-center'>Fecha</th>
            <th class='text-center'>Operacion</th>
            <th class='text-center'>Detalle</th>
            <th class='text-center'>Id_usuario</th>
            <th class='text-center'>Perfil</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $consultaSelect = $conn->query
            ("SELECT `id`, `fecha`, `operacion`, `detalle`, `id_usuario`, `perfil` FROM `log`");

            $nroFila = 1;

            while ($row = $consultaSelect->fetch()) {
                echo "<tr>";
                echo "<td class='text-center'>" . $row['fecha'] . "</td>";
                echo "<td class='text-center'>" . $row['operacion'] . "</td>";
                echo "<td class='text-center'>" . $row['detalle'] . "</td>";
                echo "<td class='text-center'>" . $row['id_usuario'] . "</td>";
                echo "<td class='text-center'>" . $row['perfil'] . "</td>";
                echo "</tr>";
                $nroFila++;
            }
            ?>



        </body>
        </table>
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

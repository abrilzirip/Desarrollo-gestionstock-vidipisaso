<?php
include '../Controlador/db.php';


session_start();

if (!isset($_SESSION['usuario']) && isset($_SESSION['perfil'])) {
  header('Location:index.php');
  die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $idturno = 1;
  $idperfil = 1;
  $Nombre = $_POST['nombre'];
  $pass = $_POST['password'];
  $mail = $_POST['email'];
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $pFechaalta = date('Y-m-d H:i:s');
  //$fecha_baja = date('Y-m-d H:i:s');
}

// ...

if (!empty($Nombre) && !empty($pass) && !empty($mail)) {
  // Encriptar la contraseña
  $passEncriptada = password_hash($pass, PASSWORD_DEFAULT);
  echo $passEncriptada;

  $consultaInsert = "INSERT INTO `usuario`(`ID_TURNO`, `NOMBRE`, `PASSWORD`, `ID_PERFIL`, `F_ALTA`, `MAIL`) 
  VALUES (:idturno, :Nombre, :passEncriptada, :perfil, :pFechaalta, :mail)";
  echo $passEncriptada;
  try {
    $consulta = $conn->prepare($consultaInsert);
    $consulta->bindParam(':idturno', $idturno);
    $consulta->bindParam(':Nombre', $Nombre);
    $consulta->bindParam(':passEncriptada', $passEncriptada); // Usar la contraseña encriptada
    $consulta->bindParam(':perfil', $idperfil);
    $consulta->bindParam(':pFechaalta', $pFechaalta);
    $consulta->bindParam(':mail', $mail);

    $consulta->execute();
    $conn->beginTransaction();
    $conn->commit();

    header('Location: ' . htmlspecialchars($_SERVER["PHP_SELF"]) . "?succes_ok=1", true, 303);
    exit;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}



$consultaSelect = $conn->query("SELECT `ID_USUARIO_REGISTRADO`, `ID_TURNO`, `NOMBRE`, `PASSWORD`, `ID_PERFIL`,  `F_ALTA`, `MAIL` FROM `usuario`ORDER BY ID_USUARIO_REGISTRADO DESC");
?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="CSS/mystyle.css">
  <link rel="icon" href="Icon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
  <script src="./JS/scriptAdministradorEditaUsuario.js" defer></script>
  <title>AdministradorCrearUsuario</title>
</head>

<body>
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
        <ul class="navbar-nav">
          <li class="nav-item text-end">
            <a class="nav-link" href="../Controlador/Logout.php"><button class="btn btn-danger py-1" id="salir">Cerrar sesion</button></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <section class="container mt-4 w-75">
    <div id="cardProductos">
      <div class="card-header py-2">
        <h1 class="text-center mt-3">Crear Usuario</h1>
        <div>
          <table class="table table-striped table-dark table_id " id="table_id">
            <thead>
              <tr>
                <th>Fila</th>
                <th>NombreUsuario</th>
                <th>Password</th>
                <!-- <th>F_BAJA</th> -->
                <th>F_ALTA</th>
                <th>Email</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $nroFila = 1;
              while ($row = $consultaSelect->fetch()) {
                echo "<tr>";
                echo "<td class='text-center'>" . $nroFila . "</td>";
                echo "<td class='text-center'>" . $row['NOMBRE'] . "</td>";
                echo "<td class='text-center'>" . '********' . "</td>";
                // echo "<td class='text-center'>" . $row['F_BAJA'] . "</td>";
                echo "<td class='text-center'>" . $row['F_ALTA'] . "</td>";
                echo "<td class='text-center'>" . $row['MAIL'] . "</td>";
                echo "<td class='text-center'>";
                echo "<a href='AdministradorEditaUsuario.php' class='btn btn-sm btn-warning editar-btn' data-bs-toggle='modal' data-bs-target='#editaModal' data-id='" . $row['ID_USUARIO_REGISTRADO'] . "' data-nombre='" . $row['NOMBRE'] . "' data-password='" . $row['PASSWORD'] . "' data-email='" . $row['MAIL'] . "'><i class='fa-solid fa-pen-to-square'></i> Editar</a>";
                echo "<a href='AdministradorEliminarUsuario.php' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#eliminaModal' data-bs-id='" . $row['ID_USUARIO_REGISTRADO'] . "'><i class='fa-solid fa-trash'></i> Eliminar</a>";

                echo "</td>";
                echo "</tr>";
                $nroFila++;
              }
              ?>
              </body>
              </table>

                <div id="idbotones-pantalla-venta">
                  <div>
                    <button class="btn btn-danger py-1" id="btnInsertar" data-bs-toggle="modal" data-bs-target="#modalCarga">Agregar Usuario</button>
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
        <h4 class="modal-title">Nuevo Usuario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body bg-dark text-white">
        <form action="AdministradorCrearUsuario.php" id="formProducto" method="post">

          <label for="nombre">Nombre</label><br>
          <input class="form-control" type="text" id="nombre" name="nombre"><br>

          <label for="password">Password</label>
          <input class="form-control" type="password" id="password" name="password">
          <label for="email">email</label>
          <input class="form-control" type="email" id="email" name="email">
          <input type="submit" class="btn btn-success" value="Agregar" id="btnAgregarUsuario">
        </form>
      </div>
      <div class="modal-footer bg-dark text-white">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Volver</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editaModal" tabindex="-1" role="dialog" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Campos de formulario para editar la información -->
        <form id="formEditaUsuario">
          <input type="hidden" id="editaUsuarioId" name="editaUsuarioId">
          <label for="editaNombre">Nombre</label>
          <input type="text" class="form-control" id="editaNombre" name="editaNombre">
          <label for="editaPassword">Password</label>
          <input type="password" class="form-control" id="editaPassword" name="editaPassword">
          <label for="editaEmail">Email</label>
          <input type="email" class="form-control" id="editaEmail" name="editaEmail">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btnGuardarCambios">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
</section>








</body>

</html>


</body>


</html>

<?php $conn = null; ?>
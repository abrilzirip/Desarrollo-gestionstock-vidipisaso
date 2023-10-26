<?php
include '../Controlador/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = 2;
    $idturno = 1;
    $idperfil = 1;
    $Nombre = $_POST['nombre'];
    $pass = $_POST['password'];
    $mail = $_POST['email'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $pFechaalta = date('Y-m-d H:i:s');
    $fecha_baja = date('Y-m-d H:i:s');

    if (!empty($Nombre) && !empty($pass) && !empty($mail)) {
        $consultaInsert = "INSERT INTO `usuario` (`ID_USUARIO_REGISTRADO`, `ID_TURNO`, `ID_PERFIL`, `NOMBRE`, `PASSWORD`, `F_BAJA`, `F_ALTA`, `MAIL`) 
                          VALUES (:user, :idturno, :idperfil, :Nombre, :pass, :fecha_baja, :pFechaalta, :mail)";

        try {
            $consulta = $conn->prepare($consultaInsert);
            $consulta->bindParam(':user', $user);
            $consulta->bindParam(':idturno', $idturno);
            $consulta->bindParam(':idperfil', $idperfil);
            $consulta->bindParam(':Nombre', $Nombre);
            $consulta->bindParam(':pass', $pass);
            $consulta->bindParam(':fecha_baja', $fecha_baja);
            $consulta->bindParam(':pFechaalta', $pFechaalta);
            $consulta->bindParam(':mail', $mail);

            $consulta->execute();
            $conn->beginTransaction();
            $conn->commit();
            echo "Inserción exitosa";

            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="icon" href="/Icon.ico">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="js/scriptAdminsitradorCrearProducto.js" defer></script>
    <title>AdministradorCrearUsuario</title>
</head>

<body>
   
    <div>
        <nav class="navbar navbar-expand-lg bg-black">
          <div class="container-fluid">
            <a class="navbar-brand text-light fs-5" href="#">StVent</a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="cista/Administrador.htmlollapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a
                    class="nav-link active text-warning mt-1 fs-6"
                    aria-current="page"
                    href="Administrador.html"
                    >Inicio</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link text-warning mt-1 fs-6" href="AdministradorCrearUsuario.php"
                    >Crear Usuario</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link text-warning mt-1 fs-6" href="AdminsitradorCrearProducto.html"
                    >Crear Producto</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link text-warning mt-1 fs-6" href="#"
                    >Crear Inidicador</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link text-warning mt-1 fs-6" href="#"
                    >Crear Ajuste</a
                  >
                </li>
  
                <li class="nav-item dropdown">
                  <a class="nav-link text-warning dropdown-toggle mt-1 fs-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Generar Reporte
                  </a>
                  <ul class="dropdown-menu bg-black">
                    <li><a class="dropdown-item text-warning" href="#">Ventas</a></li>
                    <li><a class="dropdown-item text-warning" href="#">Vendedor</a></li>
                    <li><a class="dropdown-item text-warning" href="#">Recaudación</a></li>
                  </ul>
                </li>
  
  
                <!-- <li class="nav-item">
                  <a class="nav-link text-warning mt-1 fs-6" href="#"
                    >Generar Reporte</a
                  > -->
                </li>
                <li class="nav-item">
                  <a class="nav-link text-warning mt-1 fs-6" href="#"
                    >Visualizar Logs</a
                  >
                </li>
              </ul>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item text-end">
                <a class="nav-link" href="index.html"
                  ><button class="btn btn-danger py-1" id="salir">
                    Cerrar sesion
                  </button></a
                >
              </li>
            </ul>
          </div>
        </nav>
      </div>
    <div class="card" id="cardProductos">
    <div class="card-header py-2">
    <h1 class="text-center mt-3">Crear Usuario</h1>
    <div class="card-body">




    <table class="table table-striped table-dark table_id " id="table_id">

                   
                    <thead>    
                    <tr>
                    <th></th>
                    <th>Id_Usuario</th>
                    <th>ID_TURNO</th>
                    <th>ID_PERFIL</th>
                    <th>NombreUsuario</th>
                    <th>Password</th>
                    <th>F_ALTA</th>
                    <th>F_BAJA</th>
                    <th>Email</th>
                    <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $nroFila = 1;
                            $consultaSelect = $conn->query
                            ("SELECT `ID_USUARIO_REGISTRADO`, `ID_TURNO`, `ID_PERFIL`, `NOMBRE`, `PASSWORD`, `F_BAJA`, `F_ALTA`, `MAIL` FROM `usuario` ");
                            while ($row = $consultaSelect->fetch()) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $nroFila . "</td>";
                                echo "<td class='text-center'>" . $row['ID_USUARIO_REGISTRADO'] . "</td>";
                                echo "<td class='text-center'>" . $row['ID_TURNO'] . "</td>";
                                echo "<td class='text-center'>" . $row['ID_PERFIL'] . "</td>";
                                echo "<td class='text-center'>" . $row['NOMBRE'] . "</td>";
                                echo "<td class='text-center'>" . $row['PASSWORD'] . "</td>";
                                echo "<td class='text-center'>" . $row['F_BAJA'] . "</td>";
                                echo "<td class='text-center'>" . $row['F_ALTA'] . "</td>";
                                echo "<td class='text-center'>" . $row['MAIL'] . "</td>";
                                echo "<td class='text-center'><div class='btn-group' role='group' aria-label='Grupo botones'></button><button class='btn btn-primary btn-sm' data-btn-grupo='modificar-cliente'><i class='bi bi-pencil'></i></button><button type='button' class='btn btn-danger btn-sm' data-btn-grupo='eliminar-cliente'><i class='bi bi-trash'></i></button></div></td>";
                                echo "</tr>";
                                $nroFila++;
                            }
                            ?>



</body>
</table>   
            <!-- <div class="table-responsive">
                <table class="table table-striped table-dark" id="productosTabla">
                    <thead>
                    <th>Id_Usuario</th>
                    <th>Nombre</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-primary" id="btnLapiz">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-danger" id="btnTacho">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

    <div id="idbotones-pantalla-venta">
        <div>
        <button class="btn btn-danger py-1">Ver Lista Usuarios</button>
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
            <form action="/AdministradorCrearUsuario.php" id="formProducto" required>

                <label for="nombre">Nombre</label><br>
                <input class="form-control" type="text" id="nombre" name="nombre" required><br>

                <label for="password">Password</label><br>
                <input class="form-control" type="password"  id="password" name="password" required><br>

                <label for="email">email</label><br>
                <input class="form-control" type="email"  id="email" name="email" required><br>

                

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
        <div class="btn-group btn-group-toggle" >
            <label class="btn btn-light" id="idlabelventaverde">
                
            </label>
            <label class="btn btn-dark" id="idlabelventarojo">
                
            </label>
        </div>
    </div>
    
      
    

</body>


</html>

<?php $conn = null; ?>
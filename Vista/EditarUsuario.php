<?php
include '../Controlador/dbTwo.php';
include '../Controlador/InsertAgregarUsuario.php';
include '../Controlador/UpdateUsuario.php';


// session_start();
// if (!isset($_SESSION['usuario']) && !isset($_SESSION['perfil'])) {
//     header('Location:index.php');
//     die();
// }
$consultaSelect = $conn->query("SELECT `ID_USUARIO_REGISTRADO`, `ID_TURNO`, `ID_PERFIL`,`NOMBRE`, `PASSWORD`,   `F_ALTA`, `MAIL` FROM `usuario`ORDER BY ID_USUARIO_REGISTRADO DESC");
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
    <script src="./JS/scriptEditarUsuario.js" defer></script>

    <title>AdministradorCrearUsuario</title>
</head>

<body>
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
    <section class="container mt-4 w-75">
        <div class="card bg-black text-light">
            <div class="card-header py-2">
                <h5 class="text-center mt-3">Crear Usuario</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-dark table_id " id="table_id">
                    <thead>
                        <tr>
                            <th>Fila</th>
                            <!-- <th>Id</th> -->
                            <!-- <th>Turno</th> -->
                            <!-- <th>Perfil</th> -->
                            <th>Nombre</th>
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
                            // echo "<td class='text-center'>" . $row['ID_USUARIO_REGISTRADO'] . "</td>";
                            // echo "<td class='text-center'>" . $row['ID_TURNO'] . "</td>";
                            // echo "<td class='text-center'>" . $row['ID_PERFIL'] . "</td>";
                            echo "<td class='text-center'>" . $row['NOMBRE'] . "</td>";
                            echo "<td class='text-center'>" . '********' . "</td>";
                            // echo "<td class='text-center'>" . $row['F_BAJA'] . "</td>";
                            echo "<td class='text-center'>" . $row['F_ALTA'] . "</td>";
                            echo "<td class='text-center'>" . $row['MAIL'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<button class='btn btn-sm btn-warning' edit='usuario' ><i class='fa-solid fa-pen-to-square'></i>Editar</button>";
                            echo "<button class='btn btn-sm btn-danger' delete='usuario' ><i class='fa-solid fa-trash'></i>Borrar</button>";
                            echo "</td>";
                            echo "</tr>";
                            $nroFila++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button class="btn btn-danger py-1" id="btnInsertar" data-bs-toggle="modal" data-bs-target="#modalCarga">Agregar Usuario</button>
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
    <!-- modal Agrega usuario -->
    <div class="modal fade" id="modalCarga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmCreaUsuario" action="EditarUsuario.php" method="POST">
                        <label class="form-label" for ="idperfil">Eliga tipo de usuario</label>
                        <select class="form-select" >
                            <option value="0"></option>
                            <option value="1">Administrador</option>
                            <option value="2">Vendedor</option>
                        </select><br>

                        <label class="form-label" for="nombre">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre">

                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password">

                        <label class="form-label" for="email">email</label>
                        <input class="form-control" type="email" id="email" name="email">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                    <button type="submit" form="frmCreaUsuario" class="btn btn-success" value="Agregar" id="btnAgregarUsuario">Agregar Usuario</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal Editar usuario -->
    <!-- Modal -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitulo"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditaUsuario" action="EditarUsuario.php" method='POST'>
                        <!-- <label class="form-label" for="edita">id </label>
                        <input type="number" class="form-control" id="editaUsuarioId" name="editaUsuarioId"> -->

                        <!-- <label class="form-label" for="Id_Turno">Turno</label>
                        <input type="number" class="form-control" id="Id_Turno" name="Id_Turno"> -->
                        <!-- <label class="form-label" for="Id_Perfil">Perfil </label>
                        <input type="number" class="form-control" id="Id_Perfil" name="Id_Perfil"> -->

                        <label class="form-label" for="editaNombre">Nombre</label>
                        <input type="text" class="form-control" id="editaNombre" name="editaNombre">

                        <label class="form-label" for="editaPassword">Password</label>
                        <input type="password" class="form-control" id="editaPassword" name="editaPassword">

                        <label class="form-label" for="editaEmail">Email</label>
                        <input type="email" class="form-control" id="editaEmail" name="editaEmail">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">volver</button>
                    <button form="formEditaUsuario" type="submit" class="btn btn-primary">enviar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
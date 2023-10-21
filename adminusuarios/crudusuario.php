<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="/Icon.ico">
    <script src="crudusuario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
   
    <title>Crear Usuario</title>
</head>

    <body>

                 <div>
                    <nav class="navbar navbar-expand-lg  bg-black">
                        <div class="container-fluid">
                            <a class="navbar-brand text-light fs-5" href="#">StVent</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active text-warning mt-1 fs-6" aria-current="page" href="#">Inicio</a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a class="nav-link text-warning mt-1 fs-6" href="#">Crear Producto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-warning mt-1 fs-6" href="#">Crear Inidicador</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-warning mt-1 fs-6" href="#">Crear Ajuste</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-warning mt-1 fs-6" href="#">Generar Reporte</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-warning mt-1 fs-6" href="#">Visualizar Logs</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="navbar-nav">
                                <li class="nav-item text-end">
                                    <a class="nav-link" href=""><button class="btn btn-danger py-1" id="salir">Cerrar sesion</button></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="users-form">
                    <h1>Crear usuario</h1>
                    <form action="insert_user.php" method="POST">
                        <input type="text" name="name" placeholder="Nombre">
                        <input type="text" name="lastname" placeholder="Apellidos">
                        <input type="text" name="username" placeholder="Cargo">
                        <input type="password" name="password" placeholder="Password">
                        <input type="email" name="email" placeholder="Email">

                        <input type="submit" value="Agregar" >
                    </form>
                </div>

                <div class="users-table container" >
                <div class = "card bg-dark">
                <div class="card-header text-light"> <h5>Usuarios registrados</h5></div>
                 <div class="card-body">   <table class="table table-dark ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($query)): ?>
                                <tr>
                                    <th><?= $row['id'] ?></th>
                                    <th><?= $row['name'] ?></th>
                                    <th><?= $row['lastname'] ?></th>
                                    <th><?= $row['username'] ?></th>
                                    <th><?= $row['password'] ?></th>
                                    <th><?= $row['email'] ?></th>
                                    <th><a href="actualizausuario.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                                    <th><a href="borrarusuario.php?id=<?= $row['id'] ?>" class="users-table--delete"  onclick="eliminar(1)" >Eliminar</a></th>
                                </tr>
                            <?php endwhile; ?>
                            <!-- termina bloque while -->
                        </tbody></div>
                    </table>
                    </div>
                </div>

    </body>

</html>
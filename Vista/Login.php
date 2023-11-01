<?php include 'conetDataBase.php'; ?>

<?php
session_start();

if (isset($_SESSION["usuario"]) && $_SESSION["contraseña"]) {

    $consultaSelect = "SELECT `NOMBRE`, `PASSWORD` FROM `usuario` WHERE `NOMBRE`:nombre";
    $consulta = $conn->prepare($consultaSelect);
    $consulta->bindParam(':nombre', $_POST['usuario']);
    $consulta->bindParam(':contraseña', $_POST['contraseña']);
    $consulta->execute();
    $usuarioDb = $consulta->fetch(\PDO::FETCH_ASSOC);
    if ($usuarioDb) {
        if (password_verify($_POST['contraseña'], $usuarioDb['PASSWORD'])) {
            // LOGIN OK
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contraseña'] = $usuarioDb['NOMBRE'];
            $_SESSION['flash_success'] = 'Logueado correctamente';
            header('location:VendedorListaCliente.php');
        }
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
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="icon" href="Icon.ico">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="JS/script.js" defer></script>
    <title>StVent-Iniciar Sesion</title>
</head>

<body>
    <div id="idContenedor">
        <section class="container mt-4">
            <div class="row">
                <div class="col-7" class="mt-5">
                    <div class="imgLogo">
                        <img src="imagenes/stEvent.png" alt="Logo" class="img-fluid">
                    </div>
                </div>
                <div class="col-5 mt-3">
                    <form action="" id="" class="border rounded shadow-lg" method="post">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h5 class="text-center fs-4">Iniciar Sesion</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label for="usuario" class="mt-2">Usuario</label>
                                    <input type="text" name="usuario" id="idNombreDeUsuario" class="form-control mt-1" placeholder="Ej: Nathan Drake"></i>

                                    <label for="contraseña" class="mt-2">Contraseña</label>
                                    <input type="password" name="contraseña" id="idpassword" class="form-control mt-1" placeholder="***********"></i>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="idbotonlogIn" class="btn btn-secondary w-100"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesion</button>
                                <button type="button" class="btn btn-secondary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-exclamation-square pe-1"></i>Olvide mi contraseña</button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form name="datosUsuarioContraseña">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Recupera tu cuenta</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" ria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Introduce tu correo electrónico:</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo Electronico" autocomplete="off">
                                                <div id="emailHelp" class="form-text mt-2">Nunca compartiremos su correo electrónico con nadie más</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="idalerta"></div>
        </section>
    </div>
</body>

</html>
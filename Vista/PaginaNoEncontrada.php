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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error:Permiso Denegado</title>

    <link rel="stylesheet" href="Css/mystyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container rounded-4 bg-black">
        <div class="card rounded-4 bg-black">
            <div class="card-body">
                <div class="alert alert-danger  rounded-4">
                    No tienes permisos para realizar esta acción.
                </div>
            </div>
        </div>
    </div>
</body>

</html>
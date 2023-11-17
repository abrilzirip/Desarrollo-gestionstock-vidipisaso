
<?php include '../Controlador/db.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $idturno = 1;
  $idperfil = 1;
  $Nombre = $_POST['nombre'];
  $pass = $_POST['password'];
  $mail = $_POST['email'];
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $pFechaalta = date('Y-m-d H:i:s');
  $fecha_baja = date('Y-m-d H:i:s');


  if (!empty($Nombre) && !empty($pass) && !empty($mail)) {
    $consultaInsert = "INSERT INTO `usuario`(`ID_TURNO`, `NOMBRE`, `PASSWORD`, `ID_PERFIL`, `F_BAJA`, `F_ALTA`, `MAIL`) 
    VALUES ( :idturno, :Nombre, :pass,:perfil ,:fecha_baja, :pFechaalta, :mail)";

    try {
      $consulta = $conn->prepare($consultaInsert);
      $consulta->bindParam(':idturno', $idturno);
      $consulta->bindParam(':Nombre', $Nombre);
      $consulta->bindParam(':pass', $pass);
      $consulta->bindParam('perfil', $idperfil);
      $consulta->bindParam(':fecha_baja', $fecha_baja);
      $consulta->bindParam(':pFechaalta', $pFechaalta);
      $consulta->bindParam(':mail', $mail);

      $consulta->execute();
      $conn->beginTransaction();
      $conn->commit();
      echo "";
      header('Location: ' . htmlspecialchars($_SERVER["PHP_SELF"]) . "?succes_ok=1", true, 303);
      exit;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  } else {
    echo "Algunos campos están vacíos. Por favor, completa todos los campos.";
  }
}
$consultaSelect = $conn->query("SELECT `ID_USUARIO_REGISTRADO`, `ID_TURNO`, `NOMBRE`, `PASSWORD`, `ID_PERFIL`, `F_BAJA`, `F_ALTA`, `MAIL` FROM `usuario`ORDER BY ID_USUARIO_REGISTRADO DESC");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tabla con X-Editable</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap Table CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.16.0/bootstrap-table.min.css">

    <!-- X-Editable CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css">
</head>
<body>

<div class="container mt-5">
<table id="table_id"
       class="table table-striped table-dark table_id"
       data-toggle="table"
       data-pagination="true"
       data-show-export="true"
       data-url="json/data1.json">
  <thead>
    <tr>
      <th data-field="ID_USUARIO_REGISTRADO">ID</th>
      <th data-field="ID_TURNO" data-editable="true">ID_TURNO</th>
      <th data-field="NOMBRE" data-editable="true">Nombre</th>
      <th data-field="PASSWORD" data-editable="true">Contraseña</th>
      <th data-field="ID_PERFIL" data-editable="true">Perfil</th>
      <th data-field="F_BAJA" data-editable="true">F_BAJA</th>
      <th data-field="F_ALTA" data-editable="true">F_ALTA</th>
      <th data-field="MAIL" data-editable="true">Email</th>
      <th data-field="acciones" data-formatter="actionFormatter" data-events="actionEvents">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $nroFila = 1;
    while ($row = $consultaSelect->fetch()) {
      echo "<tr>";
      echo "<td>" . $row['ID_USUARIO_REGISTRADO'] . "</td>";
      echo "<td data-name='ID_TURNO'>" . $row['ID_TURNO'] . "</td>";
      echo "<td data-name='NOMBRE'>" . $row['NOMBRE'] . "</td>";
      echo "<td data-name='PASSWORD'>" . $row['PASSWORD'] . "</td>";
      echo "<td data-name='ID_PERFIL'>" . $row['ID_PERFIL'] . "</td>";
      echo "<td data-name='F_BAJA'>" . $row['F_BAJA'] . "</td>";
      echo "<td data-name='F_ALTA'>" . $row['F_ALTA'] . "</td>";
      echo "<td data-name='MAIL'>" . $row['MAIL'] . "</td>";
      echo "<td class='text-center'>
              <a href='ActualizarUsuario.php' class='btn btn-primary' data-type='text' data-pk='" . $row['ID_USUARIO_REGISTRADO'] . "' data-name='Id_Usuario' data-url='ActualizarUsuario.php' data-title='Ingresa el nombre de usuario'><i class='bi bi-pencil'></i></a>
              <a href='EliminarUsuario.php' class='btn btn-danger' data-type='text' data-pk='" . $row['ID_USUARIO_REGISTRADO'] . "' data-name='Id_Usuario' data-url='EliminarUsuario.php' data-title='Ingresa el nombre de usuario'><i class='bi bi-trash'></i></a>
            </td>";
      echo "</tr>";
      $nroFila++;
    }
    ?>
  </tbody>
</table>

<script>
  function actionFormatter(value, row, index) {
    return [
      '<a class="edit" href="javascript:void(0)" title="Editar">',
      '<i class="bi bi-pencil"></i>',
      '</a>  ',
      '<a class="remove" href="javascript:void(0)" title="Eliminar">',
      '<i class="bi bi-trash"></i>',
      '</a>'
    ].join('');
  }

  window.actionEvents = {
    'click .edit': function (e, value, row, index) {
      alert('Haz clic en editar en la fila ' + JSON.stringify(row));
    },
    'click .remove': function (e, value, row, index) {
      alert('Haz clic en eliminar en la fila ' + JSON.stringify(row));
    }
  };
</script>
</div>
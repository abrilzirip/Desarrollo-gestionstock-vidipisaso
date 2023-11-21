<?php
include '../Controlador/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['action'])) {
    switch ($_POST['action']) {
      case 'eliminar':
        eliminarUsuario();
        break;
      case 'editar':
        editarUsuario();
        break;
      default:
        echo "Acción no válida.";
    }
  }
}

function eliminarUsuario() {
  if (isset($_POST['idEliminar'])) {
    $idEliminar = $_POST['idEliminar'];
    // Realiza la lógica de eliminación en la base de datos
    // (por ejemplo, usando una sentencia DELETE)
    // ...

    echo "Usuario eliminado con ID: " . $idEliminar;
  }
}

function editarUsuario() {
  if (isset($_POST['idEditar'])) {
    $idEditar = $_POST['idEditar'];
    // Realiza la lógica de obtención de datos para edición desde la base de datos
    // (por ejemplo, usando una sentencia SELECT)
    // ...

    // Devuelve los datos del usuario como respuesta AJAX (en formato JSON)
    $datosUsuario = array(
      'ID_USUARIO_REGISTRADO' => $idEditar,
      'NOMBRE' => 'nombre del usuario',
      'PASSWORD' => 'nueva contraseña',
      'MAIL' => 'nuevo@mail.com',
      // ... otros campos ...
    );
    echo json_encode($datosUsuario);
  }
}

$conn = null;
?>

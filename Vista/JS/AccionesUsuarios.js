{
    /* <script>
      document.addEventListener("DOMContentLoaded", function () {
        const editarBotones = document.querySelectorAll("[data-btn-grupo='editar-cliente']");
        const eliminarBotones = document.querySelectorAll("[data-btn-grupo='eliminar-cliente']");

        editarBotones.forEach((boton) => {
          boton.addEventListener("click", function () {
            const clienteId = boton.getAttribute("data-cliente-id");
            // Realizar una solicitud AJAX para obtener datos del usuario
            ajaxRequest('editar', clienteId);
          });
        });

        eliminarBotones.forEach((boton) => {
          boton.addEventListener("click", function () {
            const clienteId = boton.getAttribute("data-cliente-id");
            // Confirmar la eliminación y realizar una solicitud AJAX para eliminar al usuario
            if (confirm("¿Estás seguro de eliminar este usuario?")) {
              ajaxRequest('eliminar', clienteId);
            }
          });
        });

        function ajaxRequest(accion, id) {
          const xhr = new XMLHttpRequest();
          const formData = new FormData();
          formData.append('action', accion);
          formData.append('id' + accion.charAt(0).toUpperCase() + accion.slice(1), id);

          xhr.open('POST', 'acciones_usuario.php', true);

          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
              const response = xhr.responseText;
              console.log(response);

              // Aquí puedes manejar la respuesta del servidor, por ejemplo, mostrar mensajes, actualizar la interfaz, etc.
              if (accion === 'editar') {
                // Parsear la respuesta JSON y llenar el formulario de edición
                const datosUsuario = JSON.parse(response);
                // Lógica para llenar el formulario con los datos del usuario
                console.log(datosUsuario);
              } else if (accion === 'eliminar') {
                // Actualizar la interfaz después de la eliminación (por ejemplo, recargar la tabla)
                location.reload();
              }
            }
          };

          xhr.send(formData);
        }
      });
    </script> */
}
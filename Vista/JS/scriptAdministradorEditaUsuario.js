$(document).ready(function() {
    // Manejar el evento cuando se abre el modal de edición
    $('#editaModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var idUsuario = button.data('id');
        var nombre = button.data('nombre');
        var password = button.data('password');
        var email = button.data('email');

        // Actualizar los campos del formulario en el modal con los datos actuales
        $('#editaUsuarioId').val(idUsuario);
        $('#editaNombre').val(nombre);
        $('#editaPassword').val(password);
        $('#editaEmail').val(email);
        // Actualiza más campos según sea necesario
    });

    // Manejar el evento cuando se hace clic en "Guardar Cambios"
    $('#btnGuardarCambios').on('click', function() {
        // Aquí puedes realizar la lógica para enviar los datos a tu backend y actualizar la base de datos
        var formData = $('#formEditaUsuario').serialize();
        $.ajax({
            type: 'POST',
            url: 'scriptAdministradorEditaUsuario.js', // Reemplaza esto con la URL de tu script de actualización
            data: formData,
            success: function(response) {
                // Maneja la respuesta del servidor si es necesario
                console.log(response);

                // Parsea la respuesta JSON para obtener los nuevos datos del usuario
                var usuarioActualizado = JSON.parse(response);

                // Actualiza la fila correspondiente en la tabla con los nuevos datos
                var filaUsuario = $('#table_id').find('tr[data-id="' + usuarioActualizado.ID_USUARIO_REGISTRADO + '"]');
                filaUsuario.find('.nombre').text(usuarioActualizado.NOMBRE);
                filaUsuario.find('.password').text('********');
                filaUsuario.find('.email').text(usuarioActualizado.MAIL);

                // Cierra el modal de edicion
                $('#editaModal').modal('hide');
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});
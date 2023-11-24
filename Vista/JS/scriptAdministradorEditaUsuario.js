$('#btnGuardarCambios').on('click', function() {

    var formData = $('#formEditaUsuario').serialize();
    $.ajax({
        type: 'POST',
        url: 'ActualizarUsuario.php', // Reemplaza esto con la URL de tu script de actualización
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
            location.reload();
        },
        error: function(error) {}
    });
});
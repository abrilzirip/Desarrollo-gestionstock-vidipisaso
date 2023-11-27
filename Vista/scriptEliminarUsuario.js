$(document).ready(function() {
    $("button[delete='usuario']").click(function() {
        var idUsuario = $(this).data('id');
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            $.ajax({
                type: 'POST',
                url: 'EliminarUsuario.php',
                data: { idUsuario: idUsuario },
                success: function(response) {
                    if (response == 'success') {
                        $("#fila" + idUsuario).hide();
                    } else {
                        alert('Error al eliminar el usuario');
                    }
                }
            });
        }
    });
});
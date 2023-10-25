function inicio() {
    $(document).ready(function() {
        // Función para cargar y actualizar la tabla de clientes
        function actualizarTablaClientes() {
            $.ajax({
                type: "GET",
                url: "VendedorListaCliente.php", // Crea este archivo PHP para obtener los datos de la base de datos
                success: function(data) {
                    $("#tablaCliente tbody").html(data); // Actualiza la tabla con los nuevos datos
                }
            });
        }

        // Evento para actualizar la tabla cuando se envían datos al servidor
        $("#frmModificarCliente").on("submit", function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "VendedorListaCliente.php", // Crea este archivo PHP para procesar los datos y actualizar la base de datos
                data: $(this).serialize(),
                success: function() {
                    actualizarTablaClientes(); // Actualiza la tabla después de guardar los cambios
                    $('#modalEditarCliente').modal('hide'); // Cierra el modal
                }
            });
        });

        // Llama a la función para cargar la tabla de clientes al cargar la página
        actualizarTablaClientes();
    });
}

window.addEventListener("load", inicio, false);
// $(document).ready(function () {
//     var dataTable = $('#sample_data').DataTable({
//         "ajax": {
//             url: "fetchrec.php",
//             type: "POST",
//         },
//         "language": {
//             "sProcessing": "Procesando...",
//             "sLengthMenu": "Mostrar _MENU_ registros por página",
//             "sZeroRecords": "No se encontraron resultados",
//             "sEmptyTable": "Ningún dato disponible en esta tabla",
//             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//             "sInfoPostFix": "",
//             "sSearch": "Buscar:",
//             "sUrl": "",
//             "sInfoThousands": ",",
//             "sLoadingRecords": "Cargando...",
//             "oPaginate": {
//                 "sFirst": "Primero",
//                 "sLast": "Último",
//                 "sNext": "Siguiente",
//                 "sPrevious": "Anterior"
//             },
//             "oAria": {
//                 "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
//                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//             }
//         },
//         createdRow: function (row, data, rowIndex) {
//             $.each($('td', row), function (colIndex) {
//                 if (colIndex == 1) {
//                     $(this).attr('data-name', 'name');
//                     $(this).attr('class', 'name');
//                     $(this).attr('data-type', 'text');
//                     $(this).attr('data-pk', data[0]);
//                 }
//             });
//         }
//     });

//     $('#sample_data').editable({
//         container: 'body',
//         selector: 'td.name',
//         url: 'update_rec.php',
//         title: 'Name',
//         type: 'POST',
//         validate: function (value) {
//             if ($.trim(value) == '') {
//                 return 'Este campo es obligatorio';
//             }
//         }
//     });
// });
$(document).ready(function () {
    // Destruir la DataTable existente antes de la nueva inicialización
    if ($.fn.DataTable.isDataTable('#sample_data')) {
        $('#sample_data').DataTable().destroy();
    }

    var dataTable = $('#sample_data').DataTable({
        "ajax": {
            url: "Fetch.php",
            type: "POST",
        },
        "language": {
            // ... (código de idioma personalizado)
            "sProcessing": "Procesando...",
            //             "sLengthMenu": "Mostrar _MENU_ registros por página",
            //             "sZeroRecords": "No se encontraron resultados",
            //             "sEmptyTable": "Ningún dato disponible en esta tabla",
            //             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            //             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            //             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            //             "sInfoPostFix": "",
            //             "sSearch": "Buscar:",
            //             "sUrl": "",
            //             "sInfoThousands": ",",
            //             "sLoadingRecords": "Cargando...",
            //             "oPaginate": {
            //                 "sFirst": "Primero",
            //                 "sLast": "Último",
            //                 "sNext": "Siguiente",
            //                 "sPrevious": "Anterior"
            //             },
            //             "oAria": {
            //                 "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            //                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            //             }
        },
        createdRow: function (row, data, rowIndex) {
            $.each($('td', row), function (colIndex) {
                if (colIndex == 1) {
                    $(this).attr('data-name', 'name');
                    $(this).attr('class', 'name');
                    $(this).attr('data-type', 'text');
                    $(this).attr('data-pk', data[0]);
                }
            });
        }
    });

    $('#sample_data').editable({
        container: 'body',
        selector: 'td.name',
        url: 'Actualizarusuario.php',
        title: 'Name',
        type: 'POST',
        validate: function (value) {
            if ($.trim(value) == '') {
                return 'Este campo es obligatorio';
            }
        }
    });
});

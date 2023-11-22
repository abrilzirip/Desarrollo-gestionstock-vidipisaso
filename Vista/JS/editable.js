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
// $(document).ready(function () {
//     // Destruir la DataTable existente antes de la nueva inicialización
//     if ($.fn.DataTable.isDataTable('#sample_data')) {
//         $('#sample_data').DataTable().destroy();
//     }

//     var dataTable = $('#sample_data').DataTable({
//         "ajax": {
//             url: "Fetch.php",
//             type: "POST",
//         },
//         "language": {
//             // ... (código de idioma personalizado)
//             "sProcessing": "Procesando...",
//             //             "sLengthMenu": "Mostrar _MENU_ registros por página",
//             //             "sZeroRecords": "No se encontraron resultados",
//             //             "sEmptyTable": "Ningún dato disponible en esta tabla",
//             //             "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//             //             "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//             //             "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//             //             "sInfoPostFix": "",
//             //             "sSearch": "Buscar:",
//             //             "sUrl": "",
//             //             "sInfoThousands": ",",
//             //             "sLoadingRecords": "Cargando...",
//             //             "oPaginate": {
//             //                 "sFirst": "Primero",
//             //                 "sLast": "Último",
//             //                 "sNext": "Siguiente",
//             //                 "sPrevious": "Anterior"
//             //             },
//             //             "oAria": {
//             //                 "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
//             //                 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//             //             }
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
//         url: 'Actualizarusuario.php',
//         title: 'Name',
//         type: 'POST',
//         validate: function (value) {
//             if ($.trim(value) == '') {
//                 return 'Este campo es obligatorio';
//             }
//         }
//     });
// });



let nuevoModal = document.getElementById('nuevoModal')
let editaModal = document.getElementById('editaModal')
let eliminaModal = document.getElementById('eliminaModal')

nuevoModal.addEventListener('shown.bs.modal', event => {
    nuevoModal.querySelector('.modal-body #nombre').focus()
})

nuevoModal.addEventListener('hide.bs.modal', event => {
    nuevoModal.querySelector('.modal-body #nombre').value = ""
    nuevoModal.querySelector('.modal-body #descripcion').value = ""
    nuevoModal.querySelector('.modal-body #genero').value = ""
    nuevoModal.querySelector('.modal-body #poster').value = ""
})

editaModal.addEventListener('hide.bs.modal', event => {
    editaModal.querySelector('.modal-body #nombre').value = ""
    editaModal.querySelector('.modal-body #descripcion').value = ""
    editaModal.querySelector('.modal-body #genero').value = ""
    editaModal.querySelector('.modal-body #img_poster').value = ""
    editaModal.querySelector('.modal-body #poster').value = ""
})

editaModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let inputId = editaModal.querySelector('.modal-body #id')
    let inputNombre = editaModal.querySelector('.modal-body #nombre')
    let inputDescripcion = editaModal.querySelector('.modal-body #descripcion')
    let inputGenero = editaModal.querySelector('.modal-body #genero')
    let poster = editaModal.querySelector('.modal-body #img_poster')

    let url = "getPelicula.php"
    let formData = new FormData()
    formData.append('id', id)

    fetch(url, {
            method: "POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.id
            inputNombre.value = data.nombre
            inputDescripcion.value = data.descripcion
            inputGenero.value = data.id_genero
            poster.src = '<?= $dir ?>' + data.id + '.jpg'

        }).catch(err => console.log(err))

})

eliminaModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    eliminaModal.querySelector('.modal-footer #id').value = id
})
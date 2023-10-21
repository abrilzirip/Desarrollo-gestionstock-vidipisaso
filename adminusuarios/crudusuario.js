function eliminar(id){

    swal({
        title: "seguro quiere eliminar?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("eliminando registro de la base", {
            icon: "success",
          });
        } else {
          swal("se cancelo la accion gracias!");
        }
      });

}
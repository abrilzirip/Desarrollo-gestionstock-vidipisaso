<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Modal de Edición -->
<div class="modal fade" id="editaModal" tabindex="-1" role="dialog" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editaModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Campos de formulario para editar la información -->
                <form id="formEditaUsuario" action="AdministradorCrearusuario.php" >
                    <input type="hidden" id="editaUsuarioId" name="editaUsuarioId">
                    <label for="editaNombre">Nombre</label>
                    <input type="text" class="form-control" id="editaNombre" name="editaNombre">
                    <label for="editaPassword">Password</label>
                    <input type="password" class="form-control" id="editaPassword" name="editaPassword">
                    <label for="editaEmail">Email</label>
                    <input type="email" class="form-control" id="editaEmail" name="editaEmail">
                    <!-- Agrega más campos según sea necesario -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>
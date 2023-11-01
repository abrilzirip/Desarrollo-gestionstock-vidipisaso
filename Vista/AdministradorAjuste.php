<?php require_once 'conetDataBase.php'; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="CSS/mystyle.css" />
    <link rel="stylesheet" href="./CSS/AdministradorReporte.css">
    <link rel="icon" href="/Icon.ico" />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
      defer
    ></script>
    
    <title>StVent-Crear Ajuste</title>
  </head>

  <body>
    <!-- implementar template administrador -->

    <div>
      <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid">
          <a class="navbar-brand text-light fs-5" href="#">StVent</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="cista/Administrador.htmlollapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a
                  class="nav-link active text-warning mt-1 fs-6"
                  aria-current="page"
                  href="#"
                  >Inicioo</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning mt-1 fs-6" href="crudusuario.html"
                  >Crear Usuario</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning mt-1 fs-6" href="AdminsitradorCrearProducto.html"
                  >Crear Producto</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning mt-1 fs-6" href="#"
                  >Crear Inidicador</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning mt-1 fs-6" href="#"
                  >Crear Ajuste</a
                >
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link text-warning dropdown-toggle mt-1 fs-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Generar Reporte
                </a>
                <ul class="dropdown-menu bg-black">
                  <li><a class="dropdown-item text-warning" href="#">Ventas</a></li>
                  <li><a class="dropdown-item text-warning" href="#">Vendedor</a></li>
                  <li><a class="dropdown-item text-warning" href="#">Recaudación</a></li>
                </ul>
              </li>


              <!-- <li class="nav-item">
                <a class="nav-link text-warning mt-1 fs-6" href="#"
                  >Generar Reporte</a
                > -->
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning mt-1 fs-6" href="#"
                  >Visualizar Logs</a
                >
              </li>
            </ul>
          </div>
          <ul class="navbar-nav">
            <li class="nav-item text-end">
              <a class="nav-link" href="index.html"
                ><button class="btn btn-danger py-1" id="salir">
                  Cerrar sesion
                </button></a
              >
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div>
      <h1 class="text-center mt-3">Crear ajuste</h1>
    



    <table class="table table-dark">
    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Categoria</th>
                                <th>SubCategoria</th>
                                <th>Precio</th>
                                <th>Ajuste(%)</th>
                                <th>Precio ajustado</th>
                                <th>Opciones</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tbody>

    </table>

    <!-- <button type="button" class="btn btn-danger">Buscar Ajuste</button> -->
    

    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Buscar Ajuste
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Busqueda de ajuste</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambio</button>
      </div>
    </div>
  </div>
</div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Ajuste (Nombre)
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Busqueda de ajuste</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambio</button>
      </div>
    </div>
  </div>
</div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear Ajuste (Subcatgoria)
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Busqueda de ajuste</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        aaa
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambio</button>
      </div>
    </div>
  </div>
</div>



   <!-- Pie de Indicadores -->

    <br>
        <div id="iddivindicadores" class="fixed-bottom p-3 mb-2 bg-dark text-white">Indicador
            <div class="btn-group btn-group-toggle" >
                <label class="btn btn-light" id="idlabelventaverde">
                    
                </label>
                <label class="btn btn-dark" id="idlabelventarojo">
                    
                </label>
            </div>
        </div>
  </body>
</html>

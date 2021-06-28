<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="funciones.js"></script>
    <title>Empresa</title>
</head>

<body>
    <div class="container">
        <div class="container">
            <br>
            <form name="frmEmpresa" id="frmEmpresa" enctype="multipart/form-data" method="post">
                <table style="width: 60%" align="center" border="1" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th>Drirectorio empresas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>
                                <div class="form-group">
                                    <label for="txtNit">Nit</label>
                                    <input type="number" name="txtNit" id="txtNit" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <div class="form-group">
                                    <label for="txtNombres">Nombre Empresa</label>
                                    <input type="text" name="txtNombres" id="txtNombres" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <div class="form-group">
                                    <label for="txtTelC">Telefono Celular</label>
                                    <input type="number" name="txtTelC" id="txtTelC" value="" class="form-control" style="width: 100%" />
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <div class="form-group">
                                    <label for="cbDepartamento">Seleccione Departamento</label>
                                    <select id="cbDepartamento" name="cbDepartamento" class="form-control custom-select">
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <div class="form-group">
                                    <label for="cbMunicipio">Seleccione Municipio</label>
                                    <select id="cbMunicipio" name="cbMunicipio" class="form-control custom-select">
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <div class="form-group">
                                    <label for="txtCorreo">Correo</label>
                                    <input type="email" name="txtCorreo" id="txtCorreo" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <!-- <tr>

                            <td>
                                <div class="form-group">
                                    <label for="cbSectorE">Sector Economico</label>
                                    <select name="cbSectorE" id="cbSectorE" class="form-control">
                                        <option value="0">Seleccione</option>
                                        <option value="Comercio">Comercio</option>
                                        <option value="Servicios">Servicios</option>
                                        <option value="Transporte">Transporte</option>
                                    </select>
                                </div>
                            </td>

                        </tr> -->
                        <tr>
                            <td>
                                <div class="form-group">
                                <label for="txtDescripcion">Descripcion de la empresa</label>
                                        <input type="text" name="txtDescripcion" id="txtDescripcion" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                <label for="txtCIIU">Actividad CIIU</label>
                                        <input type="text" name="txtCIIU" id="txtCIIU" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                <label for="txtProSer">Productos o Servicios</label>
                                        <input type="text" name="txtProSer" id="txtProSer" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                <label for="txtEmpleados">Numero de empleados</label>
                                        <input type="number" name="txtEmpleados" id="txtEmpleados" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <div class="form-group">
                                    <label for="fileFoto">Foto</label>
                                    <input type="file" name="fileFoto" id="fileFoto" value="" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" value="Agregar" name="btnAgregar" id="btnAgregar" class="btn btn-success btn-m" />
                                <input type="button" value="Consultar" name="btnConsultar" id="btnConsultar" class="btn btn-success btn-m" />
                                <input type="button" value="Actualizar" name="btnActualizar" id="btnActualizar" class="btn btn-success btn-m" />
                                <input type="button" value="Eliminar" name="btnEliminar" id="btnEliminar" class="btn btn-success btn-m" />
                                <input type="button" value="Listar" name="btnListar" id="btnListar" class="btn btn-success btn-m" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--Campos ocultos -->
                <input type="hidden" value="" id="idEmpresa" name="idEmpresa">
                <input type="hidden" id="accion" name="accion" value="">
            </form>

            <p>
                <!-- div creado para mostrar mensajes -->
            <div id="mensaje" style="text-align: center">

            </div>

            <table id="tblEmpresa" align="center" class="table table-bordered" style="width: 80%;">
                <thead>
                    <tr class="bg-dark text-white" style="text-align: center">
                        <th>Nit</th>
                        <th>Nombre Empresa</th>
                        <th>Celular</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Correo</th>
                        <th>Descripión</th>
                        <th>Actividad</th>
                        <th>Servicios</th>
                        <th>Empleados</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="fila" class="primeraFila">
                        <td id="nit"></td>
                        <td id="nombre"></td>
                        <td id="celular"></td>
                        <td id="departamento"></td>
                        <td id="municipio"></td>
                        <td id="correo"></td>
                        <td id="descripcion"></td>
                        <td id="actividad"></td>
                        <td id="servicios"></td>
                        <td id="empleados"></td>
                        <td id="foto">
                            <img id="Fa" src="" width="50" height="50" />
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- The Modal -->
            <div class="modal" id="modalEliminar">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Encabezado -->
                        <div class="modal-header bg-info text-white">
                            <h4 class="modal-title">Eliminar Empresa</h4>
                            <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Contenido -->
                        <div class="modal-body">
                            ¿Está seguro de eliminar la Empresa?
                        </div>

                        <!-- Modal Pie Página -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" id="btnSiModal">Si</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
            </p>
        </div>
    </div>
</body>

</html>
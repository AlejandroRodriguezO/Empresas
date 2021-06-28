var primeraFila;

$(function() {

    primeraFila = $("#fila");
    listar();
    ListarDepartamentos();
    $("#cbDepartamento").change(function() {
        $("#cbMunicipio").empty();
        listarMunicipiosPorDepartamento();
    });

    $("#btnAgregar").click(function() {
        if ($("#txtNit").val() != "" && $("#txtNombres").val() != "" &&
            $("#txtTelC").val() != "" && $("#cbDepartamento").val() != "" &&
            $("#cbMunicipio").val() != "" && $("#txtCorreo").val() != "" &&
            $("#txtDescripcion").val() != "" && $("#txtCIIU").val() != "" &&
            $("#txtProSer").val() != "" && $("#txtEmpleados").val() != "" &&
            $("#fileFoto").val() != "") {
            agregar();
            listar()
        } else {
            alert("Complete los campos");
        }

    });

    $("#btnConsultar").click(function() {
        consultar();
    });

    $("#btnActualizar").click(function() {
        if ($("#idEmpresa").val() != "") {

            actualizar();
            listar();
        } else {
            alert("Debe primero consultar una Empresa");
        }
    });

    $("#btnEliminar").click(function() {
        if ($("#idEmpresa").val() != "") {
            $("#modalEliminar").modal();

        } else {
            $("#mensaje").html("Debe consultar primero");
        }
    });

    $("#btnSiModal").click(function() {
        eliminar();
        limpiar();
        listar();
    });
});


function agregar() {
    $("#mensaje").html("");
    $("#accion").val("Agregar");
    var formData = new FormData($("#frmEmpresa")[0]);
    $.ajax({
        url: "../Controlador/EmpresaController.php",

        data: formData,
        type: "post",
        dataType: "json",
        cache: false,

        contentType: false,
        processData: false,
        success: function(resultado) {
            console.log(resultado);
            if (resultado.estado) {
                limpiar();
                listar();
            }
            $("#mensaje").html(resultado.mensaje);
        },
        error: function(resultado) {
            console.log(resultado);
        }
    });
}

function consultar() {
    $("#idEmpresa").val("");
    var parametros = {
        "accion": "Consultar",
        "identifica": $("#txtNit").val()
    };
    $.ajax({
        url: "../Controlador/EmpresaController.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function(resultado) {
            console.log(resultado);
            if (resultado.estado) {
                $("#txtNit").val(resultado.datos.nit);
                $("#txtNombres").val(resultado.datos.nombre);
                $("#txtTelC").val(resultado.datos.celular);
                $("#cbDepartamento").val(resultado.datos.departamento);
                $("#cbMunicipio").val(resultado.datos.municipio);
                $("#txtCorreo").val(resultado.datos.correo);
                // $("#cbSectorE").val(resultado.datos.economico);
                $("#txtDescripcion").val(resultado.datos.descripcion);
                $("#txtCIIU").val(resultado.datos.actividad);
                $("#txtProSer").val(resultado.datos.servicios);
                $("#txtEmpleados").val(resultado.datos.empleados);
                $("#idEmpresa").val(resultado.datos.idEmpresa);

                $("#Fa").attr("src", "Fotos/" + resultado.nit + ".jpg");
            } else {
                $("#mensaje").html(resultado.mensaje);
            }
        },
        error: function(resultado) {
            console.log(resultado);
        }
    });
}


function actualizar() {
    $("#mensaje").html("");
    $("#accion").val("Actualizar");
    $.ajax({
        url: "../Controlador/EmpresaController.php",
        data: $("#frmEmpresa").serialize(),
        type: "post",
        dataType: "json",
        cache: false,
        success: function(resultado) {
            console.log(resultado);
            limpiar();
            $("#mensaje").html(resultado.mensaje);
        },
        error: function(resultado) {
            console.log(resultado);
        }
    });
}

function eliminar(idEmpresa) {
    $("#mensaje").html("");
    $("#accion").val("Eliminar");

    var parametros = {
        "accion": "Eliminar",
        "idEmpresa": $("#idEmpresa").val()
    }

    $.ajax({
        url: "../Controlador/EmpresaController.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function(resultado) {
            console.log(resultado);
            listar();
            if (resultado.estado) {
                $("#mensaje").html(resultado.mensaje);
            } else {
                alert(resultado);
            }
        }
    });
}

function listar() {
    $(".otraFila").remove();
    $("#tblEmpresa").append(primeraFila);
    var parametros = {
        "accion": "Listar"
    };
    $.ajax({
        url: "../Controlador/EmpresaController.php",
        data: parametros,
        type: "post",
        dataType: "json",
        cache: false,
        success: function(resultado) {
            console.log(resultado);
            var empresas = resultado.datos;
            $.each(empresas, function(i, empresa) {
                $("#nit").html(empresa.nit);
                $("#nombre").html(empresa.nombre);
                $("#celular").html(empresa.celular);
                $("#departamento").html(empresa.departamento);
                $("#municipio").html(empresa.municipio);
                $("#correo").html(empresa.correo);
                // $("#cbSectorE").val(resultado.datos.economico);
                $("#descripcion").html(empresa.descripcion);
                $("#actividad").html(empresa.actividad);
                $("#servicios").html(empresa.servicios);
                $("#empleados").html(empresa.empleados);
                $("#Fa").attr("src", "Fotos/" + empresa.nit + ".jpg");
                $("#tblEmpresa tbody")
                    .append($("#fila")
                        .clone(true)
                        .attr("class", "otraFila"));
            });
            //   $("#tblAprendices tbody tr").first().remove(); 
            $(".primeraFila").remove();

        },
        error: function(resultado) {
            console.log(resultado);
        }
    });

}

function ListarDepartamentos() {
    var datos = {
        "accion": "ListarDepartamentos"
    };
    $.ajax({
        url: "../Controlador/EmpresaController.php",
        data: datos,
        type: "post",
        dataType: "json",
        cache: false,
        success: function(resultado) {
            console.log(resultado);
            if (resultado.estado) {
                $.each(resultado.datos, function(i, depa) {
                    $('#cbDepartamento').append(
                        $('<option>', {
                            value: depa.idDepartamento,
                            text: depa.depNombre
                        })
                    )
                })
            }
        },
        error: function(resultado) {
            console.log(resultado);
        }
    });
}

function listarMunicipiosPorDepartamento() {
    var datos = {
        accion: "ListarMunicipiosPorDepartamento",
        cbDepartamento: $("#cbDepartamento").val()
    };

    $.ajax({
        url: "../Controlador/EmpresaController.php",
        data: datos,
        type: "post",
        dataType: "json",
        cache: false,
        success: function(resultado) {
            console.log(resultado);
            if (resultado.estado) {
                var municipios = resultado.datos;
                $.each(municipios, function(i, municipio) {
                    $('#cbMunicipio').append(
                        $('<option>', {
                            value: municipio.idMunicipio,
                            text: municipio.munNombre
                        })
                    );
                });
            }
        },
        error: function(resultado) {
            console.log(resultado);
        }
    });
}

/**
 * Limpiar los campos del formulario
 */
function limpiar() {
    $("#txtNit").val("");
    $("#txtNombres").val("");
    $("#txtTelC").val("");
    $("#bDepartamento").val("");
    $("#cbMunicipio").val("");
    $("#txtCorreo").val("");
    $("#txtDescripcion").val("");
    $("#txtCIIU").val("");
    $("#txtProSer").val("");
    $("#txtEmpleados").val("");
    $("#fileFoto").val("");
}
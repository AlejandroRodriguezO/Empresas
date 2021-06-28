<?php
extract($_REQUEST);
include "../Modelo/Empresa.php";
include "../Modelo/Conexion.php";
include "../Modelo/DatosEmpresa.php";
error_reporting(1);
$dEmpresa = new DatosEmpresa();

switch ($accion) {
    case "Agregar":
        $empresa = new Empresa($txtNit, $txtNombres, $txtTelC, $cbDepartamento, $cbMunicipio, $txtCorreo, $txtDescripcion, $txtCIIU, $txtProSer, $txtEmpleados);
        $resultado = $dEmpresa->agregar($empresa);
        if ($resultado->estado) {

            $fotos = $_FILES['fileFoto']['name'];
            $datosArchivo = explode(".", $fotos);
            $longitud = count($datosArchivo);
            $extension = strtolower($datosArchivo[$longitud - 1]);
            $nombreArchivoCopiar = $empresa->getNit() . "." . $extension;
            $ruta = "../Vista/Fotos/";
            $error = null;
            try {
                if ($extension == "jpg") {
                    move_uploaded_file(
                        $_FILES['fileFoto']['tmp_name'],
                        $ruta . $nombreArchivoCopiar
                    );
                } else {
                    $mensaje = "La foto no cumple con la extension";
                    $resultado->mensaje += " " . $mensaje;
                }
            } catch (Exception $ex) {
                echo $error = $ex->getMessage();
            }
        }
        echo json_encode($resultado);
        break;

    case "Consultar":
        $resultado = $dEmpresa->consultarPorNit($identifica);
        echo json_encode($resultado);
        break;

    case "Listar":
        $resultado = $dEmpresa->listar();
        echo json_encode($resultado);
        break;

    case "Actualizar":
        $empresa = new Empresa($txtNit, $txtNombres, $txtTelC, $cbDepartamento, $cbMunicipio, $txtCorreo, $txtDescripcion, $txtCIIU, $txtProSer, $txtEmpleados);
        $empresa->setIdEmpresa($idEmpresa);
        $resultado = $dEmpresa->actualizar($empresa);
        echo json_encode($resultado);
        break;

    case "Eliminar":
        $resultado = $dEmpresa->eliminar($idEmpresa);
        echo json_encode($resultado);
        break;

    case "ListarDepartamentos";
        $resultado = $dEmpresa->listarDepartamentos();
        
        echo json_encode($resultado);
        break;

    case "ListarMunicipiosPorDepartamento":
        $resultado = $dEmpresa->listarMunicipiosPorDepartamento($cbDepartamento);
        echo json_encode($resultado);
        break;
}

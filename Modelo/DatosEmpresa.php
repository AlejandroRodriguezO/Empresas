<?php
class DatosEmpresa
{
    private $miConexion;
    private $retorno;

    public function __construct()
    {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    public function agregar(Empresa $empresa)
    {
        try {
            $consulta = "insert into empresas value (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $empresa->getNit());
            $resultado->bindParam(2, $empresa->getNombre());
            $resultado->bindParam(3, $empresa->getCelular());
            $resultado->bindParam(4, $empresa->getDepartamento());
            $resultado->bindParam(5, $empresa->getMunicipio());
            $resultado->bindParam(6, $empresa->getCorreo());
            $resultado->bindParam(7, $empresa->getDescripcion());
            $resultado->bindParam(8, $empresa->getActividad());
            $resultado->bindParam(9, $empresa->getServicios());
            $resultado->bindParam(10, $empresa->getEmpleados());

            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = false;
            $this->retorno->mensaje = "Empresa agregada correctamente...";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    public function consultarPorNit($nit)
    {
        try {
            $consulta = "select * from empresas where nit=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $nit);
            $resultado->execute();
            if ($resultado->rowCount() > 0) {
                $this->retorno->estado = true;
                $this->retorno->datos = $resultado->fetchObject();
                $this->retorno->mensaje = "Datos del Empresa";
            } else {
                $this->retorno->estado = false;
                $this->retorno->datos = null;
                $this->retorno->mensaje = "NO existe Empresa con esa Nit";
            }
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    public function actualizar(Empresa $empresa)
    {
        try {
            $consulta = "update empresas set nit=?,
            nombre=?, celular=?, departamento=?,municipio=?,
            correo=?, descripcion=?, actividad=?, servicios=?, empleados=? where idEmpresa=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $empresa->getNit());
            $resultado->bindParam(2, $empresa->getNombre());
            $resultado->bindParam(3, $empresa->getCelular());
            $resultado->bindParam(4, $empresa->getDepartamento());
            $resultado->bindParam(5, $empresa->getMunicipio());
            $resultado->bindParam(6, $empresa->getCorreo());
            $resultado->bindParam(7, $empresa->getDescripcion());
            $resultado->bindParam(8, $empresa->getActividad());
            $resultado->bindParam(9, $empresa->getServicios());
            $resultado->bindParam(10, $empresa->getEmpleados());
            $resultado->execute();
            $this->retorno->estado = true;
            $this->retorno->datos = null;
            $this->retorno->mensaje = "empresa actualizado correctamente";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    public function listar()
    {
        try {
            $consulta = "select * from empresas";
            $resultado = $this->miConexion->query($consulta);
            $this->retorno->estado = true;
            $this->retorno->datos = $resultado->fetchAll();
            $this->retorno->mensaje = "Listado de Empresas";
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }

    /**
     * eliminar empresas de acuerdo a su id
     */
    public function eliminar($idEmpresa)
    {
        try {
            $consulta = "delete from empresas where idEmpresa=?";
            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $idEmpresa);
            $resultado->execute();
            if ($resultado->rowCount() > 0) {
                $this->retorno->estado = true;
                $this->retorno->datos = null;
                $this->retorno->mensaje = "Eliminado Correctamente";
            } else {
                $this->retorno->estado = false;
                $this->retorno->datos = null;
                $this->retorno->mensaje = "No existe empresa con esa nit";
            }
        } catch (PDOException $ex) {
            $this->retorno->estado = false;
            $this->retorno->datos = null;
            $this->retorno->mensaje = $ex->getMessage();
        }
        return $this->retorno;
    }
}

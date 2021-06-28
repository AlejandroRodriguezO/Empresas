<?php
class Empresa
{
    private $idEmpresa;
    private $nit;
    private $nombre;
    private $celular;
    private $departamento;
    private $municipio;
    private $correo;
    private $descripcion;
    private $actividad;
    private $servicios;
    private $empleados;

    public function __construct($nit = null, $nombre = null, $celular = null, $departamento = null, $municipio = null, $correo = null, $descripcion = null, $actividad = null, $servicios = null, $empleados = null)
    {
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->departamento = $departamento;
        $this->municipio = $municipio;
        $this->correo = $correo;
        $this->descripcion = $descripcion;
        $this->actividad = $actividad;
        $this->servicios = $servicios;
        $this->empleados = $empleados;
    }
    //set para asignar - get para obtener.

    public function getIdEmpresa(){
        return $this->idEmpresa;
    }
    public function setIdEmpresa($idEmpresa){
        $this->idEmpresa=$idEmpresa;
    }
    public function getNit()
    {
        return $this->nit;
    }
    public function setNit($nit)
    {
        $this->nit = $nit;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCelular()
    {
        return $this->celular;
    }
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    public function getDepartamento()
    {
        return $this->departamento;
    }
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }
    public function getMunicipio()
    {
        return $this->municipio;
    }
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    public function getCorreo()
    {
        return $this->correo;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getActividad()
    {
        return $this->actividad;
    }
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;
    }

    public function getServicios()
    {
        return $this->servicios;
    }
    public function setServicios($servicios)
    {
        $this->servicios = $servicios;
    }
    public function getEmpleados()
    {
        return $this->empleados;
    }
    public function setEmpleados($empleados)
    {
        $this->empleados = $empleados;
    }
}
?>

<?php
class Departamentos
{
    private $idDepartamento;
    private $nombreDepartamento;

    public function __construct($nombreDepartamento = null)
    {
        $this->nombreDepartamento = $nombreDepartamento;
    }

    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;
    }
    public function getNombre()
    {
        return $this->nombreDepartamento;
    }
    public function setNombre($nombreDepartamento)
    {
        $this->nombreDepartamento = $nombreDepartamento;
    }
}

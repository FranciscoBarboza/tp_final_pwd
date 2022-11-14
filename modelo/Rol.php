<?php

include_once '../Modelo/Conector/BaseDatos.php';
class Rol
{
    private $idrol;
    private $rodescripcion;
    private $mensajeFuncion;
    

    public function __construct()
    {
        $this->idrol = "";
        $this->rodescripcion = "";
       
    }

    public function cargar($idrol, $rodescripcion)
    {
        $this->setIdrol($idrol);
        $this->setRodescripcion($rodescripcion);
    }

    //Metodos de acceso
    public function getIdrol(){
        return $this->idrol;
    }

    public function setIdrol($idrol){
        $this->idrol = $idrol;
    }

    public function getRodescripcion(){
        return $this->rodescripcion;
    }

    public function setRodescripcion($rodescripcion){
        $this->rodescripcion = $rodescripcion;
    }

    public function getMensaje(){
        return $this->mensajeFuncion;
    }

    public function setMensajeFuncion($mensajeFuncion){
        $this->mensajeFuncion = $mensajeFuncion;
    }

    //Funciones BD

    //INSERTAR
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        //Creo la consulta 
        $consulta = "INSERT INTO rol (idrol, rodescripcion) VALUES (
            '" . $this->getIdrol() . "',
            '" . $this->getRodescripcion() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $resp = true;
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $resp;
    }

    //MODIFICAR
    public function modificar()
    {
        $base = new BaseDatos();
        $resp = false;
        $consulta = "UPDATE rol SET
        idrol= '".$this->getIdrol()."',
        rodescripcion = '".$this->getRodescripcion()."' 
        WHERE idrol = ".$this->getIdrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $resp = true;
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $resp;
    }
    
    //BUSCAR
    public function buscar($idrol)
    {
        $base = new BaseDatos();
        $resp = false;
        $consulta = "SELECT * FROM rol WHERE idrol =" . $idrol;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($rol = $base->Registro()) {
                    $this->setIdrol($idrol);
                    $this->setRodescripcion($rol['rodescripcion']);
                    $resp = true;
                }
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $resp;
    }

    //LISTAR
    public function listar($condicion = "")
    {
        $arregloRoles = null;
        $base = new BaseDatos();
        $consultaRol =  "SELECT * from rol ";
        if ($condicion != '') {
            $consultaRol = $consultaRol . ' WHERE ' . $condicion;
        }
        $consultaRol .= " ORDER BY idrol ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaRol)) {
                $arregloRoles = array();
                while ($rol = $base->Registro()) {
                    $objRol = new Rol();
                    $objRol->buscar($rol['idrol']);
                    array_push($arregloRoles, $objRol);
                }
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $arregloRoles;
    }

    //ELIMINAR
    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consulta = "DELETE FROM rol WHERE idrol =" . $this->getIdrol();
            if ($base->Ejecutar($consulta)) {
                $resp = true;
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $resp;
    }

    public function __toString(){
        return(
        "ID del rol: " . $this->getIdrol() . "\n 
        Detalles del rol: " . $this->getRodescripcion() . "\n");
    }
}
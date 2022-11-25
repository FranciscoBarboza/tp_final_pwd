<?php
include_once '../Modelo/Conector/BaseDatos.php';
class MenuRol{
    private $objMenu;
    private $objRol;
    private $mensajeFuncion;

    public function __construct()
    {
        $this->objMenu = new Menu();
        $this->objRol = new Rol();
    }

    public function cargar($objMenu, $objRol)
    {
        $this->setObjMenu($objMenu);
        $this->setobjRol($objRol);
    }

    //Metodos de acceso
    public function getObjRol(){
        return $this->objRol;
    }

    public function setObjRol($objRol){
        $this->objRol = $objRol;
    }

    public function getObjMenu(){
        return $this->objMenu;
    }

    public function setObjMenu($objMenu){
        $this->objMenu = $objMenu;
    }

    public function getMensajeFuncion(){
        return $this->mensajeFuncion;
    }

    public function setMensajeFuncion($mensajeFuncion){
        $this->mensajeFuncion = $mensajeFuncion;
    }

    //Funciones BD

    //INSERTAR
    public function insertar(){
        $base = new BaseDatos();
        $resp = false;
        
        //Creo la consulta 
        $consulta = "INSERT INTO menurol (idMenu, idRol) VALUES (
        '".$this->getObjMenu()->getObjMenu()."',
        '".$this->getObjRol()->getIdRol()."')"; 
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
        
        $consulta = "UPDATE menurol 
        SET 
        idMenu = '".$this->getObjRol()->getIdRol()."',
        idRol = ".$this->getObjMenu()->getIdMenu()."
        WHERE idMenu = ".$this->getObjMenu()->getIdMenu();
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
    public function buscar($idMenu)
    {
        $base = new BaseDatos();
        $resp = false;
        $consulta = "SELECT * FROM menurol WHERE idMenu = " . $idMenu;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($meRol = $base->Registro()) {
                    $this->setIdMenuRol($idMenu);
                    $ObjRol = new Rol();
                    $ObjRol->buscar($meRol['idRol']);
                    $this->setObjRol($ObjRol);
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
    public function listar($condicion = ''){
        $arrayMR = null;
        $base = new BaseDatos();
        $consultaMR =  "SELECT * from menurol";
        if ($condicion != '') {
            $consultaMR = $consultaMR . ' WHERE ' . $condicion;
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaMR)) {
                $arrayMR = array();
                while ($meRol = $base->Registro()) {
                    $objMenuRol = new MenuRol();
                    $objMenuRol->buscar($meRol['idMenu'], $meRol['idRol']);
                    array_push($arrayMR, $objMenuRol);
                }
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }

        return $arrayMR;
    }

    //ELIMINAR
    public function eliminar(){
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consulta = "DELETE FROM menurol WHERE idMenu= '". $this->getObjMenu()->getIdMenu()."' 
            AND idRol= " . $this->getObjRol()->getIdRol();
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

    public function __toString()
    {
        return (
            "ID menu: " . $this->getObjMenu()->getIdMenu() .
            "\n ID Rol: " . $this->getObjMenu()->getIdRol() . "\n" );
    }
}

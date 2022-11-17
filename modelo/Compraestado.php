<?php
include_once '../Modelo/conector/BaseDatos.php';


class CompraEstado{
    private $idCompraEstado;
    private $objCompra;
    private $objCompraEstadoTipo;
    private $ceFechaINI; 
    private $ceFechaFIN;
    private $mensajeFuncion;

    public function __construct()
    {
        $this->idCompraEstado = "";
        $this->objCompra = new Compra();
        $this->objCompraEstadoTipo = new CompraEstadoTipo();
        $this->ceFechaINI = '';
        $this->ceFechaFIN = "";
    }

    public function cargar($idCompraEstado, $objCompra, $objCompraEstadoTipo, $ceFechaINI, $ceFechaFIN)
    {
        $this->setIdCompraEstado($idCompraEstado);
        $this->setObjCompra($objCompra);
        $this->setObjCompraEstadoTipo($objCompraEstadoTipo);
        $this->setCeFechaINI($ceFechaINI);
        $this->setCeFechaFIN($ceFechaFIN);
    }

    public function getIdCompraEstado(){
        return $this->idCompraEstado;
    }

    public function setIdCompraEstado($idCompraEstado){
        $this->idCompraEstado = $idCompraEstado;
    }

    public function getObjCompra(){
        return $this->objCompra;
    }

    public function setObjCompra($objCompra){
        $this->objCompra = $objCompra;
    }

    public function getObjCompraEstadoTipo(){
        return $this->objCompraEstadoTipo;
    }

    public function setObjCompraEstadoTipo($objCompraEstadoTipo){
        $this->objCompraEstadoTipo = $objCompraEstadoTipo;
    }

    public function getCeFechaINI(){
        return $this->ceFechaINI;
    }

    public function setCeFechaINI($ceFechaINI){
        $this->ceFechaINI = $ceFechaINI;
    }

    public function getCeFechaFIN(){
        return $this->ceFechaFIN;
    }

    public function setCeFechaFIN($ceFechaFIN){
        $this->ceFechaFIN = $ceFechaFIN;
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
        //Asigno los datos a variables
        $idCompraEstado = $this->getIdCompraEstado();
        $idCompra = $this->getidCompra();
        $objCompraEstadoTipo = $this->getObjCompraEstadoTipo();
        $ceFechaINI = $this->getCeFechaINI();
        $ceFechaFIN = $this->getCeFechaFIN();


        //Creo la consulta 
        $consulta = "INSERT INTO compraestado (idCompraEstado, idCompra, idCompraEstadoTipo, ceFechaINI, ceFechaFIN) VALUES (
        '".$this->getIdCompraEstado()."',
        '".$this->getObjCompra()->getIdCompra()."',
        '".$this->getApellido()."',
        '".$this->getTelefono()."',
        '".$this->getObjViaje()->getIdviaje()."')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $resp = true;
            } else {
                $this->setCeFechaFIN($base->getError());
            }
        } else {
            $this->setCeFechaFIN($base->getError());
        }
        return $resp;
    }

    //MODIFICAR
    public function modificar()
    {
        $base = new BaseDatos();
        $resp = false;
        $idCompraEstado = $this->getIdCompraEstado();
        $idCompra = $this->getidCompra();
        $objCompraEstadoTipo = $this->getObjCompraEstadoTipo();
        $ceFechaINI = $this->getCeFechaINI();
        $ceFechaFIN = $this->getCeFechaFIN();

        $consulta = "UPDATE Compraestado SET idCompra = '{$idCompra}', objCompraEstadoTipo = '{$objCompraEstadoTipo}', ceFechaINI = '{$ceFechaINI}', ceFechaFIN = '{$ceFechaFIN}' WHERE idCompraEstado = '{$idCompraEstado}'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $resp = true;
            } else {
                $this->setCeFechaFIN($base->getError());
            }
        } else {
            $this->setCeFechaFIN($base->getError());
        }
        return $resp;
    }

    //BUSCAR
    public function buscar($idCompraEstado)
    {
        $base = new BaseDatos();
        $resp = false;
        $consulta = "SELECT * FROM Compraestado WHERE idCompraEstado = '" . $idCompraEstado . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($row2 = $base->Registro()) {
                    $this->setIdCompraEstado($row2['idCompraEstado']);

                    //Creo un objeto para buscar al id y setear el objeto
                    $compra = new Compra();
                    $compra->buscar($row2['idCompra']);
                    $this->setidCompra($compra);

                    $this->setObjCompraEstadoTipo($row2['objCompraEstadoTipo']);
                    //Creo un objeto para buscar al id y setear el objeto
                    $compraestadotipo = new Compraestadotipo();
                    $compraestadotipo->buscar($row2['objCompraEstadoTipo']);
                    $this->setObjCompraEstadoTipo($compraestadotipo);

                    $this->setCeFechaINI($row2['ceFechaINI']);
                    $this->setCeFechaFIN($row2['ceFechaFIN']);
                    $resp = true;
                }
            } else {
                $this->setCeFechaFIN($base->getError());
            }
        } else {
            $this->setCeFechaFIN($base->getError());
        }
        return $resp;
    }

    //LISTAR
    public function listar($condicion = '')
    {
        $array = null;
        $base = new BaseDatos();
        $consulta =  "select * from Compraestado";
        if ($condicion != '') {
            $consulta = $consulta . ' where ' . $condicion;
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $array = array();
                while ($row2 = $base->Registro()) {
                    $objCompraestado = new Compraestado();
                    $objCompraestado->buscar($row2['idCompraEstado']);
                    $array[] = $objCompraestado;
                }
            } else {
                $this->setCeFechaFIN($base->getError());
            }
        } else {
            $this->setCeFechaFIN($base->getError());
        }

        return $array;
    }

    //ELIMINAR
    public function eliminar()
    {
        $base = new BaseDatos();
        $rta = false;
        $consulta = "DELETE FROM Compraestado WHERE idCompraEstado = " . $this->getIdCompraEstado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $rta = true;
            } else {
                $this->setCeFechaFIN($base->getError());
            }
        } else {
            $this->setCeFechaFIN($base->getError());
        }
        return $rta;
    }

    public function __toString()
    {
        return "idCompraEstado: " . $this->getIdCompraEstado() .
            "\nidCompra: " . $this->getidCompra() .
            "\nobjCompraEstadoTipo: " . $this->getObjCompraEstadoTipo() .
            "\nDueño: " . $this->getCeFechaINI();
    }
    
}
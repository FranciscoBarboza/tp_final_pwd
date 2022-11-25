<?php
//TERMINADO (ver situación de modificar)
class Usuario
{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail; 
    private $usDeshabilitado;
    private $mensajeFuncion;

    public function __construct()
    {
        $this->idUsuario = "";
        $this->usNombre = "";
        $this->usPass = "";
        $this->usMail = '';
        $this->usDeshabilitado = "";
    }

    public function cargar($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado)
    {
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre);
        $this->setUsPass($usPass);
        $this->setUsMail($usMail);
        $this->setUsDeshabilitado($usDeshabilitado);
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getUsNombre(){
        return $this->usNombre;
    }

    public function setUsNombre($usNombre){
        $this->usNombre = $usNombre;
    }

    public function getUsPass(){
        return $this->usPass;
    }

    public function setUsPass($usPass){
        $this->usPass = $usPass;
    }

    public function getUsMail(){
        return $this->usMail;
    }

    public function setUsMail($usMail){
        $this->usMail = $usMail;
    }

    public function getUsDeshabilitado(){
        return $this->usDeshabilitado;
    }

    public function setUsDeshabilitado($usDeshabilitado){
        $this->usDeshabilitado = $usDeshabilitado;
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
        $base = new baseDatos();
        $resp = false;

        //Creo la consulta 
        $consulta = "INSERT INTO usuario (idUsuario, usNombre, usPass, usMail, usDeshabilitado) VALUES ('".$this->getIdUsuario()."', '".$this->getUsNombre()."',
        '".$this->getUsPass()."',
        '".$this->getUsMail()."',
        '".$this->getUsDeshabilitado()."')";
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
        $base = new baseDatos();
        $resp = false;
        
        //Hago consulta sql
        $consulta = "UPDATE usuario SET
        usNombre= '".$this->getUsNombre()."',
        usPass= '".$this->getUsPass()."',
        usMail= '".$this->getUsMail()."',
        usDeshabilitado = ".$this->getUsDeshabilitado()."
        WHERE idUsuario= ". $this->getIdUsuario();
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
    public function buscar($idUsuario)
    {
        $base = new baseDatos();
        $resp = false;
        $consulta = "SELECT * FROM usuario WHERE idUsuario = " .$idUsuario;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($usuario = $base->Registro()) {
                    $this->setIdUsuario($idUsuario);
                    $this->setUsNombre($usuario['usNombre']);
                    $this->setUsPass($usuario['usPass']);
                    $this->setUsMail($usuario['usMail']);
                    $this->setUsDeshabilitado($usuario['usDeshabilitado']);
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
    public function listar($condicion = '')
    {
        $arregloUsuarios = null;
        $base = new baseDatos();
        $consultaUsuario =  "SELECT * from usuario";
        if ($condicion != '') {
            $consultaUsuario = $consultaUsuario . ' WHERE ' . $condicion;
        }
        $consultaUsuario .= " ORDER BY idUsuario ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaUsuario)) {
                $arregloUsuarios = array();
                while ($usuario = $base->Registro()) {
                    $objUsuario = new Usuario();
                    $objUsuario->buscar($usuario['idUsuario']);
                    array_push($arregloUsuarios, $objUsuario);
                }
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $arregloUsuarios;
    }

    //ELIMINAR
    public function eliminar()
    {
        $base = new baseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consulta = "DELETE FROM usuario WHERE idUsuario = " . $this->getIdUsuario();
            if ($base->Ejecutar($consulta)){
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
            "ID del usuario: " . $this->getIdUsuario() ."\n Nombre del usuario: " . $this->getUsNombre() .
            "\n Contraseña del usuario: " . $this->getUsPass() .
            "\n Email del usuario: " . $this->getUsMail() . 
            "\n Usuario deshabilitado: " . $this->getUsDeshabilitado() . "\n");
    }
    
}
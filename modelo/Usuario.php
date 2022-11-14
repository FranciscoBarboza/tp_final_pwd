<?php
include_once '../Modelo/conector/BaseDatos.php';

/* CREATE TABLE `usuario` (
    `idusuario` bigint(20) NOT NULL,
    `usnombre` varchar(50) NOT NULL,
    `uspass` varchar(150) NOT NULL,
    `usmail` varchar(50) NOT NULL,
    `usdeshabilitado` timestamp NULL DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1; */
class Usuario
{
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail; 
    private $usdeshabilitado;
    private $mensajeFuncion;

    public function __construct()
    {
        $this->idusuario = "";
        $this->usnombre = "";
        $this->uspass = "";
        $this->usmail = '';
        $this->usdeshabilitado = "";
    }

    public function cargar($idusuario, $usnombre, $uspass, $usmail, $usdeshabilitado)
    {
        $this->setIdusuario($idusuario);
        $this->setUsnombre($usnombre);
        $this->setUspass($uspass);
        $this->setUsmail($usmail);
        $this->setUsdeshabilitado($usdeshabilitado);
    }

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }

    public function getUsnombre(){
        return $this->usnombre;
    }

    public function setUsnombre($usnombre){
        $this->usnombre = $usnombre;
    }

    public function getUspass(){
        return $this->uspass;
    }

    public function setUspass($uspass){
        $this->uspass = $uspass;
    }

    public function getUsmail(){
        return $this->usmail;
    }

    public function setUsmail($usmail){
        $this->usmail = $usmail;
    }

    public function getUsdeshabilitado(){
        return $this->usdeshabilitado;
    }

    public function setUsdeshabilitado($usdeshabilitado){
        $this->usdeshabilitado = $usdeshabilitado;
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
        $consulta = "INSERT INTO usuario (idusuario, usnombre, uspass, usmail, usdeshabilitado) VALUES ('".$this->getIdusuario()."', '".$this->getUsnombre()."',
        '".$this->getUspass()."',
        '".$this->getUsmail()."',
        '".$this->getUsdeshabilitado()."')";
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
        
        //Hago consulta sql
        $consulta = "UPDATE usuario SET
        idusuario= '".$this->getIdusuario()."',
        usnombre= '".$this->getUsnombre()."',
        uspass= '".$this->getUspass()."',
        usmail= '".$this->getUsmail()."',
        usdeshabilitado = ".$this->getUsdeshabilitado()."
        WHERE idusuario= ". $this->getIdusuario();
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
    public function buscar($idusuario)
    {
        $base = new BaseDatos();
        $resp = false;
        $consulta = "SELECT * FROM usuario WHERE idusuario = " .$idusuario;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($usuario = $base->Registro()) {
                    $this->setIdusuario($idusuario);
                    $this->setUsnombre($usuario['usnombre']);
                    $this->setUspass($usuario['uspass']);
                    $this->setUsmail($usuario['usmail']);
                    $this->setUsdeshabilitado($usuario['usdeshabilitado']);
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
        $base = new BaseDatos();
        $consultaUsuario =  "SELECT * from usuario";
        if ($condicion != '') {
            $consultaUsuario = $consultaUsuario . ' WHERE ' . $condicion;
        }
        $consultaUsuario .= " ORDER BY idusuario ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaUsuario)) {
                $arregloUsuarios = array();
                while ($usuario = $base->Registro()) {
                    $objUsuario = new Usuario();
                    $objUsuario->buscar($usuario['idusuario']);
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
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consulta = "DELETE FROM usuario WHERE idusuario = " . $this->getIdusuario();
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
            "ID del usuario: " . $this->getIdusuario() ."\n Nombre del usuario: " . $this->getUsnombre() .
            "\n Contraseña del usuario: " . $this->getUspass() .
            "\n Email del usuario: " . $this->getUsmail() . 
            "\n Usuario deshabilitado: " . $this->getUsdeshabilitado() . "\n");
    }
    
}
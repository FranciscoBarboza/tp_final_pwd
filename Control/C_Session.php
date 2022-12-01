<?php
class c_session{
    private $objUsuario;       

    public function getObjUsuario(){
        return $this->objUsuario;
    }

    public function setObjUsuario($objUsuario){
        $this->objUsuario = $objUsuario;
    }

    public function __construct(){
        session_start();
        $this->setObjUsuario(new c_usuario());
        
        if(isset($_SESSION["nombreUsuario"])){
            $usNombre["usNombre"] = $_SESSION["nombreUsuario"];
            $usuario = $this->getObjUsuario()->buscar($usNombre);
            $this->setObjUsuario($usuario[0]);
        }
    }

    private function iniciar($nombreUsuario, $arrayRoles){
        $_SESSION["nombreUsuario"] = $nombreUsuario;
        $_SESSION["roles"] = $arrayRoles;
        $objRol = new c_rol();
        $param = [2];
        $_SESSION["vista"] = $objRol->obtenerObj($param)[0];
    }

    public function validar($param){
        $arrayUsuario = $this->getObjUsuario()->buscar($param);
        $resp = false;
        if($arrayUsuario != null){
            if($param["usPass"] == $arrayUsuario[0]->getUsPass()){
                $this->setObjUsuario($arrayUsuario[0]);
                $arrayRoles = $this->getRol();
                $this->iniciar($param["usNombre"], $arrayRoles);
                $resp = true;
            }
        }
        return $resp;
    }

    public function activa(){
        $resp = isset($_SESSION["nombreUsuario"])? TRUE : FALSE;
        return $resp;
    }

   public function getUsuario(){
        $resp = null;
        if($this->getObjUsuario() != null){
            $resp = $this->getObjUsuario();
        }
        return $resp;
    }

    public function getRol(){
        $arrayRolesUsuario = null;
        if($this->getObjUsuario() != null){
            $objUsuarioRol = new c_usuarioRol();
            $param["idUsuario"] = $this->getObjUsuario()->getIdUsuario();
            $arrayRolesUsuario = $objUsuarioRol->buscar($param);
            $arrayRoles = [];
                foreach($arrayRolesUsuario as $rol){
                    array_push($idRoles, $rol->getRol());
                }
                $idRoles = [];
                    foreach($arrayRoles as $objRol){
                        array_push($idRoles, $objRol->getIdRol());
                    }
        }
        return $idRoles;
    }

    public function cerrar(){
        $cerrado = false;
        if(session_destroy()){
            $cerrado = true;
        }   
        return $cerrado;
    }

    /* public function getVista(){
        $resp = null;
        if($_SESSION["vista"] != null){
            $resp = $_SESSION["vista"];
        }
        return $resp;
    } */
}
?>

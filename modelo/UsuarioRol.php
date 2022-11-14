<?php
include_once '../Modelo/Conector/BaseDatos.php';
class UsuarioRol
{
    private $objUsuario;
    private $objRol;
    private $mensajeFuncion;

    public function __construct()
    {
        $this->objUsuario = new Usuario();
        // $this->objUsuario = '';
        $this->objRol = new Rol();
    }

    public function cargar($objUsuario, $objRol)
    {
        /* $this->setObjUsuario($objUsuario);
        $this->setObjRol($objRol); */
        $resp = false;
		if($this->ojbUsuario->Buscar($idusuario) && $this->ojbRol->Buscar($idrol)){
			$resp = true;
		}
		return $resp;
    }

    //Metodos de acceso
    public function getObjUsuario()
    {
        return $this->objUsuario;
    }

    public function setObjUsuario($objUsuario)
    {
        $this->objUsuario = $objUsuario;
    }

    public function getObjRol()
    {
        return $this->objRol;
    }

    public function setObjRol($objRol)
    {
        $this->objRol = $objRol;
    }

    public function getMensajeFuncion()
    {
        return $this->mensajeFuncion;
    }

    public function setMensajeFuncion($mensajeFuncion)
    {
        $this->mensajeFuncion = $mensajeFuncion;
    }

    //Funciones BD

    //INSERTAR
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        
        //Creo la consulta 
        $consulta = "INSERT INTO usuariorol (idusuario, idrol) VALUES ('".
        $this->getObjUsuario()->getIdusuario()."',
        '".$this->getObjRol()->getIdrol(). "')"; 
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
    /* public function modificar()
    {
        $base = new BaseDatos();
        $resp = false;
        $idusuariorol = $this->getIdusuariorol();
        $idusuario = $this->getIdusuario();
        $idrol = $this->getIdrol();
        $consulta = "UPDATE usuarioRol SET idusuario = '{$idusuario}', idrol = '{$idrol}' WHERE idusuariorol = '{$idusuariorol}'";
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
    public function buscar($idusuariorol)
    {
        $base = new BaseDatos();
        $resp = false;
        $consulta = "SELECT * FROM usuarioRol WHERE idusuariorol = '" . $idusuariorol . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($row2 = $base->Registro()) {
                    $this->setIdusuariorol($row2['idusuariorol']);

                    //Creo un objeto para buscar al id y setear el objeto
                    $usuario = new usuario();
                    $usuario->buscar($row2['idusuario']);
                    $this->setIdusuario($usuario);

                    //Creo un objeto para buscar al id y setear el objeto
                    $rol = new Rol();
                    $rol->buscar($row2['idrol']);
                    $this->setidrol($rol);
                    $resp = true;
                }
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $resp;
    } */

    //LISTAR
    public function listar($condicion = '')
    {
        $arregloUsuariosRoles = null;
        $base = new BaseDatos();
        $consultaUserRol =  "SELECT * from usuariorol ";
        if ($condicion != '') {
            $consultaUserRol = $consultaUserRol . ' WHERE ' . $condicion;
        }
        $consultaUserRol .= " ORDER BY idusuario ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaUserRol)) {
                $arregloUsuariosRoles = array();
                while ($usuarioRol = $base->Registro()) {
                    $objUsuarioRol = new UsuarioRol();
                    $objUsuarioRol->cargar($usuarioRol['idusuario'], $usuarioRol['idrol']);
                    array_push($arregloUsuarioRoles, $objUsuarioRol);
                }
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }

        return $arregloUsuariosRoles;
    }

    //ELIMINAR
    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consulta = "DELETE FROM usuariorol WHERE idusuario= '". $this->getObjUsuario()->getIdusuario()."' AND idrol= '" . $this->getObjRol()->getIdrol()."'";
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
            "ID del usuario: " . $this->getObjUsuario()->getIdusuario() .
            "\n ID rol: " . $this->getObjRol()->getIdrol() . "\n");
    }
}

<?php
include_once '../Modelo/Conector/BaseDatos.php';

/* CREATE TABLE `usuariorol` (
    `idusuario` bigint(20) NOT NULL,
    `idrol` bigint(20) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1; */
class UsuarioRol
{
    private $objUsuario;
    private $objRol;
    private $mensajeFuncion;

    public function __construct()
    {
        $this->objUsuario = new Usuario();
        // $this->objUsuario = ''; Es una alternativa
        $this->objRol = new Rol();
    }

    public function cargar($objUsuario, $objRol)
    {
        $this->setObjUsuario($objUsuario);
        $this->setObjRol($objRol); 
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
    public function modificar()
    {
        $base = new BaseDatos();
        $resp = false;
        $consulta = "UPDATE usuarioRol SET 
        idusuario = '".$this->getObjUsuario()->getIdusuario()."', 
        idrol = ".$this->getObjRol()->getIdrol()." 
        WHERE idusuario = ".$this->getObjUsuario()->getIdusuario();
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
        $consulta = "SELECT * FROM usuariorol WHERE idusuario = " . $idusuario;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                if ($usuarioRol = $base->Registro()) {
                    //Creo un objeto para buscar al id y setear el objeto
                    $objUsuario = new Usuario();
                    $objUsuario->buscar($usuarioRol['idusuario']);
                    $this->setObjUsuario($objUsuario);
                    $objRol = new Rol();
                    $objRol->buscar($usuarioRol['idrol']);
                    $this->setObjRol($objRol);
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
        $arregloUsuarioRol = null;
        $base = new BaseDatos();
        $consultaUserRol =  "SELECT * from usuariorol ";
        if ($condicion != '') {
            $consultaUserRol = $consultaUserRol . ' WHERE ' . $condicion;
        }
        $consultaUserRol .= " ORDER BY idusuario ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaUserRol)) {
                $arregloUsuarioRol = array();
                while ($usuarioRol = $base->Registro()) {
                    $objUsuarioRol = new UsuarioRol();
                    $objUsuarioRol->buscar($usuarioRol['idusuario'], $usuarioRol['idrol']);
                    array_push($arregloUsuarioRol, $objUsuarioRol);
                }
            } else {
                $this->setMensajeFuncion($base->getError());
            }
        } else {
            $this->setMensajeFuncion($base->getError());
        }
        return $arregloUsuarioRol;
    }

    //ELIMINAR
    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;
        if ($base->Iniciar()) {
            $consulta = "DELETE FROM usuariorol WHERE idusuario= '". $this->getObjUsuario()->getIdusuario()."' 
            AND idrol= " . $this->getObjRol()->getIdrol();
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

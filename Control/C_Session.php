<?php
class c_session{

    public function getIdUsuario(){
        if (isset($_SESSION['idUsuario'])) {
            return $_SESSION['idUsuario'];
        }
        return null;
    }

    public function setIdUsuario($idUsuario){
        $_SESSION['idUsuario'] = $idUsuario;
    }

    public function getUsNombre(){
        if(array_key_exists('usNombre', $_SESSION)){
            $param = $_SESSION['usNombre'];
        }
        else{
            $param = null;
        }
        return $param;
    }

    public function setUsNombre($usNombre){
        $_SESSION['usNombre'] = $usNombre;
    }

    public function getUsPass(){
        return $_SESSION['usPass'];
    }

    public function setUsPass($usPass){
        $_SESSION['usPass'] = $usPass;
    }

    /** CONSTRUCTOR **/
    public function __construct(){
        if (session_status() == 1) {
            session_start();
        }
        /* $objUsuario = new c_usuario();
        if (isset($_SESSION["nombreUsuario"])) {
            $usNombre["usNombre"] = $_SESSION["nombreUsuario"];
            $usuarioId = $objUsuario->buscar($usNombre);
            $this->setIdUsuario($usuarioId);
         if(session_status() == 1){
            session_start();
        } */
    }

    /** INICIAR **/
    public function iniciar($nombreUsuario, $passUsuario)
    {
        $this->setUsNombre($nombreUsuario);
        $this->setUsPass($passUsuario);
    }

    /** VALIDAR **/
    /* public function validar(){
        $inicia = false;
        $nombreUsuario = $this->getUsNombre();
        $passUsuario = $this->getUsPass();
        $controlUsuario = new c_usuario();
        $where = array();
        $filtro1 = array();
        $filtro1['usNombre'] = $nombreUsuario;
        $filtro2 = array();
        $filtro2['usPass'] = $passUsuario;
        $where['usNombre'] = $nombreUsuario;
        $where['usPass'] = $passUsuario;//solo guarda IDUSUARIO
        $listaUsuarios = $controlUsuario->buscar($where);
        $username = $controlUsuario->buscar($filtro1);
        $pass =  $controlUsuario->buscar($filtro2);
        $error = "";
        if ($username == null) {
            $error .= "Este usuario no existe";
        } elseif ($pass == null) {
            $error .= "Contraseña incorrecta";
        }
        if (is_array($listaUsuarios) && count($listaUsuarios) > 0) {
            if ($listaUsuarios[0]->getUsDeshabilitado() != '0000-00-00 00:00:00') {
                $error .= "El usuario está deshabilitado";
            } else {
                $inicia = true;
                $this->setIdUsuario($listaUsuarios[0]->getIdUsuario());
            }
        }
        return array($inicia, $error);
    } */

    public function validar(){
        $resp = false;
        if($this->activa() && isset($_SESSION['idusuario']))
            $resp=true;
        return $resp;
    }

    /** ACTIVA **/
    public function activa(){
        $resp = isset($_SESSION['nombreUsuario'])? true : false;
        return $resp;
    }

    /** GET USUARIO **/
    public function getUsuario(){
        $controlUsuario = new c_usuario();
        if(array_key_exists('idUsuario', $_SESSION)){
            $where = ['idUsuario' => $_SESSION['idUsuario']];
        }
        else{
            $where = [];
        }

        $listaUsuarios = $controlUsuario->buscar($where);
        if ($listaUsuarios >= 1) {
            $usuarioLog = $listaUsuarios[0];
        }
        return $usuarioLog;
    }


    /** GET ROL **/
    /* public function getRol(){
        $controlUsuario = new c_usuario();
        $usuario = $this->getUsuario();
        $idUsuario = $usuario->getIdUsuario();
        $param = ['idUsuario' => $idUsuario];
        $listaRolesUsu = $controlUsuario->buscar($param);
        if ($listaRolesUsu > 1) {
            $rol = $listaRolesUsu;
        } else {
            $rol = $listaRolesUsu[0];
        }
        return $rol;
    } */

    public function getRoles(){
        $usuarioActual = $this->getUsuario();
        $objUsuarioRol = new c_usuarioRol();
        $param = ['idUsuario' => $usuarioActual->getIdUsuario()];
        $listaRoles = $objUsuarioRol->buscar($param);
        return $listaRoles;
    }

    public function administrador()
    {
        $arrayRoles = $this->getRoles();
        $admin = false;
        $i = 0;
        while ($i < count($arrayRoles) && !$admin) {
            if ($arrayRoles[$i]->getObjRol()->getIdRol() == 1) {
                $admin = true;
            }
            $i++;
        }
        return $admin;
    }

    public function cliente()
    {
        $arrayRoles = $this->getRoles();
        $cliente = false;
        $i = 0;
        while ($i < count($arrayRoles) && !$cliente) {
            if ($arrayRoles[$i]->getObjRol()->getIdrol() == 2) {
                $cliente = true;
            }
            $i++;
        }
        return $cliente;
    }

    public function deposito()
    {
        $arrayRoles = $this->getRoles();
        $depo = false;
        $i = 0;
        while ($i < count($arrayRoles) && !$depo) {
            if ($arrayRoles[$i]->getObjRol()->getIdRol() == 3) {
                $depo = true;
            }
            $i++;
        }
        return $depo;
    }

    public function tienePermisos($pagina)
    {
        $tienePermisos = false;
        if ($this->activa()) {
            $tienePermisos= true;
        } else {
            $tienePermisos= false;
        }
        if (($this->administrador() && $pagina== "Administrador")||($this->cliente() && $pagina== "Cliente")||($this->deposito() && $pagina== "Deposito")) {
            $tienePermisos= true;
        } else {
            $tienePermisos= false;
        }
        return $tienePermisos;
    }

    /** CERRAR **/
    public function cerrar()
    {
        $cerrado = false;
        if (session_destroy()) {
            $cerrado = true;
        }
        return $cerrado;
    }
}
?>

<?php
include_once '../Modelo/Usuario.php';

class C_Usuario
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Usuario
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idusuario', $param)) {

            $obj = new Usuario();
            $obj->cargar(
                $param['idusuario'],
                $param['usnombre'],
                $param['uspass'],
                $param['usmail'],
                $param['usdeshabilitado'],
            );
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de 
     * las variables instancias del objeto que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idusuario'])) {
            $obj = new Usuario();
            $obj->cargar($param['idusuario'], null, null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idusuario']))
            $resp = true;
        return $resp;
    }

    /**
     * Inserta un objeto
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $obj = $this->cargarObjeto($param);
        if ($obj != null and $obj->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $obj = $this->cargarObjetoConClave($param);
            if ($obj != null and $obj->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $obj= $this->cargarObjeto($param);
            if($obj!=null && $obj->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true "; 
        if ($param<>NULL){
            $where .= '';
            if  (isset($param['idusuario']))
                $where.=" and idusuario ='".$param['idusuario']."'"; 
            if  (isset($param['usnombre']))
                    $where.=" and usnombre ='".$param['usnombre']."'";
            if  (isset($param['uspass']))
                    $where.=" and uspass ='".$param['uspass']."'";
            if  (isset($param['usmail']))
                    $where.=" and usmail ='".$param['usmail']."'";
            if  (isset($param['usdeshabilitado']))
                    $where.=" and usdeshabilitado ='".$param['usdeshabilitado']."'";
        }
        $obj = new Usuario();
        $arreglo =  $obj->listar($where);  
        
        return $arreglo;
    }
}
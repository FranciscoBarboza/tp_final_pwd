<?php
class c_producto
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Producto
     */
    private function cargarObjeto($param)
    {
        $objProducto = null;
        if (array_key_exists('idProducto', $param)) {

            $objProducto = new Producto();
            $objProducto->cargar(
                $param['idProducto'],
                $param['proNombre'],
                $param['proDetalle'],
                $param['proCantStock'],
                $param['proPrecio'],
                $param['urlImagen']
            );
        }
        return $objProducto;
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
        if (isset($param['idProducto'])) {
            $obj = new Producto();
            $obj->cargar($param['idProducto'], null, null, null, null, null);
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
        if (isset($param['idProducto']))
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
        $param['idProducto'] = null;
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
            if  (isset($param['idProducto']))
                $where.=" and idProducto ='".$param['idProducto']."'"; 
            if  (isset($param['proNombre']))
                    $where.=" and proNombre ='".$param['proNombre']."'";
            if  (isset($param['proDetalle']))
                    $where.=" and proDetalle ='".$param['proDetalle']."'";
            if  (isset($param['proCantStock']))
                    $where.=" and proCantStock ='".$param['proCantStock']."'";
            if  (isset($param['proPrecio']))
                    $where.=" and proPrecio ='".$param['proPrecio']."'";
            if  (isset($param['urlImagen']))
                    $where.=" and urlImagen ='".$param['urlImagen']."'";
        }
        $obj = new Producto();
        $arreglo =  $obj->listar($where);  
        
        return $arreglo;
    }

    /* public function validar_stock($idProducto,$cantidad){

        if($idProducto == null || $idProducto == '' ){
            return false;
        }

        $obj = new Producto();
        //return un booleano
        return $obj->validar_stock($idProducto, $cantidad);


    } */
}
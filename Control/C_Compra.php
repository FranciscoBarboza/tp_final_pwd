<?php
class c_compra
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Compra
     */
    public function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idcompra', $param)) {

            $obj = new Compra();
            $obj->cargar(
                $param['idcompra'],
                $param['cofecha'],
                $param['idusuario']
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
        if (isset($param['idcompra'])) {
            $obj = new Compra();
            $obj->cargar($param['idcompra'], null, null);
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
        if (isset($param['idcompra']))
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
            if  (isset($param['idCompra']))
                $where.=" and idCompra ='".$param['idcompra']."'"; 
            if  (isset($param['coFecha']))
                    $where.=" and coFecha ='".$param['cofecha']."'";
            if  (isset($param['idUsuario']))
                    $where.=" and idUsuario ='".$param['idusuario']."'";
        }
        $obj = new Compra();
        $arreglo =  $obj->listar($where);  
        
        return $arreglo;
    }

    public function obtener_compra_borrador_de_usuario($id_usuario){
        $obj_compra = new C_Compra();
        $compra_borrador = null;

        //Respuesta para marti, no se usaar el listar si vos sabes usarlo y esta segura de que va a andar cambialo xd
        // yo lo hice como pude sin entender nwn


        //acá querés encontrar un array de compras? no te convendría usar listar("idusuario = '$id_usuario'") para que te retorne un array con todas las compras del usuario?
        $compras_usuario = $obj_compra->buscar(array('idusuario' =>$id_usuario));

		if(is_array($compras_usuario) && $compras_usuario != null){
			foreach($compras_usuario as $compra){
				$estado = new C_Compraestado();
                //acá creo que te sería útil hacer lo mismo de antes listar("idcompra = $compra->getIdcompra(), idcompraestadotipo = 0, cefechafin = NULL"), creo que así funciona
                //tal vez las comillas no estén del todo bien, me basé en cómo usé el listar en el tp final de ipoo jeje 
				$estado_borrador = $estado->buscar(array('idcompra' => $compra->getIdcompra(), 'idcompraestadotipo' => 0,'cefechafin' => NULL ));
	
				if( $estado_borrador != null && $estado_borrador[0]->getCefechafin() == '0000-00-00 00:00:00'){
					$compra_borrador = $obj_compra->buscar(array('idcompra' =>$compra->getIdcompra(),'idusuario' =>$id_usuario));
				}
			}
		}

        return $compra_borrador;
    }


    /**
     * busca todas las compras con estado iniciado y con la fechaFIN en 0000-00-00 00:00:00
     * @param int $id_usuario
     */
    public function buscarComprasEstadosIniciadofalso($id_usuario){
        $obj_Ccompra= new c_compra();
        $compra_iniciada= null;

        $compras_usuario= $obj_Ccompra->buscar(['idUsuario'=>$id_usuario]);//le doy a buscar compra jeje

        if (is_array($compras_usuario) && $compras_usuario != null) {
            foreach($compras_usuario as $compra){
                $estado = new c_compraEstado();


                $estado_iniciado= $estado->buscar(['idCompra' => $compra->getIdCompra(), 'idCompraEstadoTipo'=> 0, 'ceFechaFin'=> NULL]);

                if ($estado_iniciado != null && $estado_iniciado[0]->getCeFechaFIN()== '0000-00-00 00:00:00') {
                    $compra_iniciada= $obj_Ccompra->buscar(['idCompra'=>$compra->getIdCompra(),'idUsuario'=>$id_usuario]);
                }

            }
        }

        return $compra_iniciada;
    }


    /**
     * crea una nueva compra con un id de usuario
     */
    public function crearNuevaCompra($id_usuario){
        $objUsuario= new c_usuario();
        $objUsuario->buscar(["idUsuario" => intval($id_usuario)]);
        $objcompra= new Compra();
        $objcompra->cargar("DEFAULT","DEFAULT", $objUsuario[0]->getIdUsuario());

        $objcompra->insertar();
    }

    public function buscarUltimaCompraCreada(){
        $objCompra= new Compra();
        $objCompra->listar("`idCompra` = (SELECT MAX(idCompra) FROM compra)");
        return $objCompra[0];
    }
}
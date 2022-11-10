<?
class BaseDatos extends PDO{
    private $engine;
    private $host;
    private $databse;
    private $user;
    private $pass;
    private $debug;
    private $conec;
    private $indice;
    private $resultado;
    

    public function __construct()
    {
        $this->engine= 'mysql';
        $this->host= 'localhost';
        $this->database= 'infoautos';
        $this->user= 'root';
        $this->pass= '';
        $this->debug= 'true';
        $this->error='';
        $this->sql= '';
        $this->indice= 0;

        $dns= $this->engine. ':dbname='.$this->databse.';host='. $this->host;

        try{
            parent::__construct($dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->conec= true;
        } catch(PDOException $e) {
            $this->sql = $e->getMessage();
            $this->conec=false;
        }
    }

   

    //get and setters
    public function getEngine(){
        return $this->engine;
    }
    public function setEngine($engine){
        $this->engine = $engine;
    }

    public function getHost(){
        return $this->host;
    }
    public function setHost($host){
        $this->host = $host;
    }

    public function getDatabse(){
        return $this->databse;
    }
    public function setDatabse($databse){
        $this->databse = $databse;
    }

    public function getUser(){
        return $this->user;
    }
    public function setUser($user){
        $this->user = $user;
    }

    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        $this->pass = $pass;
    }

    public function getDebug(){
        return $this->debug;
    }
    public function setDebug($debug){
        $this->debug = $debug;
    }

    public function getConec(){
        return $this->conec;
    }
    public function setConec($conec){
        $this->conec = $conec;
    }

    public function getIndice(){
        return $this->indice;
    }
    public function setIndice($indice){
        $this->indice = $indice;
    }

    public function getResultado(){
        return $this->resultado;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    //importeantes
    public function getError(){
        return "\n".$this->error;
    }
    public function setError($error){
        $this->error = $error;
    }

    public function setSQL($e){
        return "\n". $this->sql = $e;
    }

    public function getSQL(){
        return "\n". $this->sql;
    }

    //##############################################

    /**
     * inicia la coneccion con el servidor y la base datos mysql.
     * Retorna true si la coneccion con el servidor se puso establecer
     * y false en caso contrario
     * 
     * @return boolean
     */
    public function Iniciar(){
        return $this->getConec();
    }

private function analizarDebug(){
    $e= $this->errorInfo();
    $this->setError($e);
    if($this->getDebug()){
        echo "<pre>";
        print_r($e);
        echo "</pre>";
    }
}

private function EjecutarDeleteUpdate($sql){
    $cantFilas= -1;
    $resultado= parent::query($sql);
    if (!$resultado){
        $this->analizarDebug();
    } else {
        $cantFilas = $resultado->rowCount();
    }
    return $cantFilas;
}

private function EjecutarSelect($sql){
    $cant= -1;
    $resultado = parent::query($sql);
    if(!$resultado){
        $this->analizarDebug();
    }else{
        $arregloResult= $resultado->fetchAll();
        $cant = count($arregloResult);
        $this->setIndice(0);
        $this->setResultado($arregloResult);
    }
    return $cant;
}

private function EjecutarInsert($sql){
    $resultado= parent::query($sql);
    if (!$resultado) {
        $this->analizarDebug();
        $id= 0;
    } else {
        $id = $this->lastInsertId();
        if ($id==0) {
            $id=-1;
        }
    }
    return $id;
}
    //ejecutar
    public function Ejecutar($sql){
        $this->setError("");
        $this->setSQL($sql);
        if (stristr($sql, "insert")){// se desea INSERT?
            $resp =$this->EjecutarInsert($sql);
        }
        //se desea UPDATE o DELETE
        if( stristr($sql, "update") OR stristr($sql, "delete")){
            $resp = $this->EjecutarDeleteUpdate($sql);
        }

        //se desea ejecutar un select
        if(stristr($sql, "select")){
            $resp = $this->EjecutarSelect($sql);
        }
        return $resp;
    }
    //registro

    /** devuelve un registro retornado por la ejecucion de una consulta
     * el puntero se desplaza al siguiente registro de la consulta
     * 
     * @return array
     */
    public function Registro(){
        $filaActual= false;
        $indiceActual= $this->getIndice();
        if($indiceActual>=0){
            $filas = $this->getResultado();
            if ($indiceActual>=0) {
                $filaActual = $filas[$indiceActual];

                $indiceActual++;
                $this->setIndice($indiceActual);
            } else {
                $this->setIndice(-1);
            }

        }

        return $filaActual;
    }

}
?>
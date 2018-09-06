<?php
/*-------------------------
Autor: Obed Alvarado
Web: obedalvarado.pw
Mail: info@obedalvarado.pw
---------------------------*/
define('DB_HOST', 'naturlifeec.com');//DB_HOST:  generalmente suele ser "127.0.0.1"
define('DB_USERNAME', 'naturlifeec');//Usuario de tu base de datos
define('DB_PASS', 'natur2017');//Contraseña del usuario de la base de datos
define('DB_NAME', 'naturlif_sys');//Nombre de la base de datos
define('DB_PORT', '3306');//Nombre de la base de datos
# conectare la base de datos

//Clase connect para base de datos POO
class Connect extends mysqli
{
//Constructor enviamos las constantes y verificamos si la base de datos no muere
    public function __construct(){
        parent::__construct(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME,DB_PORT);
        $this->query("SET NAMES 'utf-8';");

        $this->connect_errno ? die('Error con la Base de Datos') : 'Conect';
    }
    //Creamos funciones para acortar
    public function obnum($x){
       return mysqli_num_rows($x);
    }
    public function sql($x){
       return $this->query($x);
    }


    public function insertar($ntable, $array)
    {
        $setvalues = '(';
        $values = '(';
        foreach ($array as $key => $value) {

            $setvalues .= "`".$key."`,";
            $values .= $value.',';
            
        }
        $setvalues= substr($setvalues, 0, -1);
        $setvalues .= ')';

        $values= substr($values, 0, -1);
        $values .= ')';

        echo "INSERT INTO ".$ntable." ".$setvalues." VALUES ".$values.";";
    }


}

?>


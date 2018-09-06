<?php
class Ingresarproducto
{

    //declaramos las variables a usar
    public $string;
    public $img;


//agregamos las variables al constructor y las seteamos
    public function __construct($string,$img){
        $this->string = $string;
        $this->img = $img;
    }

    public function ingre(){
        $db = new Connect();
        mysqli_set_charset($db,"utf8");
        date_default_timezone_set('America/Guayaquil');
            
           $arrayval = $this->string;
           $arrayval2 = $this->img;
           //linproducto
           $linproducto = $arrayval['lincodigo'];
           //obtenemos el codigo de linproducto
          $lincodigo = $this->reconocimiento('linproducto',$linproducto,'lindescrip','lincodigo');
           $medproducto = $arrayval['medcodigo'];
           $medcodigo = $this->reconocimiento('medproducto',$medproducto,'meddescri','medcodigo');
           $marproducto = $arrayval['marcodigo'];
           $marcodigo = $this->reconocimiento('marproducto',$marproducto,'mardescri','marcodigo');
           $preproducto = $arrayval['precodigo'];
           $precodigo = $this->reconocimiento('preproducto',$preproducto,'predescri','precodigo');
           $descrip = $arrayval2['descrip'];
           $usrcodigo = $arrayval['usrcodigo'];
           $costo = $arrayval2['costo'];
           $pvp1 = $arrayval2['pvp1'];
           $pvp2 = $arrayval2['pvp2'];
           $regsan = $arrayval2['regsan'];
           $barcode = $arrayval2['barcode'];
           $stock = $arrayval2['stock'];
           $pais = $arrayval['pais'];
           $imgproducto = $arrayval2['imgproducto'];
           $resultttt="";
           if($imgproducto == ""){
               $resultttt = "No hay Imagen";
           }else{
                           $sql2 = "INSERT into imgproducto values ('','','$imgproducto','". date('Y-m-d H:i:s')."','$usrcodigo','','','','')";
           $query2 = $db->sql($sql2);
           $sql = "INSERT into producto values ('','$descrip','$lincodigo','$marcodigo','$precodigo','$medcodigo','$db->insert_id'"
                   . ",'$barcode','$costo','$pvp1','$pvp2','','$pais','$regsan','$regsan','','','ACTIVO','$stock','". date('Y-m-d H:i:s')."','$usrcodigo','','','','')";
           $query = $db->sql($sql);
           $resultttt = $db->insert_id;
           }

           
           return array("$resultttt");

        $db->close();
    }
    public function reconocimiento($nombretable,$valortabla,$wheretable,$codetable){
                $db = new Connect();
//funcion donde reconoce el codigo del producto desde su descripcion
        $sql = "SELECT * FROM $nombretable where $wheretable='$valortabla';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if($num != 0){
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            
                            $result = $row[$codetable];
                            
                        }
                       
                                        }
                                                $db->close();

                                        return $result;
    }
}
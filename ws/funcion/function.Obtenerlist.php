<?php
class Obtenerlist
{

    //declaramos las variables a usar
    public $string;


//agregamos las variables al constructor y las seteamos
    public function __construct($string){
        $this->string = $string;
    }

    public function list1(){
        $db = new Connect();
        mysqli_set_charset($db,"utf8");
        date_default_timezone_set('America/Guayaquil');


            switch ($this->string){
                case '1':
                    $sql = 'SELECT * FROM linproducto where linstatus="ACTIVO";';
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if($num != 0){
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            $result[]= array(
                                'lindescrip' => $row['lindescrip'],
                                'lincodigo' => $row['lincodigo'],
                                'linnivel' => $row['linnivel']
                            );
                        }

                        return $result;
                    }else{
                        $result[]= array('lindescrip' => 'N');
                        return $result;
                    }
                    break;
                case '2':
                    $sql = 'SELECT * FROM preproducto where prestatus="ACTIVO";';
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if($num != 0){
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            $result[]= array(
                                'predescri' => $row['predescri'],
                                'precodigo' => $row['precodigo']
                            );
                        }

                        return $result;
                    }else{
                        $result[]= array('predescri' => 'N');
                        return $result;
                    }
                    break;
                case '3':
                    $sql = 'SELECT * FROM medproducto where marstatus="ACTIVO";';
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if($num != 0){
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            $result[]= array(
                                'meddescri' => $row['meddescri'],
                                'medcodigo' => $row['medcodigo']
                            );
                        }

                        return $result;
                    }else{
                        $result[]= array('meddescri' => 'N');
                        return $result;
                    }
                    break;
                case '4':
                    $sql = 'SELECT * FROM marproducto where marstatus="ACTIVO";';
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if($num != 0){
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            $result[]= array(
                                'mardescri' => $row['mardescri'],
                                'marcodigo' => $row['marcodigo']
                            );
                        }

                        return $result;
                    }else{
                        $result[]= array('mardescri' => 'N');
                        return $result;
                    }
                    break;
            }


        $db->close();
    }
}
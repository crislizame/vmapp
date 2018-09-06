<?php
class Login
{
    //declaramos las variables a usar
    public $cedula;
    public $pass;
    public $tipo;

//agregamos las variables al constructor y las seteamos
    public function __construct($cedula,$pass,$tipo){
        $this->cedula = $cedula;
        $this->pass = md5($pass);
    }
//creamos la SQL para validar datos OJO:no tiene md5, incluir md5
    public function login(){
        $db = new Connect();
        mysqli_set_charset($db,"utf8");
        date_default_timezone_set('America/Guayaquil');
        $sql = 'SELECT * FROM usuarios 
                WHERE usrnombre="'.$this->cedula.'" and 
                usrclave="'.$this->pass.'"';
        $query = $db->sql($sql);
        $num = $db->obnum($query);
        $row = $query->fetch_array(MYSQLI_ASSOC);
        if($num != 0){
            $hoy = date('Y-m-d H:m:s');
            if($row['usrstatus']==1){
            $nuevo = 0;
                $sql2 = 'SELECT * FROM empleado WHERE emcodigo ="'.$row['emcodigo'].'";';
                $query2 = $db->sql($sql2);
                $row2 = $query2->fetch_array(MYSQLI_ASSOC);
                $sql4 = 'SELECT * FROM cargos WHERE cargocodigo ="'.$row2['cargocodigo'].'";';
                $query4 = $db->sql($sql4);
                $row4 = $query4->fetch_array(MYSQLI_ASSOC);
                if(strtotime($row['usringsys']) == false){
                    $nuevo = 1;
                    $sql2 = 'UPDATE usuarios set usringsys = "'.$hoy.'" WHERE usrcodigo ="'.$row['usrcodigo'].'";';
                    $query2 = $db->sql($sql2);
                }else{
                    $nuevo = 0;


                    $sql2 = 'UPDATE usuarios set usringsys = "'.$hoy.'" WHERE usrcodigo ="'.$row['usrcodigo'].'";';
                    $query2 = $db->sql($sql2);

                }

                $result[]= array('login' => '1',
                    'usrcodigo' => $row['usrcodigo'],
                    'usrnombre' => $row['usrnombre'],
                    'emnombres' => $row2['emnombres'],
                    'cargocodigo'=> $row2['cargocodigo'],
                    'cargotexto'=> $row4['cargodescrip'],
                    'usrcorreo'=> $row['usrcorreo'],
                    'emcedula'=> $row2['emcedula'],
                    'usringsys' => date('d-m-Y H:m:s', strtotime($row['usringsys'])),
                    'nuevo' => $nuevo);



                //da 1 si el usuario agregó correctamente los datos y no esta baneado
                return $result;
            }else{
                //usuario baneado o bloqueado
                $result[]= array('login' => '3');
                return $result;
            }

        }else{
            //datos incorrecto o no existe
            $result[]= array('login' => '2');
            return $result;
        }
        //cierra la base de datos
        $db->close();
    }




}

<?php
class Pedido
{

    //declaramos las variables a usar
    public $img;


//agregamos las variables al constructor y las seteamos
    public function __construct($img){
        $this->img = $img;
    }

    public function consultarcliente(){
        $db = new Connect();
        mysqli_set_charset($db,"utf8");
        date_default_timezone_set('America/Guayaquil');
          $valores = $this->img;
          $ci = trim($valores['cliruc']);
          $result = null;
                    $sql = "SELECT * FROM cliente where cliruc like '%".$ci."%';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if($num != 0){
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            
                            $result[] = array("clinombre"=>$row['clinombre'],
                                "clicodigo"=>$row['clicodigo'],
                                'cliruc'=>$row['cliruc']);

                            
                        }
                       
                                        }
           
           return $result;

        $db->close();
    }
    public function verificarcliente(){
        $db = new Connect();
        mysqli_set_charset($db,"utf8");
        date_default_timezone_set('America/Guayaquil');
          $valores = $this->img;
          $codigo = trim($valores['clicodigo']);
          $result = null;
                    $sql = "SELECT * FROM pxp_cliente where clicodigo like '".$codigo."' and pxp_pagada like '0' and pxp_estado like '1';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                     $resultadopagada = $num>0 ? "NO" : "SI";
                     $sql = "SELECT * FROM pxp_cliente where clicodigo like '".$codigo."' and pxp_estado like '1';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    $resultadocompras = $num;
                    $sql = "SELECT * FROM pxp_cliente where clicodigo like '".$codigo."' and pxp_pagada like '0';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    $resultadoimpagas = $num;
                    $sql = "SELECT * FROM cliente where clicodigo = '".$codigo."';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    $row = $query->fetch_array(MYSQLI_ASSOC);
                    $resultadocre = $row['clicupocre'];
                    $result[] = array('pagadas'=>$resultadopagada,
                        'compras'=>$resultadocompras,
                        'impagas'=>$resultadoimpagas,
                        'cupo' => $resultadocre);
           return $result;

        $db->close();
    }
        public function obtenerproductos(){
        $db = new Connect();
        mysqli_set_charset($db,"utf8");
        date_default_timezone_set('America/Guayaquil');
          $valores = $this->img;
          $codigo = trim($valores['clicodigo']);
        $result = null;
                    $sql = "SELECT * FROM producto where artstatus like '%ACTIVO%';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                     
                    if($num != 0){
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            $sql2 = "SELECT * FROM imgproducto where imgcodigo = '".$row['imgcodigo']."';";
                    $query2 = $db->sql($sql2);
                    //$num = $db->obnum($query2);
                    $row2 = $query2->fetch_array(MYSQLI_ASSOC);
                            $result[] = array("titulo"=>$row['artdescri'],
                                "precio"=>$row['artprecventa1'],
                                "code"=>$row['artcodigo'],
                                'stock'=>$row['artstock']);

                            
                        }
                       
                                        }
                        return $result;

        $db->close();
    }
}
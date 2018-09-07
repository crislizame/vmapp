<?php
class Pedido
{

    //declaramos las variables a usar
    public $img;


//agregamos las variables al constructor y las seteamos
    public function __construct($img){
        $this->img = $img;
    }

    public function verpedidos()
    {
        $id = $this->img;

        $db = new Connect();
        mysqli_set_charset($db, "utf8");
        date_default_timezone_set('America/Guayaquil');

        $sql = 'SELECT * from pedidos_cabecera where pecusrinsys="'.$id.'";';
        $query = $db->sql($sql);
        while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
            $pednumped = $row['pednumped'];
            $fecha = $row['pecfecemi'];
            $nombre = $row['clinombre'];

        $sql2 = 'SELECT * from pedidos_detalle where pednumped="'.$pednumped.'";';
        $query2 = $db->sql($sql2);
        $num2 = $db->obnum($query2);    
        $roww = $query2->fetch_array(MYSQLI_ASSOC);
        $pedvaltot = $roww['pedvaltot'];
        $sql22 = 'SELECT * from pxp_cliente where pednumped="'.$pednumped.'";';
        $query22 = $db->sql($sql22);
        $num22 = $db->obnum($query22);
         $roww2 = $query2->fetch_array(MYSQLI_ASSOC);
         switch ($num22) {
             case '0':
                $estado = 'p';
                 break;
             default:
                 $estado = $roww2['pxp_estado'];
                 break;
         }
                $result[] = array(
                    "pednumped"=> $pednumped,
                    "fecha"=> $fecha,
                    "nombre"=> $nombre,
                    "estado"=> $estado,
                    "pedvaltot"=> $pedvaltot
                );

        }
        return $result;


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
<?php
class Pedido
{

    //declaramos las variables a usar
    public $img;


//agregamos las variables al constructor y las seteamos
    public function __construct($img)
    {
        $this->img = $img;
    }

    public function guardarpedido()
    {
        $db = new Connect();
        mysqli_set_charset($db, "utf8");
        date_default_timezone_set('America/Guayaquil');
        $v = $this->img;

        $idcli = $v['idcli'];
        $subtotal = $v['subtotal'];
        $total = $v['total'];
        $usrcodigo = $v['usrcodigo'];
        unset($v['idcli']);
        unset($v['subtotal']);
        unset($v['total']);
        unset($v['usrcodigo']);

        $sql = 'SELECT * from cliente where clicodigo="'.$idcli.'";';
        $query = $db->sql($sql);
        $row = $query->fetch_array(MYSQLI_ASSOC);

        $whereped_cab = array(
            "ciucodigo"=>$row['ciucodigo'],
            "zoncodigo"=>$row['zoncodigo'],
            "clicodigo"=>$row['clicodigo'],
            "cliruc"=>$row['cliruc'],
            "clinombre"=>$row['clinombre'],
            "clidirec"=>$row['clidirec'],
            "clitelef1"=>$row['clitelef1'],
            "pecfecemi"=>date('Y-m-d'),
            "pecfecisys"=>date('Y-m-d H:i:s'),
            "pecusrinsys"=>$usrcodigo,
            "pectipopag"=>"credito"
        );
        $pednumped =  $db->insertar('pedidos_cabecera',$whereped_cab);

echo $pednumped;
        for ($i = 0;$i < count($v);) {

            $tituloimg = $v['tituloimg'.$i];
            $precio = $v['precio'.$i];
            $stock = $v['stock'.$i];
            $msel = $v['msel'.$i];

            $whereped_det =array(
                'pednumped' => $pednumped,
                'artcodigo' => $tituloimg,
                'pedapliiva' => "0",
                'pedcantped' => $msel,
                'pedcantidad' => $msel,
                'artprecventa1' => $precio,
                'pedvalor' => $precio,
                'pedvaltot' => $total,
                'pedfecisys' => date('Y-m-d H:i:s'),
                'pedusrinsys' => $usrcodigo,
                'pedfecmodsys' => date('Y-m-d H:i:s')
             );
            $db->insertar('pedidos_detalle', $whereped_det);

            $i = $i +4;
        }

        return "Pedido Realizado con éxito.";


    }

    public function verpedidos()
    {
        $id = $this->img;
        $id2 = $id['usrcodigo'];
        $db = new Connect();
        mysqli_set_charset($db, "utf8");
        date_default_timezone_set('America/Guayaquil');

        $sql = 'SELECT * from pedidos_cabecera where pecusrinsys="'.$id2.'";';
        $query = $db->sql($sql);
        while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
            $pednumped = $row['pednumped'];
            $fecha = $row['pecfecemi'];
            $nombre =ucwords(strtolower(trim($row['clinombre'])));

        $sql2 = 'SELECT * from pedidos_detalle where pednumped="'.$pednumped.'";';
        $query2 = $db->sql($sql2);
        $num2 = $db->obnum($query2);    
        $roww = $query2->fetch_array(MYSQLI_ASSOC);
        $pedvaltot = $roww['pedvaltot'];
        $sql22 = 'SELECT * from pxp_cliente where pednumped="'.$pednumped.'";';
        $query22 = $db->sql($sql22);
        $num22 = $db->obnum($query22);
         switch ($num22) {
             case '0':
                $estado = 'p';
                 break;
             default:
                $roww2 = $query22->fetch_array(MYSQLI_ASSOC);

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
                    $sql = "SELECT * FROM cliente where cliruc like '%".$ci."%' or clinombre like '%".$ci."%';";
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
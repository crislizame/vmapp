<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of function
 *
 * @author CRISLIZAME
 */
class Cliente {
   //declaramos las variables a usar
    public $string;


//agregamos las variables al constructor y las seteamos
    public function __construct($string){
        $this->string = $string;
    }
    public function consultarcliente(){
         $db = new Connect();
        mysqli_set_charset($db,"utf8");
        date_default_timezone_set('America/Guayaquil');
          $valores = $this->string;
          $bname = trim($valores['bname']);
          $bruc = trim($valores['bruc']);
          $lcli = trim($valores['lcli']);
          if($lcli != 'Tipo Cliente - Todos'){
                        $lcli1 = $this->reconocimiento('tipocliente',$lcli,'tipdescrip','tipcodigo',1);

          }else{
              $lcli1 = '';
          }
          $zcli = trim($valores['zcli']);
                    if($zcli != 'Zona Cliente - Todos'){
          $zcli1 = $this->reconocimiento('zona',$zcli,'zondescrip','zoncodigo',1);

          }else{
              $zcli1 = '';
          }
          $ccli = trim($valores['ccli']);         
                              if($ccli != 'Ciudad Cliente - Todos'){
          $ccli1 = $this->reconocimiento('ciudad',$ccli,'ciudescrip','ciucodigo',1);

          }else{
              $ccli1 = '';
          }

          $result = null;
                    $sql = "SELECT * FROM cliente where cliruc like '%".$bruc."%' and clinombre like '%".$bname."%' and tipcodigo like '%$lcli1%'"
                            . " and ciucodigo like '%$ccli1%' and zoncodigo like '%$zcli1%';";
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

    public function guardar_cliente()
    {
                $db = new Connect();
                mysqli_set_charset($db, "utf8");
                date_default_timezone_set('America/Guayaquil');

                $v = $this->string;
                $tipcodigo = $this->reconocimiento("tipocliente",$v["tipcodigo"],"tipdescrip","tipcodigo","1");
                $ciucodigo = $this->reconocimiento("ciudad",$v["ciucodigo"],"ciudescrip","ciucodigo","1");
                $zoncodigo = $this->reconocimiento("zona",$v["zoncodigo"],"zondescrip","zoncodigo","1");

                $v['tipcodigo'] = $tipcodigo;
                $v['ciucodigo'] = $ciucodigo;
                $v['zoncodigo'] = $zoncodigo;
                $v['clidirec'] = $v["cliedirconsul"];
                $v['clicupocre'] = "300";
                $v['clidiascre'] = "30";
                $v['clifecisys'] = date('Y-m-d H:i:s');
                $v['clifecmodsys'] = date('Y-m-d H:i:s');

                $v['clistatus'] = "ACTIVO";
                foreach ($v as $key => $val ) {
                    if($key == "website" || $key == "cliobserva" || $key == "clitelef2" || $key == "clitelef3")
                    {

                    }else{
                        if ($val == '') {
                            echo "Valores Vacios.";
                        }
                    }

                }

               $db->insertar("cliente",$v);
            

                echo "Guardado con Éxito";
    }
    
    
        public function reconocimiento($nombretable,$valortabla,$wheretable,$codetable,$nm){
                $db = new Connect();
//funcion donde reconoce el codigo del producto desde su descripcion
        $sql = "SELECT * FROM $nombretable WHERE $wheretable like '%$valortabla%';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if($num != 0){
                        if($nm==2){
    switch ($wheretable){
        case 'tipdescrip':
                                                                        $result[] = array("$wheretable"=>'Tipo Cliente - Todos');

            break;
                case 'zondescrip':
                                                                        $result[] = array("$wheretable"=>'Zona Cliente - Todos');

            break;
                case 'ciudescrip':
                                                                        $result[] = array("$wheretable"=>'Ciudad Cliente - Todos');

            break;
    }

                            }
                        while($row = $query->fetch_array(MYSQLI_ASSOC)){
                            if($nm==1){
                                                            $result = $row[$codetable];

                            }else{
                                                            $result[] = array("$wheretable"=>$row[$codetable]);

                            }
                            
                        }
                       
                                        }
                                                $db->close();

                                        return $result;
    }
}

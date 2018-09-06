<?php
class Crear_cliente extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();


    }

    function Crearlo($datos)
    {
        $replace = array('(', ")", ' ','-');
        $nombclient = trim($datos['nombclient']);
        $rucclient = trim($datos['rucclient']);
        $telefono1 = str_replace($replace,"",trim($datos['telefono1']));
        $telefono2 = str_replace($replace,"",trim($datos['telefono2']));
        $telefono3 = str_replace($replace,"",trim($datos['telefono3']));
        $celular = str_replace($replace,"",trim($datos['celular']));
        $fechnaci = trim($datos['fechnaci']);
        $tipocliente = trim($datos['tipocliente']);
        $ciudadcliente = trim($datos['ciudadcliente']);
        $zonacliente = trim($datos['zonacliente']);
        $profcliente = trim($datos['profcliente']);
        $espcliente = trim($datos['espcliente']);
        $dirfar = trim($datos['dirfar']);
        $correo = trim($datos['correo']);
        $website = trim($datos['website']);
        $diavisita = trim($datos['diavisita']);
        $horadesde = trim($datos['horadesde']);
        $horahasta = trim($datos['horahasta']);
        $diapago = trim($datos['diapago']);
        $diaped = trim($datos['diaped']);
        $sexo = trim($datos['sexo']);
        $obser = trim($datos['obser']);
        $catego = trim($datos['catego']);
        $dirconsul = trim($datos['dirconsul']);
               
        $usuario_data ='';
    $query = $this->db->query("INSERT INTO cliente VALUES ('','$tipocliente',
        '$ciudadcliente','$zonacliente','$rucclient','$nombclient','$dirfar','$telefono1',
            '$celular','$fechnaci','$profcliente','$espcliente','$correo','$rucclient','$nombclient','$dirfar',
                '$telefono2','$dirfar','$telefono3','$dirconsul','','$website','$obser','$catego','$diavisita',
                    '$horadesde','$horahasta','$diapago','$diaped','$sexo','ACTIVO','','',
                        '','','','','',''
                        )");
        $id = $this->db->insert_id();
        
        if($id >= 0){
            echo 'Cliente Ingresado Correctamente';
        }else{
            echo 2;
        }
    }


}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

    }
	public function index()
	{
        if($this->session->has_userdata('username')){
            $array = array(
                'session' => $this->session->userdata()
            );

            $this->load->view('home',$array);
                

      
        }else{
            redirect('https://vmapp.naturlifeec.com');
        }
		
	}
    public function panel($tipo,$accion)
    {
        if($this->session->has_userdata('username')){
            $array = array(
                'session' => $this->session->userdata()
            );


            switch ($tipo){
                case "cliente":
                    switch ($accion){
                        case "nuevo":
                            $query = $this->db->query("SELECT * FROM `tipocliente` where tipstatus='ACTIVO' ");
                              $tipoclientelist = '';
                              
                foreach ($query->result_array() as $row)
                        {
                            $tipoclientelist .= '<option value="'.$row['tipcodigo'].'"> '.$row['tipdescrip'].' </option>';
                            }
                            $query2= $this->db->query("SELECT * FROM `zona` where zonstatus='ACTIVO' ");
                              $zonalist = '';
                              
                foreach ($query2->result_array() as $row)
                        {
                            $zonalist .= '<option value="'.$row['zoncodigo'].'"> '.$row['zondescrip'].' </option>';
                            }
                            $query3= $this->db->query("SELECT * FROM `ciudad` where ciustatus='ACTIVO' ");
                              $ciualist = '';
                              
                foreach ($query3->result_array() as $row)
                        {
                            $ciualist .= '<option value="'.$row['ciucodigo'].'"> '.$row['ciudescrip'].' </option>';
                            }
                            $array += array(
                                'accionpagina' => $accion,
                                'tipopagina'=> $tipo,
                                'tipolist'=>$tipoclientelist,
                                'zonlist'=>$zonalist,
                                'ciulist'=>$ciualist
                            );

                            $this->load->view('nuevo',$array);
                            break;
                        case "actualizar":

                        $query = $this->db->query("SELECT * FROM `cliente` where clistatus='ACTIVO' ");
                              $clientesall = array();
                              
                foreach ($query->result_array() as $row)
                        {
                            $clientesall[] = $row;
                            
                            }
                                
                                                        $array += array(
                                'accionpagina' => $accion,
                                 'tipopagina'=> $tipo,
                                   'clientesall' => $clientesall

                            );

                            $this->load->view('actulizar_cliente',$array);
                            break;
                        case "eliminar":
                            break;
                    }
                    case 'pedidos':
                    
                    break;
            }


        }else{
            redirect('https://vmapp.naturlifeec.com');
        }

    }
}

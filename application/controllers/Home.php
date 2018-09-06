<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Login_Model');

    }
	public function index()
	{
        if($this->session->has_userdata('username')){
                redirect('/sistema');

        }else{
            $this->load->view('login');
        }
		
    }
    
    public function login(){
        $data = $this->input->post();
        $datos=array(
            'n'=> $data['username'],
            'c'=>md5($data['pass']),
            's'=>$data['session']
        );

        echo $this->Login_Model->select_datos($datos);
    }
    public function salir(){
        session_destroy();
        redirect('https://vmapp.naturlifeec.com');
    }
}

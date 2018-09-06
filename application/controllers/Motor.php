<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motor extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Crear_cliente');

    }
    
    public function crearcliente(){
        $data = $this->input->post();

      $result =  $this->Crear_cliente->Crearlo($data);
        echo $result;
    }
    
}
<?php
class Login_Model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();


    }

    function select_datos($datos)
    {
        $n = $datos['n'];
        $c = $datos['c'];
        $s = $datos['s'];
        $usuario_data ='';
        $query = $this->db->query("SELECT * FROM usuarios where usrnombre='".$n."' and usrclave='".$c."' and usrstatus=1;");
        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row)
            {
                $usuario_data = array(
                    'username' => $row['usrnombre'],
                    'fechaingreso' => $row['usrfecisys'],
                    'tipoperfil' => 1,
                    'correo' => $row['usrcorreo'],
                    'nombretipo' => ""
                );
                if($s){
                    $config['sess_expiration'] = 0;
                }
                $this->session->set_userdata($usuario_data);
            }
            return '1';
        }else{
            return '2';
        }

    }


}

?>
<?php
include '../class/class.conexion.php';
$cedula = isset($_GET['username']) ? $_GET['username'] : $x = 'Sin username';
$pass = isset($_GET['pass']) ? $_GET['pass'] : $x = 'Sin pass';

if(isset($x)){
    echo $x;
    exit;
}
//incluimos nuestra clase
include '../funcion/function.login.php';
//iniciamos nuestra clase y pasamos los datos
$login = new Login($cedula,$pass);

//enviamos el json para la web service
echo json_encode($login->login());

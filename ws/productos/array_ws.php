<?php
include '../class/class.conexion.php';
$string = isset($_GET['array']) ? $_GET['array'] : $x = 'Sin array';

if(isset($x)){
    echo $x;
    exit;
}
//incluimos nuestra clase
include '../funcion/function.Obtenerlist.php';
//iniciamos nuestra clase y pasamos los datos
$login = new Obtenerlist($string);

//enviamos el json para la web service
echo json_encode($login->list1());
<?php
ini_set('display_errors', '1');
include '../class/class.conexion.php';
$lincodigo = isset($_GET['lincodigo']) ? $_GET['lincodigo'] : $x = 'Sin array';

if(isset($x)){
    echo $x;
    exit;
}
//incluimos nuestra clase
include '../funcion/function.Ingresarproducto.php';
//iniciamos nuestra clase y pasamos los datos
$string = $_POST;
$img = $_POST;
$ingpro = new Ingresarproducto($string,$img);

//enviamos el json para la web service
echo json_encode($ingpro->ingre());
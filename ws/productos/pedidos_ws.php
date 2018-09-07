<?php
include '../class/class.conexion.php';
$string = isset($_GET['lol']) ? $_GET['lol'] : $x = 'Sin array';

if(isset($x)){
    echo $x;
    exit;
}
//incluimos nuestra clase
include '../funcion/function.pedidos.php';
//iniciamos nuestra clase y pasamos los datos
$img = $_POST;
$login = new Pedido($img);

//enviamos el json para la web service
echo json_encode($login->consultarcliente(),JSON_UNESCAPED_UNICODE);
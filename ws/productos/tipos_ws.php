<?php
include '../class/class.conexion.php';
$string = isset($_GET['lol']) ? $_GET['lol'] : $x = 'Sin array';

if (isset($x)) {
    echo $x;
    exit;
}
//incluimos nuestra clase
include '../funcion/function.productos.php';
//iniciamos nuestra clase y pasamos los datos
$img = $_GET;
$login = new Productos($string);

//enviamos el json para la web service
echo json_encode($login->verproductos(),JSON_UNESCAPED_UNICODE);

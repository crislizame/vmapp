<?php
include '../class/class.conexion.php';
$string = isset($_GET['lol']) ? $_GET['lol'] : $x = 'Sin array';
$string1 = isset($_GET['nn']) ? $_GET['nn'] : $x = 'Sin array';

if(isset($x)){
    echo $x;
    exit;
}
//incluimos nuestra clase
include '../funcion/function.clientes.php';
//iniciamos nuestra clase y pasamos los datos
$img = $_POST;
$login = new Cliente($img);

switch ($string){
    case '1':
            echo json_encode($login->reconocimiento('tipocliente','','tipdescrip','tipdescrip',$string1));

        break;
        case '2':
            echo json_encode($login->reconocimiento('zona','','zondescrip','zondescrip',$string1));

        break;
        case '3':
            echo json_encode($login->reconocimiento('ciudad','','ciudescrip','ciudescrip',$string1));

        break;

}
//enviamos el json para la web service

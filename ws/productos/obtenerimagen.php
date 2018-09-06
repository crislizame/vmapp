<?php
include '../class/class.conexion.php';
$string = isset($_GET['lol']) ? $_GET['lol'] : $x = 'Sin array';

if(isset($x)){
    echo $x;
    exit;
}

                    $sql = "SELECT * FROM `imgproducto` where imgcodigo = '".$string."';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
$row = $query->fetch_array(MYSQLI_ASSOC);


echo $row['img'];
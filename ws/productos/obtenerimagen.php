<?php
include '../class/class.conexion.php';
$string = isset($_GET['lol']) ? $_GET['z'] : $x = 'Sin array';

if(isset($x)){
    echo $x;
    exit;
}

                    $sql = "SELECT * FROM `imgproducto` where imgcodigo = '".$string."';";
                    $query = $db->sql($sql);
                    $num = $db->obnum($query);
                    if ($num != 0) {
                        while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                            $result = $row['img'];
                        }
                    }


echo $result;
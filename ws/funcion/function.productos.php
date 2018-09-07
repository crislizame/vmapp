<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of function
 *
 * @author CRISLIZAME
 */
class Productos
{
     public $v;

    public function __construct($v)
    {
        $this->v = $v;
    }
    public function verproductos()
    {
        $db = new Connect();
        mysqli_set_charset($db, "utf8");
        date_default_timezone_set('America/Guayaquil');
        $v = $this->v;
        $result='';
        $tipo = $v;
        switch ($tipo) {
            case 'stocka': 
            $sql = 'SELECT p.artdescri as nombre, p.artstock as stock, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo ORDER BY p.artcodigo ASC;';
            $query = $db->sql($sql);
            while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                $result[] = $row;
            }
            return $result;

            break;
            case 'stockd': 
            $sql = 'SELECT p.artdescri as nombre, p.artstock as stock, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo ORDER BY p.artcodigo DESC;';
            $query = $db->sql($sql);
            while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                                $result[] = $row;

            }
            return $result;
            break;
            case 'all': 
            $sql = 'SELECT p.artdescri as nombre, p.artstock as stock, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo;';
            $query = $db->sql($sql);
            while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                                $result[] = $row;

            }
            return $result;

            break;
            case 'bs': 
            $sql = 'select pd.artcodigo as artcodigo, sum(pd.pedcantidad),p.artdescri as nombre, p.artstock as stock, p.artprecventa1 as precio, l.lindescrip as line from pedidos_detalle pd, producto p, linproducto l where pd.artcodigo = p.artcodigo and p.lincodigo = l.lincodigo GROUP BY artcodigo order by sum(pd.pedcantidad) DESC;';
            $query = $db->sql($sql);
            while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                                $result[] = $row;

            }
            return $result;

            break;
            case 'line': 
            $sql = 'SELECT p.artdescri as nombre, p.artstock as stock, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo;';
            $query = $db->sql($sql);
            while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                                $result[] = $row;

            }
            return $result;

            break;
            default: # code... 
            break;
        }

    }
}

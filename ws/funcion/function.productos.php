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

        $tipo = $v['tipo'];
        switch ($tipo) {
            case 'stocka': $sql = 'SELECT p.artdescri as nombre, p.artstock as sotck, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo ASC;';
            $query = $db->sql($sql);
            $row = $query->fetch_array(MYSQLI_ASSOC);
            return $row;

            break;
            case 'stockd': $sql = 'SELECT p.artdescri as nombre, p.artstock as sotck, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo DESC;';
            $query = $db->sql($sql);
            $row = $query->fetch_array(MYSQLI_ASSOC);
            return $row;

            break;
            case 'all': $sql = 'SELECT p.artdescri as nombre, p.artstock as sotck, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo;';
            $query = $db->sql($sql);
            $row = $query->fetch_array(MYSQLI_ASSOC);
            return $row;

            break;
            case 'bs': $sql = 'select pd.artcodigo as artcodigo, sum(pd.pedcantidad),p.artdescri as nombre, p.artstock as sotck, p.artprecventa1 as precio, l.lindescrip from pedidos_detalle pd, producto p, linproducto l where pd.artcodigo = p.artcodigo and p.lincodigo = l.lincodigo GROUP BY artcodigo order by sum(pd.pedcantidad) DESC;';
            $query = $db->sql($sql);
            $row = $query->fetch_array(MYSQLI_ASSOC);
            return $row;

            break;
            case 'line': $sql = 'SELECT p.artdescri as nombre, p.artstock as sotck, p.artprecventa1 as precio, l.lindescrip as line FROM producto p, linproducto l where l.lincodigo = p.lincodigo;';
            $query = $db->sql($sql);
            $row = $query->fetch_array(MYSQLI_ASSOC);
            return $row;

            break;
            default: # code... 
            break;
        }

    }
}

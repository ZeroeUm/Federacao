
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcoes
 *
 * @author felipe
 */
class Funcoes {

    function subtrair_data($date, $days) {
        $data = explode('-', $date);
        
        $thisyear = $data['0'];
        $thismonth = $data['1'];
        $thisday = $data['2'];
        $nextdate = mktime(0, 0, 0, $thismonth, $thisday - $days, $thisyear);
        return strftime("%Y-%m-%d", $nextdate);
    }

    function idade($data_completa) {
        $data = explode('-', $data_completa);

        if ($data_completa < date('d-m-Y')) {
            $idade = date('Y') - $data['2'];
        } else {
            $idade = date('Y') - $data['2'];
            $idade = $idade - 1;
        }
        return $idade;
    }

    function tratar_timestamp($data, $tipo = 0) {
        if ($tipo == 0) {
            $datetime = explode(' ', $data);
            $pre_data = explode('-', $datetime['0']);
            return $pre_data['2'] . "-" . $pre_data['1'] . "-" . $pre_data['0'];
        } else {
            $datetime = explode(' ', $data);
            $pre_data = explode('-', $datetime['0']);
            return $pre_data['2'] . "-" . $pre_data['1'] . "-" . $pre_data['0'] . "  " . $datetime['1'];
        }
    }

    function imprimir($dados) {
        echo "<pre>";
        print_r($dados);
        echo "</pre>";
    }

    function data($data) {
        $data = explode("-", $data);
        return $data[2] . "-" . $data[1] . "-" . $data[0];
    }

}

?>


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
    
    function calcular_idade($data){
        
    }

    function tratar_timestamp($data, $tipo=0) {
//       tipo1 = mostra o horarário
//       tipo0 = não mostra o horário

        if ($tipo == 0) {
        
            $datetime = explode(' ',$data);
            $pre_data = explode('-',$datetime['0']);
            return $pre_data['2']."-".$pre_data['1']."-".$pre_data['0'];
            
        } else {
            
            $datetime = explode(' ', $data);
            $pre_data = explode('-', $datetime['0']);
            return $pre_data['2']."-".$pre_data['1']."-".$pre_data['0']."  ".$datetime['1'];
            
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

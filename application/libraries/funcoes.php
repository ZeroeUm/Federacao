
<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

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

   
    
    function imprimir($dados){
        
        echo "<pre>";
        print_r($dados);
        echo "</pre>";
        
    }
    
    function data($data){
        $data = explode("-", $data);
            return $data[2] . "-" . $data[1] . "-" . $data[0];
    }
    
    
}

?>

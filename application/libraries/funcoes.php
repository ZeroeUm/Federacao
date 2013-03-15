
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

    
    function data($data){
        $data = explode("-", $data);
            return $data[2] . "-" . $data[1] . "-" . $data[0];
    }
    
    
}

?>

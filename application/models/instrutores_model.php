<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of instrutores_model
 *
 * @author felipe
 */
class Instrutores_model extends CI_Model {
    function __construct() 
    {
        parent::__construct();
    }
    
    function get_instrutores(){
        
        $query =  $this->db->select('*')
                           ->from('federado')
                           
                            ->where('id_tipo_federado',2)
                           ->get();
        
         return $query->result_array();
    }
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modalidade_model
 *
 * @author felipe
 */
class Modalidade_model extends CI_Model{
     function __construct() 
    {
        parent::__construct();
    }
    
    public function get_modalidade(){
        
        $query =  $this->db->get('modalidade');
       
       
        
        return $query->result_array();
    }
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coordenador_model
 *
 * @author felipe
 */
class Coordenador_model extends CI_Model {
   
    function __construct() {
        parent::__construct();
    }

    public function get_filiais(){
        
        $query = $this->db->get('federado');
        return $query->result();
    }
    
}

?>

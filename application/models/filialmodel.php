<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filial_model
 *
 * @author felipe
 */
class FilialModel extends CI_Model{
   
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_filiais(){
        $query = $this->db->get('filial');
        return $query->result_array();
    }
}

?>

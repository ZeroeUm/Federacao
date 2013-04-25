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
class Filial_model extends CI_Model{
   
    
    function __construct() {
        parent::__construct();
    }
    
    public function set_filiais($dados){
       if($this->db->insert('filial', $dados)){
           
           return true;
       }else{
           
           return false;
       }; 
    }
}

?>

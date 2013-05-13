<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generica_model
 *
 * @author felipe
 */
class generica_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
    function get_ultimo_evento(){
        
    }
    function get_tipo_federado(){
        
    }
    function get_dados_federado($id_federado){
        
    }
    function get_dados_filial($id_filial){
        
    }
    function get_instrutor($id_federado){
        
    }
    function get_filial_do_aluno($id_federado){
        
    }
    function get_graduacao_atual($id_federado){
        $sql = "SELECT 
                graduacao_federado.id_graduacao,
                graduacao.faixa
                FROM 
                federacao.graduacao_federado 
                inner join graduacao using (id_graduacao)
                where id_federado = $id_federado;";
        return $this->db->query($sql)->result_array();
    }
    
}

?>

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

     public function MntFilialDados($id)
    {
        return $this->db
                        ->select
                                (
                                "
                            filial.id_filial AS id,
                            filial.nome AS nome,
                            filial.telefone AS telefone,
                            filial.fax AS fax,
                            filial.email AS email,
                            filial.representante AS representante,
                            filial.id_modalidade AS modalidade,
                            filial.cnpj as cnpj,
                            federado.nome AS instrutor,
                            endereco.logradouro AS logradouro,
                            endereco.numero AS numero,
                            endereco.complemento AS complemento,
                            endereco.bairro AS bairro,
                            endereco.cidade AS cidade,
                            estados.sigla as uf
                            "
                        )
                        ->from("filial")
                
                        ->join("instrutor", "filial.id_instrutor = instrutor.id_instrutor", "inner")
                        ->join("federado", "instrutor.id_federado = federado.id_federado", "inner")
                        ->join("endereco", "filial.id_endereco = endereco.id_endereco", "inner")
                        ->join('estados', 'endereco.uf = estados.id_estados', 'join')
                        ->where("filial.id_filial", $id)
                        ->get()
                        ->result_array();
    }
    
    
    public function get_filiais(){
        
        $query = $this->db->get('federado');
        return $query->result();
    }
    
    public function get_professores($id){
        
       $query = $this->db->select('*')
                         ->from('instrutor_modalidade')
                         ->join('modalidade','modalidade.id_modalidade = instrutor_modalidade.id_modalidade')
                         ->join('instrutor','instrutor.id_instrutor = instrutor_modalidade.id_instrutor')
                         ->join('federado','federado.id_federado = instrutor.id_federado')
                         ->where("instrutor_modalidade.id_modalidade",$id)
                         ->get();
       
        return $query->result_array();
    }
    
}

?>

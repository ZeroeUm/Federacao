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
    
    public static $belongs_to = array(
        array('endereco'=>'id_endereco')
        );
    
    function getEventoUnico($id_evento){
        
        return $this->db
                ->limit('2')     
                ->get('evento_graduacao')                
                ->result_array();
        
    }
    
    
    function deletarEvento($id_evento) {
        try {
           $result =  $this->db->delete('evento_graduacao', array('id_evento' => $id_evento));
        
           if(!$result){
                throw new Exception();
           }
           
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    function getEventos() {
        $query = $this->db
                ->select("evento_graduacao.id_evento,
                                    endereco.id_endereco,
                                    evento_graduacao.numero_evento,
                                    date_format(evento_graduacao.data_evento,'%d-%m-%Y') as data_evento,
                                    endereco.logradouro,
                                    endereco.cidade,
                                    uf.sigla,
                                    endereco.numero,
                                    modalidade.nome")
                ->from('evento_graduacao')
                ->join('endereco', 'evento_graduacao.id_endereco = endereco.id_endereco')
                ->join('uf', 'endereco.uf = uf.uf')
                ->join('modalidade', 'evento_graduacao.id_modalidade = modalidade.id_modalidade')
                ->get()
                ->result_array();


        return $query;
    }

    public function insertEvento($dados) {



        $this->db->insert('endereco', $dados['data']['endereco']);
        $ultimo = $this->db->from("endereco")->insert_id();

        $this->load->library('Funcoes', $dados);
        $dados['data']['evento_graduacao']['data_evento'] = $this->funcoes->data($dados['data']['evento_graduacao']['data_evento']);


        $dados['data']['evento_graduacao']['id_endereco'] = $ultimo;
        $modalidade = $dados['data']['evento_graduacao']['id_modalidade'];
        $numero_evento = $dados['data']['evento_graduacao']['numero_evento'];

        $dados['data']['evento_graduacao']['id_evento'] = date('Y') . $modalidade . $numero_evento . time();
        if ($this->db->insert('evento_graduacao', $dados['data']['evento_graduacao'])) {

            return true;
        } else {

            return false;
        };
    }

    public function MntFilialDados($id) {
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

    public function get_filiais() {

        $query = $this->db->get('federado');
        return $query->result();
    }

    public function get_professores($id) {

        $query = $this->db->select('*')
                ->from('instrutor_modalidade')
                ->join('modalidade', 'modalidade.id_modalidade = instrutor_modalidade.id_modalidade')
                ->join('instrutor', 'instrutor.id_instrutor = instrutor_modalidade.id_instrutor')
                ->join('federado', 'federado.id_federado = instrutor.id_federado')
                ->where("instrutor_modalidade.id_modalidade", $id)
                ->get();

        return $query->result_array();
    }

}

?>

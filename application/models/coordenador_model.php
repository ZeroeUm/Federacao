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
    
    
    function setAgendarAvaliacao($id_pre_avaliacao){
        
    }
    
    function getPreAvaliar($id_filial=null){
        $sql = "SELECT
                    pre_avaliacao.id_pre_avaliacao,
                    federado.nome,
                    pre_avaliacao.id_filial as filial_do_aluno,
                    federado.data_nasc,
                    status_avaliacao.descricao,
                    graduacao.faixa as faixa_atual,
                    graduacao.id_graduacao as id_faixa
               FROM federacao.pre_avaliacao
               join 
                    federado using (id_federado)
               join 
                    graduacao_federado using (id_federado)
               join 
                    status_avaliacao using (id_status_avaliacao)
               join 
                    graduacao using (id_graduacao)
               where 
                    pre_avaliacao.id_filial = '$id_filial'
               and 
                    pre_avaliacao.id_status_avaliacao !='5'
               order by graduacao.id_graduacao asc";
       $query = $this->db->query($sql);
       return $query->result_array();
    }
   
    function getFaixas($id_modalidade){
        return $this->db->select('nome,id_faixa')
                        ->from('faixa')
                        ->where('id_modalidade',$id_modalidade)
                        ->get()
                        ->result_array();
    }
    
    function getParticipantes($id_evento,$faixa){
       
        
//        $sql = "SELECT 
//                    graduacao_participantes.id_evento,
//                    federado.nome,
//                    federado.rg,
//                    federado.sexo,
//                    federado.email,
//                    federado.telefone
//                FROM 
//                    federacao.graduacao_participantes
//                join
//                    federado using (id_federado)
//                where 
//                    graduacao_participantes.id_evento  = $id_evento";
//        
//        
//         $query =  $this->db->query($sql);;
//
//        return $query->result_array();
        
        
        
        
        $query = $this->db->select(
                "graduacao_participantes.id_evento,
                    evento_graduacao.id_modalidade,
                    federado.nome,
                    federado.rg,
                    federado.sexo,
                    federado.email,
                    federado.telefone"
                            )
                ->from('graduacao_participantes')
                ->join('federado','graduacao_participantes.id_federado = federado.id_federado')
                ->join('evento_graduacao','graduacao_participantes.id_evento = evento_graduacao.id_evento')
                ->where('graduacao_participantes.id_evento',$id_evento);
                
        
        if($faixa == '0'){
          
        }else{
           $query->where('graduacao_participantes.id_faixa',$faixa);
        }
       
        
            return $query->get()                
                  ->result_array();
    }
    
    function getProntuario($dados){
       
        $dados['nome'] = "Aluna Um";
        $dados['rg'] = "69.523.920-5";
        extract($dados);
        print_r($rg);
       
        $sql = "SELECT 
                    federado.nome,
                    federado.rg,
                    movimentos_por_faixa.descricao,
                    prontuario.nota,
                    faixas.descricao,
                    evento_graduacao.numero_evento
                    FROM federado
                    join 
                    prontuario using (id_federado)
                    join 
                    faixas using (id_faixa)
                    join
                    movimentos_por_faixa using(id_movimentos_por_faixa)
                    join 
                    evento_graduacao using (id_evento)
                    where 
                    federado.nome like '$nome'
                    or
                    federado.rg like '$rg'";
        
        $query =  $this->db->query($sql);;

       return $query->result_array();
    }
    
    function getEstados(){
        
        return $this->db
                ->select('*')
                ->from('estados')
                ->get()                
                ->result_array();
        
        
    }
    
    function editEvento($dados){
       
        $data = explode('-',$dados['evento_graduacao']['data_evento']);
        
        $dados['evento_graduacao']['data_evento'] = $data['2']."-".$data['1']."-".$data['0'];
        
        $this->db->where('id_evento', $dados['evento_graduacao']['id_evento']);
        $this->db->update('evento_graduacao', $dados['evento_graduacao']); 
        
        
        $this->db->where('id_endereco', $dados['endereco']['id_endereco']);
        $this->db->update('endereco', $dados['endereco']); 
        
       
        
    }
    
    
    function getEventoUnico($id_evento){
        
        return $this->db
                ->select('*')
                ->from('evento_graduacao')
                ->where('id_evento',$id_evento)
                ->join('endereco','evento_graduacao.id_endereco = endereco.id_endereco')
                ->join('estados','endereco.uf = estados.id_estados')
                ->get()                
                ->result_array();
        
    }
    
    function FiliaisAgen(){
    
        $sql = "SELECT 
                    pre_avaliacao.id_evento,
                    pre_avaliacao.id_filial as filial,
                    filial.nome,
                    pre_avaliacao.id_filial
                FROM 
                    federacao.pre_avaliacao
                inner join
                    filial
                on 
                    pre_avaliacao.id_filial = filial.id_filial
                where
                    pre_avaliacao.id_status_avaliacao = 4
                group by 
                    pre_avaliacao.id_filial;";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    
    
    
    function deletarEvento($id_evento) {
        try {
           $result =  $this->db->delete('evento_graduacao', array('id_evento' => $id_evento));
        
           if($result){
              return true;
           }else{
               return false;
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
                                    estados.sigla,
                                    endereco.numero,
                                    modalidade.nome")
                ->from('evento_graduacao')
                ->join('endereco', 'evento_graduacao.id_endereco = endereco.id_endereco')
                ->join('estados', 'endereco.uf = estados.id_estados')
                ->join('modalidade', 'evento_graduacao.id_modalidade = modalidade.id_modalidade')
                ->get()
                ->result_array();


        return $query;
    }

    public function insertEvento($dados) {


        
        print_r($dados);
        $dados['data']['endereco']['tipo_endereco'] = '3';
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

        $query = $this->db->select(
                                    'federado.nome,federado.sexo,federado.telefone,                                  
                                    federado.email,federado.data_nasc , filial.nome as nome_filial'
                                    )
                ->from('instrutor_por_modalidade')
                ->join('modalidade', 'modalidade.id_modalidade = instrutor_por_modalidade.id_modalidade')
                ->join('instrutor', 'instrutor.id_instrutor = instrutor_por_modalidade.id_instrutor')
                ->join('federado', 'federado.id_federado = instrutor.id_federado')
                ->join('filial', 'filial.id_instrutor = instrutor.id_instrutor')
                ->where("instrutor_por_modalidade.id_modalidade", $id)
                ->get();

        return $query->result_array();
    }

}

?>

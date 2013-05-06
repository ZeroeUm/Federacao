<?php
/*
 * 2013-04-25
 * @author Humberto
 */
class Aluno_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function curriculoModalidade($modalidade)
    {
        return $this->db
                        ->select('graduacao.id_graduacao as id,graduacao.faixa')
                        ->from('graduacao')
                        ->where('id_modalidade',$modalidade)
                        ->where('ordem <', 11)
                        ->order_by('ordem','asc')
                        ->get()
                        ->result_array();
    }
    
    public function curriculoFaixa($faixa)
    {
        return $this->db
                        ->select('id_graduacao, faixa, curriculo')
                        ->from('graduacao')
                        ->where('id_graduacao',$faixa)
                        ->get()
                        ->result_array();
    }
    
    public function historicoNotas($aluno)
    {
        return $this->db
                        ->select("
                                    DATE_FORMAT(evento_graduacao.data_evento,'%d-%m-%Y') AS data_aprovacao,
                                    AVG(prontuario.nota) AS media,
                                    graduacao.faixa,
                                    modalidade.nome
                                ")
                        ->from('prontuario')
                        ->join('evento_graduacao','prontuario.id_evento = evento_graduacao.id_evento','inner')
                        ->join('movimento_faixa','prontuario.id_movimento_faixa = movimento_faixa.id_movimento_faixa','inner')
                        ->join('modalidade','evento_graduacao.id_modalidade = modalidade.id_modalidade','inner')
                        ->join('graduacao','movimento_faixa.id_graduacao = graduacao.id_graduacao','inner')
                        ->where('prontuario.id_federado',$aluno)
                        ->group_by('prontuario.id_evento')
                        ->order_by('evento_graduacao.data_evento','asc')
                        ->get()
                        ->result_array();
    }
}
?>

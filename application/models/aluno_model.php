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
                        ->order_by('ordem','asc')
                        ->get()
                        ->result_array();
    }
    
    public function historicoNotas($aluno)
    {
        return $this->db
                        ->select('
                                    modalidade.nome AS modalidade, 
                                    evento_graduacao.data_evento as data,
                                    AVG(prontuario.nota) as media
                                ')
                        ->from('prontuario')
                        ->join('evento_graduacao','prontuario.id_evento = evento_graduacao.id_evento','inner')
                        ->join('modalidade','evento_graduacao.id_modalidade = modalidade.id_modalidade','inner')
                        ->join('','','inner')
                        ->where('prontuario.id_federado',$aluno)
                        ->order_by('evento_graduacao.data_evento','asc')
                        ->get()
                        ->result_array();
    }
}
?>

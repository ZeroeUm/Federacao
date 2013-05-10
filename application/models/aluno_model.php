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

    public function get_historico($id_federado, $id_evento)
    {
        return $this->db
                        ->select('
                                prontuario.id_movimento_faixa,
                                date_format(evento_graduacao.data_evento,"%d-%m-%Y") as data,
                                prontuario.nota,
                                graduacao.faixa,
                                movimento_faixa.nome_movimento
                                ')
                        ->from('prontuario')
                        ->join('movimento_faixa', 'prontuario.id_movimento_faixa = movimento_faixa.id_movimento_faixa', 'inner')
                        ->join('graduacao', 'movimento_faixa.id_graduacao = graduacao.id_graduacao', 'inner')
                        ->join('evento_graduacao', 'prontuario.id_evento = evento_graduacao.id_evento', 'inner')
                        ->where('prontuario.id_evento', $id_evento)
                        ->where('prontuario.id_federado', $id_federado)
                        ->get()
                        ->result_array();
    }

    public function get_eventos()
    {
        return $this->db
                        ->select('
                                if(id_prontuario!=\'\',true,false)as status,
                                evento_graduacao.id_evento,
                                concat(endereco.logradouro," ",endereco.numero, " - ",endereco.bairro," - ",endereco.cidade) as endereco_evento,
                                date_format(evento_graduacao.data_evento,\'%d-%m-%Y\') as data
                                ')
                        ->from('evento_graduacao')
                        ->join('prontuario','evento_graduacao.id_evento = prontuario.id_evento','left')
                        ->join('endereco','evento_graduacao.id_endereco = endereco.id_endereco','inner')
                        ->group_by('evento_graduacao.id_evento')
                        ->order_by('status','asc')
                        ->order_by('evento_graduacao.id_evento','desc')
                        ->get()
                        ->result_array();
        
    }

    public function curriculoModalidade($modalidade)
    {
        return $this->db
                        ->select('graduacao.id_graduacao as id,graduacao.faixa')
                        ->from('graduacao')
                        ->where('id_modalidade', $modalidade)
                        ->where('ordem <', 11)
                        ->order_by('ordem', 'asc')
                        ->get()
                        ->result_array();
    }

    public function curriculoFaixa($faixa)
    {
        return $this->db
                        ->select('id_graduacao, faixa, curriculo')
                        ->from('graduacao')
                        ->where('id_graduacao', $faixa)
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
                                    modalidade.nome as modalidade
                                ")
                        ->from('prontuario')
                        ->join('evento_graduacao', 'prontuario.id_evento = evento_graduacao.id_evento', 'inner')
                        ->join('movimento_faixa', 'prontuario.id_movimento_faixa = movimento_faixa.id_movimento_faixa', 'inner')
                        ->join('modalidade', 'evento_graduacao.id_modalidade = modalidade.id_modalidade', 'inner')
                        ->join('graduacao', 'movimento_faixa.id_graduacao = graduacao.id_graduacao', 'inner')
                        ->where('prontuario.id_federado', $aluno)
                        ->group_by('prontuario.id_evento')
                        ->order_by('evento_graduacao.data_evento', 'asc')
                        ->get()
                        ->result_array();
    }

}

?>

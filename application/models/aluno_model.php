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
    
    
    public function get_historico($id_federado,$id_evento){
        $sql = "SELECT 
prontuario.id_movimento_faixa,
date_format(evento_graduacao.data_evento,'%d-%m-%Y') as data,
prontuario.nota,
graduacao.faixa,
movimento_faixa.nome_movimento
 FROM federacao.prontuario 
inner join movimento_faixa using (id_movimento_faixa)
inner join graduacao using (id_graduacao)
inner join evento_graduacao using (id_evento)
where 
prontuario.id_evento = $id_evento 
and
prontuario.id_federado = $id_federado;";
        
        return $this->db->query($sql)->result_array();
        
    }
    
    public function get_eventos(){
        $sql = 'SELECT
if(id_prontuario!=\'\',true,false)as status,
evento_graduacao.id_evento,
concat(endereco.logradouro," ",endereco.numero, " - ",endereco.bairro," - ",endereco.cidade) as endereco_evento,
date_format(evento_graduacao.data_evento,\'%d-%m-%Y\') as data
FROM 
federacao.evento_graduacao
left join prontuario using (id_evento)
inner join endereco using (id_endereco)
group by id_evento
order by status,id_evento DESC';
        return $this->db->query($sql)->result_array();
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

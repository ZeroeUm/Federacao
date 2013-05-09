<?php

class Instrutor_model extends CI_Model {

    //SELECT federado.nome FROM federado INNER
    // JOIN filial WHERE federado.registro = filial.instrutor

    function pre_avaliacao($dados) {
        $this->load->model('Coordenador_model', 'coordenador');
        $id_evento = $this->coordenador->getUltimoEvento();


        foreach ($dados['nodeCheck'] as $i => $v) {
            $insert = array(
                'id_evento' => $id_evento,
                'id_federado' => $v,
                'id_status_avaliacao' => '4',
                'id_filial' => $dados['id_filial']
            );

            $this->db->insert('pre_avaliacao', $insert);
        }
    }
    
    
    //Função total_alunos se passar qualquer coisa como 2 parametro a função
    //irá mostrar o total de alunos do instrutor caso contrario somente irá lista-los por nome
    function total_alunos($id_instrutor,$count = null){
       if($count!=null){
           $count = "count(matricula.id_federado) as total_alunos,";
       }else{
           $count = "";
       }
        
        $sql = "SELECT 
                $count            
                matricula.id_federado,
                federado.nome
                FROM federacao.filial
                inner join instrutor
                on instrutor.id_instrutor = filial.id_instrutor
                inner join matricula
                on matricula.id_filial = filial.id_filial
                inner join federado
                on  matricula.id_federado = federado.id_federado
                where instrutor.id_federado = $id_instrutor;";
        return $this->db->query($sql)->result_array();
        
    }

    function get_status_avaliacao() {
        $this->load->model('Coordenador_model', 'coordenador');
        $ultimo_evento = $this->coordenador->getUltimoEvento();

        $sql = "SELECT 
                federado.nome,
                graduacao.faixa,
                date_format(pre_avaliacao.data_agendamento,'%d-%m-%Y') as data,
                pre_avaliacao.horario,
                status_avaliacao.id_status_avaliacao as avaliacao
                FROM federacao.pre_avaliacao
                inner join federado
                on federado.id_federado = pre_avaliacao.id_federado
                inner join graduacao_federado 
                on graduacao_federado.id_federado = federado.id_federado
                inner join graduacao using (id_graduacao)
                inner join status_avaliacao using (id_status_avaliacao)
                where pre_avaliacao.id_evento = $ultimo_evento";
        $dados = $this->db->query($sql)->result_array();


        $avaliacao = array();
        
        //Necessário para não dar erro na exibição
        $avaliacao['aprovados']['nome'] = array();
        $avaliacao['aprovados']['faixa'] = array();
        $avaliacao['reprovados']['nome'] = array();
        $avaliacao['reprovados']['faixa'] = array();
        $avaliacao['aguardando']['nome'] = array();
        $avaliacao['aguardando']['data_avaliacao'] = array();
        $avaliacao['aguardando']['horario'] = array();
        $avaliacao['nao_agendado']['nome'] = array();
        $avaliacao['nao_agendado']['faixa']= array();
        //final
        
        foreach ($dados as $v) {

            if ($v['avaliacao'] == '1') {
                $avaliacao['aprovados']['nome'][] = $v['nome'];
                $avaliacao['aprovados']['faixa'][] = $v['faixa'];
            } elseif ($v['avaliacao'] == '2') {
                $avaliacao['reprovados']['nome'][] = $v['nome'];
                $avaliacao['reprovados']['faixa'][] = $v['faixa'];
            } elseif ($v['avaliacao'] == '3') {
                $avaliacao['aguardando']['nome'][] = $v['nome'];
                $avaliacao['aguardando']['data_avaliacao'][] = $v['data'];
                $avaliacao['aguardando']['horario'][] = $v['horario'];
            } else {
                $avaliacao['nao_agendado']['nome'][] = $v['nome'];
                $avaliacao['nao_agendado']['faixa'][] = $v['faixa'];
            }
        }


        return $avaliacao;
    }

    function cadastro() {
        $this->db->order_by('federado.nome', 'ASC');
        return $this->db->select('instrutor.id_instrutor as id, federado.nome as nome')
                        ->DISTINCT()
                        ->from('instrutor')
                        ->join('federado', 'federado.id_federado = instrutor.id_federado', 'inner')
                        ->where(array('federado.id_tipo_federado' => "2"))
                        ->get()
                        ->result();
    }

//SELECT filial.nome, filial.idFilial FROM filial  WHERE filial.instrutor = 4
    function getFilial($id) {
        $this->db->order_by('filial.nome', 'ASC');
        return $this->db->select('filial.id_filial as id, filial.nome as nome')
                        ->DISTINCT()
                        ->from('filial')
                        ->join('instrutor', "instrutor.id_instrutor = filial.id_instrutor", 'inner')
                        ->where(array('instrutor.id_federado' => $id))
                        ->get()->result();
    }

//SELECT status_federado.status FROM status_federado INNER JOIN federado WHERE federado.status = 1 OR federado.status = 0 LIMIT 2    
    function getStatus() {
        return $this->db->select('status_federado.id,status_federado.status')
                        ->from('status_federado')
                        ->get()->result();
    }

    /*
     * SELECT federado.registro, federado.nome FROM federado INNER JOIN
      matricula  ON matricula.federado = federado.registro INNER JOIN    filial ON matricula.id_filial = filial.idFilial WHERE federado.tipo_federado = 1 AND filial.idFilial = 7 AND  federado.status = 0
     */

    function getAluno($filial, $status) {
        $this->db->order_by('federado.nome', 'ASC');
        return $this->db->select('federado.id_federado as id, federado.nome as nome')
                        ->from('federado')
                        ->join('matricula', 'matricula.id_federado = federado.id_federado', 'inner')
                        ->join('filial', 'matricula.id_filial = filial.id_filial', 'inner')
                        ->where(array('federado.id_tipo_federado' => '1', 'filial.id_filial' => $filial, 'federado.id_status' => $status))
                        ->get()->result();
    }

    /*
     * SELECT federado.nome AS nome,
      federado.data_nasc AS dtNasc,
      federado.telefone AS telefone,
      federado.email AS email,
      federado.celular AS celular,
      federado.sexo AS sexo,
      escolaridade.descricao AS escolaridade,
      nacionalidade.nacionalidade AS nacionalidade,
      graduacao.faixa AS faixa
      FROM federado
      INNER JOIN escolaridade ON federado.escolaridade = escolaridade.id
      INNER JOIN nacionalidade ON federado.nacionalidade = nacionalidade.id
      INNER JOIN graduacao_federado ON federado.registro = graduacao_federado.federado
      INNER JOIN graduacao ON graduacao_federado.modalidade = graduacao.modalidade AND graduacao_federado.grau = graduacao.grau
      WHERE graduacao_federado.status = 1 AND federado.registro = 7
     */

    public function MntFedDados($federado) {
        return $this->db
                        ->select(
                                "federado.nome AS nome,
                              federado.data_nasc AS dtNasc,
                              federado.telefone AS telefone,
                              federado.email AS email,
                              federado.celular AS celular,
                              federado.sexo AS sexo,
                              escolaridade.descricao AS escolaridade,
                              nacionalidade.nacionalidade AS nacionalidade,
                              graduacao.faixa AS faixa"
                        )
                        ->from("federado")
                        ->join("escolaridade", "federado.id_escolaridade = escolaridade.id", "inner")
                        ->join("nacionalidade", "federado.id_nacionalidade = nacionalidade.id", "inner")
                        ->join("graduacao_federado", "federado.id_federado = graduacao_federado.id_federado", "inner")
                        ->join("graduacao", "graduacao_federado.id_modalidade = graduacao.id_modalidade AND graduacao_federado.id_graduacao = graduacao.id_graduacao", "inner")
                        ->where("federado.id_federado", $federado)
                        ->where("graduacao_federado.status", 1)
                        ->get()
                        ->result_array();
    }

    public function ImprimirDadosFederado($federado) {
        return $this->db
                        ->select('federado.nome as nome,
                                 federado.filiacao_materna as fMaterna,
                                 federado.filiacao_paterna as fPaterna,
                                 federado.sexo as sexo,
                                 federado.data_nasc as dtNasc,
                                 federado.rg as rg,
                                 federado.telefone as telefone,
                                 federado.celular as celular,
                                 federado.email as email,
                                 federado.caminho_imagem,
                                 escolaridade.descricao as escolaridade,
                                 nacionalidade.nacionalidade as nacionalidade,
                                 status_federado.status as situacao,
                                 tipo_federado.tipo as tipo,
                                 graduacao.faixa as faixa,
                                 endereco.logradouro as logradouro,
                                 endereco.numero as numero,
                                 endereco.complemento as compl,
                                 endereco.bairro as bairro,
                                 endereco.cidade as cidade,
                                 estados.sigla as uf'
                        )
                        ->from('federado')
                        ->join('nacionalidade', 'federado.id_nacionalidade = nacionalidade.id', 'inner')
                        ->join('escolaridade', 'federado.id_escolaridade = escolaridade.id', 'inner')
                        ->join('tipo_federado', 'federado.id_tipo_federado = tipo_federado.id', 'join')
                        ->join('status_federado', 'federado.id_status = status_federado.id', 'inner')
                        ->join("graduacao_federado", "federado.id_federado = graduacao_federado.id_federado", "inner")
                        ->join("graduacao", "graduacao_federado.id_modalidade = graduacao.id_modalidade AND graduacao_federado.id_graduacao = graduacao.id_graduacao", "inner")
                        ->join('endereco', 'federado.id_endereco = endereco.id_endereco', 'inner')
                        ->join('estados', 'endereco.uf = estados.id_estados', 'inner')
                        ->where("federado.id_federado", $federado)
                        ->where("graduacao_federado.status", 1)
                        ->get()
                        ->result_array();
    }

    /*
     * @param array associativo com as informa��es a serem inseridas no banco, onde as posi��es do array devem ser os campos da tabela e os valores as novas informa��es a serem inseridas
     */

    public function InserirFederado($dados = array()) {
        $this->db->insert('federado', $dados);
    }

    public function getNacionalidade() {
        return $this->db
                        ->select('id,nacionalidade')
                        ->from('nacionalidade')
                        ->order_by('nacionalidade', 'ASC')
                        ->get()
                        ->result_array();
    }

    public function getEscolaridade() {
        return $this->db->get('escolaridade')->result_array();
    }

    public function getStatu() {
        return $this->db->get('status_federado')->result_array();
    }

    public function getEndereco($id) {
        return $this->db->get_where('endereco', array('id_endereco' => $id))->result_array();
    }

    //SELECT tipo FROM tipo_federado WHERE id = 1
    public function getTipoFederado() {
        return $this->db
                        ->select('tipo, id')
                        ->from('tipo_federado')
                        ->where('tipo_federado.id =', '1')
                        ->get()
                        ->result_array();
    }

    public function getUF() {
        return $this->db
                        ->select('id_estados AS id,sigla')
                        ->from('estados')
                        ->order_by("sigla", "asc")
                        ->get()
                        ->result_array();
    }

    public function DadosFederado($federado) {// met�do para puxar informa��es para p�gina de altera��o
        $query = $this->db->get_where('federado', array('id_federado' => $federado));
        return $query->result_array();
    }

    public function AtualizarDadosFederado($id, $dados = array()) {
        $this->db->update('federado', $dados, array('id_federado' => $id));
    }

    public function AtualizarEndereco($id, $dados = array()) {
        $this->db->update('endereco', $dados, array('id_endereco' => $id));
    }

    public function InserirEndereco($dados = array()) {
        $this->db->insert('endereco', $dados);
    }

    function inscrever() {
        $this->db->order_by('federado.nome', 'ASC');
        return $this->db->select('instrutor.id_instrutor as id, federado.nome as nome')
                        ->DISTINCT()
                        ->from('instrutor')
                        ->join('federado', 'federado.id_federado = instrutor.id_federado', 'inner')
                        ->where(array('federado.id_tipo_federado' => "2"))
                        ->get()
                        ->result();
    }

    /*
     * SELECT federado.id_federado AS id, federado.nome AS nome,
      graduacao.faixa AS graduacao, filial.nome AS filial
      FROM federado
      INNER JOIN   matricula  ON matricula.id_federado = federado.id_federado
      INNER JOIN    filial ON matricula.id_filial = filial.id_Filial
      INNER JOIN graduacao_federado  ON graduacao_federado.id_federado = federado.id_federado
      INNER JOIN graduacao ON graduacao.id_modalidade = graduacao_federado.id_modalidade
      INNER JOIN modalidade ON modalidade.id_modalidade = graduacao_federado.id_modalidade
      WHERE federado.id_tipo_federado = 1 AND filial.id_filial = 1 AND  federado.id_status = 1
      AND  graduacao_federado.STATUS = 1
     * 
     *   ->where(array('federado.id_tipo_federado' => '1', 'filial.id_filial' => $filial, 'federado.id_status' => $status))
     */

    function getInscrito($filial) {
        $this->load->model('Coordenador_model', 'coordenador');
        $ultimo_evento = $this->coordenador->getUltimoEvento();

        $sql = "
            SELECT 
federado.id_federado as id,
federado.nome,
filial.nome as filial,
graduacao.faixa
FROM 
federacao.federado
inner join federacao.matricula
on

matricula.id_federado = federado.id_federado
inner join 
    filial
on
    matricula.id_filial = filial.id_filial
inner join 
    graduacao_federado
on  
    matricula.id_federado = graduacao_federado.id_federado
inner join
    graduacao
on
    graduacao_federado.id_graduacao = graduacao.id_graduacao
where 
not exists (select pre_avaliacao.id_federado from pre_avaliacao where pre_avaliacao.id_federado = federado.id_federado and pre_avaliacao.id_evento = $ultimo_evento )
and
federado.id_tipo_federado = 1";
        return $this->db->query($sql)->result_array();
    }

}
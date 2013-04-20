<?php

class Instrutor_model extends CI_Model {

    //SELECT federado.nome FROM federado INNER
    // JOIN filial WHERE federado.registro = filial.instrutor
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
                        ->where(array('filial.id_instrutor' => $id))
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
                        ->join("graduacao", "graduacao_federado.id_graduacao = graduacao.id_graduacao", "inner")
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
                        ->join("graduacao", "graduacao_federado.id_modalidade = graduacao.id_modalidade AND graduacao_federado.grau = graduacao.grau", "inner")
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
     * SELECT federado.id_federado as id, federado.nome as nome,
      graduacao_federado.grau as graduacao, filial.nome as filial
      FROM federado
      INNER JOIN   matricula  ON matricula.id_federado = federado.id_federado
      INNER JOIN    filial ON matricula.id_filial = filial.id_Filial
      INNER JOIN graduacao_federado  ON graduacao_federado.id_federado = federado.id_federado
      INNER JOIN modalidade ON modalidade.id_modalidade = graduacao_federado.id_modalidade
      WHERE federado.id_tipo_federado = 1 AND filial.id_filial = 1 AND  federado.id_status = 1
      AND  graduacao_federado.status = 1
     * 
     *   ->where(array('federado.id_tipo_federado' => '1', 'filial.id_filial' => $filial, 'federado.id_status' => $status))
     */

    function getInscrito($filial) {
        
        return $this->db
                        ->select('federado.id_federado as id, federado.nome as nome,
                                    graduacao.grau as graduacao, filial.nome as filial')
                        ->DISTINCT()
                        ->from('federado')
                        ->join('matricula', 'matricula.id_federado = federado.id_federado', 'inner')
                        ->join('filial', 'matricula.id_filial = filial.id_filial', 'inner')
                        ->join('graduacao_federado', 'graduacao_federado.id_federado = federado.id_federado', 'inner')
                        ->join('graduacao', 'graduacao_federado.id_graduacao = graduacao_federado.id_graduacao', 'inner')
                        ->join('modalidade', 'modalidade.id_modalidade = graduacao_federado.id_modalidade', 'inner')
                        ->where(array('federado.id_tipo_federado' => '1', 'filial.id_Filial' => $filial, 'federado.id_status' => '1'))
                        ->order_by('graduacao.grau', 'ASC')
                        ->get()
                        ->result_array();
    }

}
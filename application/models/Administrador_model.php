<?php
class Administrador_model extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    // met�dos para Manter dados de Federados
    /*
     * @return instrutores para serem colocados em um combobox
     */
    public function MntFedInstrutor()
    {
        return $this->db
                    ->select("registro as id, nome")
                    ->from("federado")
                    ->where("tipo_federado >=",2)
                    ->order_by("nome","asc")
                    ->get()
                    ->result();
    }
    
    /*
     * @param instrutor respons�vel por filiais
     * @return filiais que o instrutor escolhido � respons�vel
     */
    public function MntFedFilial($instrutor)
    {
        return $this->db
                    ->select("idFilial as id, nome")
                    ->from("filial")
                    ->where("instrutor =",$instrutor)
                    ->order_by("nome","asc")
                    ->get()
                    ->result_array();
    }
    
    /*
     * @param filial a ser pesquisada e a situa��o a ser abordada na pesquisa
     * @return federados que perten�am a filial pesquisada e que est�o na situa��o pesquisada
     */
    public function MntFedFederado($filial,$status)
    {
        return $this->db
                    ->select("federado.registro, federado.nome")
                    ->from("federado")
                    ->join("matricula","federado.registro = matricula.registro","inner")
                    ->where("matricula.id_filial",$filial)
                    ->where("federado.status",$status)
                    ->order_by("federado.nome","asc")
                    ->get()
                    ->result();
    }
    
    /*
     * @param federado escolhido no combobox
     * @return alguns dados do federado escolhido para serem mostrados na tela de pesquisa
     */
    public function MntFedDados($federado)
    {
       return $this->db
                    ->select(
                             "federado.nome AS nome,
                              federado.data_nascimento AS dtNasc,
                              federado.telefone AS telefone,
                              federado.email AS email,
                              federado.celular AS celular,
                              federado.sexo AS sexo,
                              escolaridade.descricao AS escolaridade,
                              nacionalidade.nacionalidade AS nacionalidade,
                              graduacao.faixa AS faixa"
                            )
                    ->from("federado")
                    ->join("escolaridade","federado.escolaridade = escolaridade.id","inner")
                    ->join("nacionalidade","federado.nacionalidade = nacionalidade.id","inner")
                    ->join("graduacao_federado","federado.registro = graduacao_federado.federado","inner")
                    ->join("graduacao","graduacao_federado.modalidade = graduacao.modalidade AND graduacao_federado.grau = graduacao.grau","inner")
                    ->where("federado.registro",$federado)
                    ->where("graduacao_federado.status",1)
                    ->get()
                    ->result();
    }
    // fim met�dos para Manter dados de Federados
    
    //CRU tabela de federados
    /*
     * @param federado que se deseja alterar as informa��es
     * #return todas as informa��es guardadas na tabela de federados
     */
    public function AlterarDadosFederado($federado)// met�do para puxar informa��es para p�gina de altera��o
    {
        $query = $this->db->get_where('federado',array('registro' => $federado));
        return $query->result();
    }
    
    /*
     * @param array associativo com as informa��es a serem inseridas no banco, onde as posi��es do array devem ser os campos da tabela e os valores as novas informa��es a serem inseridas
     */
    public function InserirFederado($dados = array())
    {
        $this->db->insert('federado',$dados);
    }
    
    /*
     * @param identificador do federado a ter as informa��es alteradas junto com as altera��es em um array
     */
    public function AtualizarDadosFederado($registro,$dados = array())
    {
        $this->db->update('federado',$dados,array('registro' => $registro));
    }
    
    //fim CRU tabela de federados
    
    //met�do para pegar os e-mails para envio de notifica��o
    /*
     * @param criterio de pesquisa de e-mails no banco de dados -  de 1 a 7
     * @return lista de e-mails dos federados alvo da notifica��o
     */
    public function NotifEmail($criterio)
    {
        $where = array();
        if($criterio == 1)
        {
            $this->db->where("tipo_federado",1);
        }
        else if($criterio == 2)
        {
            $this->db->where("tipo_federado",2);
        }
        else if($criterio == 3)
        {
            $this->db->where("tipo_federado",3);
        }
        else if($criterio == 5)
        {
            $this->db->where("tipo_federado",1);
            $this->db->where("tipo_federado",2);
        }
        else if($criterio == 6)
        {
            $this->db->where("tipo_federado",1);
            $this->db->where("tipo_federado",3);
        }
        else if($criterio == 7)
        {
            $this->db->where("tipo_federado",2);
            $this->db->where("tipo_federado",3);
        }
        return $this->db
                    ->select("nome, email")
                    ->from("federado")
                    ->order_by("nome","asc")
                    ->get()
                    ->result();
    }
    
    // met�do para pegar o hist�rico de notas do federado no banco de dados
    /*
     * #param federado a ser pesquisado no banco de dados
     * @return as notas em gradua��es de faixa do federado passado como parametro
     */
    public function HistFederado($federado)
    {
        return $this->db
                    ->select("registro_federado as federado,id_evento as evento, arquivo")
                    ->from("prontuario")
                    ->where("registro_federado",$federado)
                    ->order_by("id_evento","desc")
                    ->get()
                    ->result();
    }
    
    // CRU tabela de endere�o
    /*
     * @param array associativo com as informa��es a serem inseridas no banco, onde as posi��es do array devem ser os campos da tabela e os valores as novas informa��es a serem inseridas
     */
    public function InserirEndereco($dados = array())
    {
        $this->db->insert('endereco',$dados);
    }
    
    /*
     * @param identificador do endere�o a ter as informa��es atualizadas junto com o array com as novas informa��es
     */
    public function AtualizarEndereco($registro,$dados = array())
    {
        $this->db->update('endereco',$dados,array('registro' => $registro));
    }
    
    /*
     * @param numero de registro do endere�o que est� cadastrado no banco para ser alterado
     * @return as informa��es guardadas no banco de dados para serem alterados 
     */
    public function AlterarEndereco($registro)// met�do para puxar informa��es para p�gina de altera��o
    {
        $query = $this->db->get_where('endereco',array('registro' => $registro));
        return $query->result();
    }
        
    //fim CRU tabela de endere�os
    
    //met�dos para ser utilizado Manter dados de filiais
    /*
     | @return lista das filiais para preencher o combobox
     */
    public function MntFilial()
    {
        return $this->db
                    ->select("idFilial as id, nome")
                    ->from("filial")
                    ->order_by("nome","asc")
                    ->get()
                    ->result();
    }
    
    /*
     | @param identificador da filial para pesquisa no banco
     | @return informa��es para apresentar na tela de pesquisa de filiais
     */    
    public function MntFilialDados($id)
    {   
        return $this->db
                    ->select
                        (
                            "filial.idFilial AS id,
                            filial.nome AS nome,
                            filial.telefone AS telefone,
                            filial.fax AS fax,
                            filial.email AS email,
                            filial.site AS site,
                            filial.representante AS representante,
                            federado.nome AS instrutor,
                            endereco.logradouro AS logradouro,
                            endereco.numero AS numero,
                            endereco.bairro AS bairro,
                            endereco.cidade AS cidade,
                            endereco.uf AS uf"
                         )
                    ->from("filial")
                    ->join("federado","filial.instrutor = federado.registro","inner")
                    ->join("endereco","filial.endereco = endereco.registro","inner")
                    ->where("idFilial",$id)
                    ->get()
                    ->result();
    }
    // fim
    
    //CRU - tabela de filiais
    /*
     * @param array associativo com as informa��es a serem inseridas no banco, onde as posi��es do array devem ser os campos da tabela e os valores as novas informa��es a serem inseridas
     */
    public function InserirFilial($dados = array())
    {
        $this->db->insert('filial',$dados);
    }
    
    /*
     * @param identificador da filial
     */
    public function AtualizarFilial($id,$dados = array())
    {
        $this->db->update('filial',$dados,array('idFilial' => $id));
    }
    
    /*
     * @param identificador da filial que ter� seus dados alterados
     * @return dados da filial que vai ser alterada
     */
    public function AlterarDadoasFilial($id)// met�do para puxar informa��es para p�gina de altera��o
    {
        $query = $this->db->get_where('filial',array('idFilial' => $id));
        return $query->result();
    }
    //fim CRU - tabela de filiais
        
}
?>

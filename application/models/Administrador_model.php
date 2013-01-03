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
        $sql = "CALL prMntFedInstrutor()";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    /*
     * @param instrutor respons�vel por filiais
     * @return filiais que o instrutor escolhido � respons�vel
     */
    public function MntFedFilial($intrutor)
    {
        $sql = "CALL prMntFedFilial(?)";
        $query = $this->db->query($sql,$instrutor);
        return $query->result_array();
    }
    
    /*
     * @param filial a ser pesquisada e a situa��o a ser abordada na pesquisa
     * @return federados que perten�am a filial pesquisada e que est�o na situa��o pesquisada
     */
    public function MntFedFederado($filial,$status)
    {
        $sql = "CALL prMntFedFederados(?,?)";
        $query = $this->db->query($sql,array($filial,$status));
        return $query->result_array();
    }
    
    /*
     * @param federado escolhido no combobox
     * @return alguns dados do federado escolhido para serem mostrados na tela de pesquisa
     */
    public function MntFedDados($federado)
    {
       $sql = "CALL prMntFedDados(?)";
       $query = $this->db->query($sql,$federado);
       return $query->result_array();
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
        return $query->result_array();
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
    public function AlterarDadosFederado($registro,$dados = array())
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
        $sql = "CALL prNotifEmail(?)";
        $query = $this->db->query($sql,$criterio);
        return $query->result_array();
    }
    
    // met�do para pegar o hist�rico de notas do federado no banco de dados
    /*
     * #param federado a ser pesquisado no banco de dados
     * @return as notas em gradua��es de faixa do federado passado como parametro
     */
    public function HistFederado($federado)
    {
        $sql = "CALL prHistFed(?)";
        $query = $this->db->query($sql,$federado);
        return $query->result_array();
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
        return $query->result_array();
    }
        
    //fim CRU tabela de endere�os
    
    //met�dos para ser utilizado Manter dados de filiais
    /*
     | @return lista das filiais para preencher o combobox
     */
    public function MntFilial()
    {
        $sql = "CALL prFiliais()";
        $query = $this->db->query($sql);
        return $query->result_query();
    }
    
    /*
     | @param identificador da filial para pesquisa no banco
     | @return informa��es para apresentar na tela de pesquisa de filiais
     */    
    public function MntFilialDados($id)
    {
        $sql = "CALL prFilialDados(?)";
        $query = $this->db->query($sql,$id);
        return $query->result_query();
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
        return $query->result_array();
    }
    //fim CRU - tabela de filiais
        
}
?>

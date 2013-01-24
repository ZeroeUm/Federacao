<?php
class Administrador_model extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    // metódos para Manter dados de Federados
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
     * @param instrutor responsável por filiais
     * @return filiais que o instrutor escolhido é responsável
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
     * @param filial a ser pesquisada e a situação a ser abordada na pesquisa
     * @return federados que pertençam a filial pesquisada e que estão na situação pesquisada
     */
    public function MntFedFederado($filial,$status)
    {
        return $this->db
                    ->select("federado.registro as id, federado.nome")
                    ->from("federado")
                    ->join("matricula","federado.registro = matricula.federado","inner")
                    ->where("matricula.id_filial",$filial)
                    ->where("federado.status",$status)
                    ->order_by("federado.nome","asc")
                    ->get()
                    ->result_array();
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
                    ->join("escolaridade","federado.escolaridade = escolaridade.id","inner")
                    ->join("nacionalidade","federado.nacionalidade = nacionalidade.id","inner")
                    ->join("graduacao_federado","federado.registro = graduacao_federado.federado","inner")
                    ->join("graduacao","graduacao_federado.modalidade = graduacao.modalidade AND graduacao_federado.grau = graduacao.grau","inner")
                    ->where("federado.registro",$federado)
                    ->where("graduacao_federado.status",1)
                    ->get()
                    ->result_array();
    }
    // fim metódos para Manter dados de Federados
    
    //CRU tabela de federados
    /*
     * @param federado que se deseja alterar as informações
     * #return todas as informações guardadas na tabela de federados
     */
    public function DadosFederado($federado)// metódo para puxar informações para página de alteração
    {
        $query = $this->db->get_where('federado',array('registro' => $federado));
        return $query->result_array();
    }
    
    public function ImprimirDadosFederado($federado)
    {
        return $this->db
                    ->select(
                                '
                                 federado.nome as nome,
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
                                 estados.sigla as uf
                                '
                            )
                    ->from('federado')
                    ->join('nacionalidade','federado.nacionalidade = nacionalidade.id','join')
                    ->join('escolaridade','federado.escolaridade = escolaridade.id','join')
                    ->join('tipo_federado','federado.tipo_federado = tipo_federado.id','join')
                    ->join('status_federado','federado.status = status_federado.id','join')
                    ->join("graduacao_federado","federado.registro = graduacao_federado.federado","inner")
                    ->join("graduacao","graduacao_federado.modalidade = graduacao.modalidade AND graduacao_federado.grau = graduacao.grau","inner")
                    ->join('endereco','federado.endereco = endereco.registro','join')
                    ->join('estados','endereco.uf = estados.id','join')
                    ->where("federado.registro",$federado)
                    ->where("graduacao_federado.status",1)
                    ->get()
                    ->result_array();
                        
    }
    
    /*
     * @param array associativo com as informações a serem inseridas no banco, onde as posições do array devem ser os campos da tabela e os valores as novas informações a serem inseridas
     */
    public function InserirFederado($dados = array())
    {
        $this->db->insert('federado',$dados);
    }
    
    /*
     * @param identificador do federado a ter as informações alteradas junto com as alterações em um array
     */
    public function AtualizarDadosFederado($registro,$dados = array())
    {
        $this->db->update('federado',$dados,array('registro' => $registro));
    }
    
    //fim CRU tabela de federados
    
    public function getNacionalidade()
    {
        return $this->db->select('id,nacionalidade')->from('nacionalidade')->order_by('nacionalidade','ASC')->get()->result_array();
    }
    
    public function getEscolaridade()
    {
        return $this->db->get('escolaridade')->result_array();
    }
    
    public function getStatus()
    {
        return $this->db->get('status_federado')->result_array();
    }
    
    public function getEndereco($registro)
    {
        return $this->db->get_where('endereco',array('registro' => $registro))->result_array();
    }
    
    public function getTipoFederado()
    {
        return $this->db->get('tipo_federado')->result_array();
    }
    
    public function getUF()
    {
        return $this->db->select('id,sigla')->from('estados')->order_by("sigla","asc")->get()->result_array();
    }
    
    //metódo para pegar os e-mails para envio de notificação
    /*
     * @param criterio de pesquisa de e-mails no banco de dados -  de 1 a 7
     * @return lista de e-mails dos federados alvo da notificação
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
                    ->result_array();
    }
    
    // metódo para pegar o histórico de notas do federado no banco de dados
    /*
     * #param federado a ser pesquisado no banco de dados
     * @return as notas em graduações de faixa do federado passado como parametro
     */
    public function HistFederado($federado)
    {
        return $this->db
                    ->select("registro_federado as federado,id_evento as evento, arquivo")
                    ->from("prontuario")
                    ->where("registro_federado",$federado)
                    ->order_by("id_evento","desc")
                    ->get()
                    ->result_array();
    }
    
    // CRU tabela de endereço
    /*
     * @param array associativo com as informações a serem inseridas no banco, onde as posições do array devem ser os campos da tabela e os valores as novas informações a serem inseridas
     */
    public function InserirEndereco($dados = array())
    {
        $this->db->insert('endereco',$dados);
    }
    
    /*
     * @param identificador do endereço a ter as informações atualizadas junto com o array com as novas informações
     */
    public function AtualizarEndereco($registro,$dados = array())
    {
        $this->db->update('endereco',$dados,array('registro' => $registro));
    }
    
    /*
     * @param numero de registro do endereço que está cadastrado no banco para ser alterado
     * @return as informações guardadas no banco de dados para serem alterados 
     */
    public function AlterarEndereco($registro)// metódo para puxar informações para página de alteração
    {
        $query = $this->db->get_where('endereco',array('registro' => $registro));
        return $query->result_array();
    }
        
    //fim CRU tabela de endereços
    
    //metódos para ser utilizado Manter dados de filiais
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
                    ->result_array();
    }
    
    /*
     | @param identificador da filial para pesquisa no banco
     | @return informações para apresentar na tela de pesquisa de filiais
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
                    ->result_array();
    }
    // fim
    
    //CRU - tabela de filiais
    /*
     * @param array associativo com as informações a serem inseridas no banco, onde as posições do array devem ser os campos da tabela e os valores as novas informações a serem inseridas
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
     * @param identificador da filial que terá seus dados alterados
     * @return dados da filial que vai ser alterada
     */
    public function AlterarDadoasFilial($id)// metódo para puxar informações para página de alteração
    {
        $query = $this->db->get_where('filial',array('idFilial' => $id));
        return $query->result_array();
    }
    //fim CRU - tabela de filiais
        
}
?>

<?php

/*
 * 2013-03-05
 * @author Humberto
 */

class Login_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    
    
    public function get_email($email){
        $sql = "SELECT nome,email,login.senha 
                FROM 
                federacao.federado
                join login using (id_federado)
                where email like  '$email'";
        return $this->db->query($sql)->result_array();
    }
    

    public function login($usuario, $senha)
    {
        $query = $this->db
                        ->select('id_federado')
                        ->from('login')
                        ->where('login', $usuario)
                        ->where('senha', $senha)
                        ->limit(1)
                        ->get();

        if ($query->num_rows() == 1)
            return TRUE;
        else
            return FALSE;
    }
    
    public function IDFedereado($usuario,$senha)
    {
        return $this->db
                        ->select('id_federado')
                        ->from('login')
                        ->where('login', $usuario)
                        ->where('senha', $senha)
                        ->limit(1)
                        ->get()
                        ->result_array();
    }

    function primeiroAcesso($id){
        $sql = "SELECT status FROM federacao.login where id_federado = $id";
        $dados = $this->db->query($sql)->result_array();
        if($dados['0']['status']=='0'){
            return true;
        }else{
            return false;
        }
        
    }


    public function dadosUsuario($id)
    {
        return $this->db
                    ->select('
                                federado.id_federado AS id, 
                                federado.nome, 
                                federado.caminho_imagem AS foto, 
                                federado.id_tipo_federado AS tipo,
                                modalidade.id_modalidade AS idModalidade,
                                modalidade.nome AS modalidade,
                                graduacao.id_graduacao AS faixa,
                                graduacao.faixa AS nomeFaixa
                            ')
                    ->from('federado')
                    ->join('matricula','federado.id_federado = matricula.id_federado','inner')
                    ->join('modalidade','matricula.id_modalidade = modalidade.id_modalidade','inner')
                    ->join('graduacao_federado','federado.id_federado = graduacao_federado.id_federado','inner')
                    ->join('graduacao','graduacao_federado.id_graduacao = graduacao.id_graduacao','inner')
                    ->where('federado.id_federado', $id)
                    ->where("graduacao_federado.status",1)
                    ->get()
                    ->result_array();
    }
    
    public function verificarStatus($usuario)
    {
        $query = $this->db
                        ->select('federado.id_status as situacao')
                        ->from('login')
                        ->join('federado','login.id_federado = federado.id_federado','inner')
                        ->where('login.login',$usuario)
                        ->get()
                        ->result_array();
        if(@$query[0]['situacao'] == 0):
            return FALSE;
        else:
            return TRUE;
        endif;
        
    }
    
    public function trocarSenha($usuario,$dados)
    {
       
        $this->db->update('login',$dados,array('id_federado' => $usuario));
    }

}

?>

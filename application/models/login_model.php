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

    public function dadosUsuario($id)
    {
        return $this->db
                    ->select('federado.id_federado as id, federado.nome, federado.caminho_imagem as foto, federado.id_tipo_federado as tipo,modalidade.nome as modalidade')
                    ->from('federado')
                    ->join('matricula','federado.id_federado = matricula.id_federado','inner')
                    ->join('modalidade','matricula.id_modalidade = modalidade.id_modalidade','inner')
                    ->where('federado.id_federado', $id)
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
        if($query[0]['situacao'] == 0):
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

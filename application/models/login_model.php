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
            return $query -> result_array();
        else
            return FALSE;
    }

    public function dadosUsuario($id)
    {
        return $this->db
                    ->select('federado.id_federado as id, federado.nome, federado.caminho_imagem as foto, federado.id_tipo_federado as tipo,modalidade.nome as modalidade')
                    ->from('federado')
                    ->join('matricula','federado.id_federado = matricula.id_federado','join')
                    ->join('modalidade','matricula.id_modalidade = modalidade.id_modalidade','join')
                    ->where('federado.id_federado', $id)
                    ->get()
                    ->result_array();
    }

}

?>

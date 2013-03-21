<?php

/*
 * 2013-03-05
 * @author Humberto
 */

class login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model", 'login');
    }

    function index()
    {
        $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required|xss_clean');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean|verificar_banco');

        if ($this->form_validation->run() == FALSE):
            $this->load->view('login');
        else:
            
        endif;    
        
    }

    function verificar_banco($senha)
    {
        $usuario = $this->input->post('usuario');
        
        $result = $this->login->login($usuario, $senha);
        
        if ($result):
            $dadosUsuario = $this->login->dadosUsuario($result[0]['id_federado']);
            foreach ($dadosUsuario as $dado):
                $this->session->set_userdata('id', $dado['id']);
                $this->session->set_userdata('nome', $dado['nome']);
                $this->session->set_userdata('foto', $dado['foto']);
                $this->session->set_userdata('modalidade', $dado['modalidade']);
                $this->session->set_userdata('tipo', $dado['tipo']);
            endforeach;
            return TRUE;
        else:
            $this->form_validation->set_message('verificar_banco', 'Usuário ou senha inválidos');
            return FALSE;
        endif;
    }

    function logoff()
    {
        $this->session->unset_userdata('logado');
        session_destroy();
        redirect('login', 'refresh');
    }

}

?>

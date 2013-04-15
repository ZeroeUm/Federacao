<?php

/*
 * 2013-03-05
 * @author Humberto
 */

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model", 'login', TRUE);
    }

    function index()
    {
        $this->form_validation->set_rules('usuario', 'Usu�rio', 'trim|xss_clean|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|callback_verificar_banco|xss_clean|required');

        if ($this->form_validation->run() == FALSE):
            $this->load->view('login');
        else:
            //$this->verificaStatus($this->input->post('usuario'), $this->input->post('senha'));
            redirect('home', 'refresh');
        endif;
    }

    function verificar_banco($senha)
    {
        if ($this->verificaStatus($this->input->post('usuario'), $senha)):
            return TRUE;
        else:
            $this->form_validation->set_message('verificar_banco', (($this->session->userdata('msg')) ? $this->session->userdata('msg') : 'Usu�rio ou senha inv�lidos.'));
            return FALSE;
        endif;
    }

    function verificaStatus($usuario, $senha)
    {
        if ($this->login->verificarStatus($usuario)):
            if ($this->login->login($usuario, $senha)):
                $resultado = $this->login->IDFedereado($usuario, $senha);
                $dadosUsuario = $this->login->dadosUsuario($resultado[0]['id_federado']);
                $this->session->set_userdata($dadosUsuario[0]);
                $this->session->set_userdata('autentificado', TRUE);
                return TRUE;
            else:
                return FALSE;
            endif;
        else:
            $msg = "Usu�rio inativo na federa��o, acesso n�o permitido.";
            $this->session->set_userdata('msg', $msg);
            return FALSE;
        endif;
    }

    function logoff()
    {
        if ($this->session->userdata('autentificado'))
            $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
    
    function trocarSenha($usuario)
    {
        $this->form_validation->set_rules('novaSenha','Nova senha','trim|max_length[10]|xss_clean|required');
        $this->form_validation->set_rules('confirmar','Confirma��o de senha','trim|max_length[10]|matches[novaSenha]|xss_clean|required');
        if($this->form_validation->run() == FALSE):
            $this->load->view('header');
            $dados['usuario'] = $usuario;
            $this->load->view('trocarSenha',$dados);
            $this->load->view('footer');
        else:
            $this->trocar();
        endif;
    }
    
    function trocar()
    {
        $senha = $this->input->post('novaSenha');
        $usuario = $this->input->post('federado');
        $dados = array('senha' => $senha);
        $this->login->trocarSenha($usuario,$dados);
        $this->logoff();
    }
}

?>

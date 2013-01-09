<?php
/**
 * Description of administrador
 *
 * @author Humberto
 */
class administrador extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }

    function notificacoes() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function federados() 
    {
        $this->load->model('Administrador_model','administrador');
        $this->load->view('header');
        $dados['instrutores'] = $this->administrador->MntFedInstrutor();
        $this->load->view('administrador/manterFederados',$dados);
        $this->load->view('footer');
    }
    
    function getFiliais($instrutor)
    {
        $this->load->model('Administrador_model','administrador');
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->administrador->MntFedFilial($instrutor)));
    }

    function pedidos() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function historico() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function filiais() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function maladireta() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

}

?>

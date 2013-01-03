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
        $this->load->model('Administrador_model','administrador');
    }

    function notificacoes() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function federados() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
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

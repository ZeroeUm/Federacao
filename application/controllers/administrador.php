<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administrador
 *
 * @author felipe
 */
class administrador extends CI_Controller {

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

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of site
 *
 * @author felipe
 */
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->checar_sessao();
    }

    function checar_sessao() {
        if (!$this->session->userdata('autentificado'))
            redirect('login', 'refresh');
    }

    function index() {

        $tipo = $this->session->userdata('tipo');


        switch ($tipo) {
            case '1';
                redirect('/alunos');
                break;
            case '2';
                redirect('/instrutores');
                break;
            case '3';
                redirect('/coordenador');
                break;
            case '4';
                redirect('/administrador');
                break;
        }

        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }

}

?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coordenador
 *
 * @author felipe
 */
class coordenador extends CI_Controller{
    
    function professores(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
    function filiais(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
    function certificados(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
    function comprafaixas(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
    function prontuario(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
    function modalidade(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }


    function graduados(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
}

?>

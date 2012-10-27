<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of instrutores
 *
 * @author felipe
 */
class instrutores extends CI_Controller{
    
    function cadastro(){
       $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
     function novoaluno(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
     function inscricao(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
     function manutencao(){
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }
    
    
}

?>

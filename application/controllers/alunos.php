<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alunos
 *
 * @author felipe
 */
class alunos extends CI_Controller{
    
   function notas(){
       $this->load->view('header');
         $this->load->view('alunos/notas');
        $this->load->view('footer');
   }
   
   function eventos(){
       $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
   }
   
   function historico(){
       $this->load->view('header');
         $this->load->view('devel');
        $this->load->view('footer');
   }
   
   function modalidade(){
       $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
   }
}

?>

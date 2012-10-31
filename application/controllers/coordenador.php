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
        
      $this->load->model('FilialModel');
      $this->load->view('header');
      $this->data['dados'] = $this->FilialModel->get_filiais();
       
     
      if($this->input->post()){
      $this->data['filial'] = $this->input->post('filial');
      $this->load->view('coordenador/modalidades',$this->data);
      $this->load->view('footer');
      }else{
      $this->data['filial'] = "Nenhuma filial selecionada";
      $this->load->view('coordenador/modalidades',$this->data);
      $this->load->view('footer');
      }
      
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

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
        
        $this->load->model('Modalidade_model','modalidade');
        $this->load->model('filial_model','filiais');
        
        $data['alunos'] = $this->modalidade->get_modalidade();
  
       
        $this->load->view('header');
        $this->load->view('coordenador/cadastroFiliais',$data);
        $this->load->view('footer');
        
        
         if($this->input->post()){
             
             $dados = $this->input->post();
             
               echo "<pre>";
        print_r($dados);
        echo "</pre>";
        
             
            if($this->filiais->set_filiais($dados)){
                $this->session->set_flashdata('key', 'Salvo com sucesso');
                redirect('/coordenador/index');
            }else{
                
            };
             
             
      
        }
    }
    
    function index(){
        $this->load->view('header');
        $this->load->view('coordenador/index');
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

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
    
    
    
    
    
    function modalidade(){
       $this->load->model('Modalidade_model', 'modalidades');
        $data['categorias'] = $this->modalidades->get_modalidade();
        $this->load->view('header');
        $this->load->view('/coordenador/modalidade',$data);
        $this->load->view('footer');
    }


    function ajax_professores_modalidade($id_modalidade=null){
        $this->load->model('Instrutor_model','instrutores');
        
        $this->instrutores->get_instrutor_modalidade('4');
        die($id_modalidade);
    
        
    }
}

?>

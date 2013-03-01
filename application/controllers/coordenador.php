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
    
    function mostrarFiliais($filial=null){
         $this->load->model('coordenador_model', 'coordenador');
        $filial = $this->coordenador->MntFilialDados($filial);
        $data['resultado'] = $filial;
        $this->load->view('/coordenador/mostrarFilial',$data);
       
    }
    
    function dados_filial(){
         $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $dados['filiais'] = $this->administrador->MntFilial();
        $this->load->view('coordenador/manterFiliais', $dados);
        $this->load->view('footer');
    }
    
    function modalidade(){
       $this->load->model('Modalidade_model', 'modalidades');
        $data['categorias'] = $this->modalidades->get_modalidade();
        $this->load->view('header');
        $this->load->view('/coordenador/modalidade',$data);
        $this->load->view('footer');
    }


    function professores_modalidade($id_professor=null){
       
       
       $this->load->model('Coordenador_model', 'coordenador');
       
       $data['professor'] = $this->coordenador->get_professores($id_professor);
//       echo "<pre>";
//       print_r($data);
//       echo "</pre>";
       
       $this->load->view('/coordenador/professores_modalidade',$data);
       return true;
    }
    
    
}

?>

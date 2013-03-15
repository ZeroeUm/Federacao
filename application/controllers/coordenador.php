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

    
    
    
    
    function criarEvento() {
        $this->load->view('header');




        if ($this->input->post()) {

            $this->load->model('coordenador_model', 'coordenador');

            
            $dados = $this->input->post();
           
            $inserido = $this->coordenador->insertEvento($dados);

            if ($inserido) {
                     redirect('/coordenador/listaEventos');
            } else {
               
            };
        } else {
            $this->load->model('Modalidade_model', 'modalidades');
            $data['modalidades'] = $this->modalidades->get_modalidade();
            $this->load->view('coordenador/criarEvento', $data);
            $this->load->view('footer');
        }
    }

    
    function removerEvento($id_evento){
        
        $this->load->model('coordenador_model','coordenador');
        if($this->coordenador->deletarEvento($id_evento)){
            $this->session->set_flashdata('msg','Removido com sucesso');
            redirect('/coordenador/listaEventos');
        }else{
            $this->session->set_flashdata('msg','Não foi possivel remover o evento, pois o mesmo já possui Federados associados a ele');
            redirect('/coordenador/listaEventos');
        };
    }
    
    function listaEventos(){
                
        
                $this->load->model('coordenador_model', 'coordenador');
                $data['eventos'] = $this->coordenador->getEventos();
                
                
                
                
                
                
                $this->load->view('header');
                $this->load->view('coordenador/listaEventos',$data);
                $this->load->view('footer');
    }


    function editarEvento($id_evento){
        
        //$data['Eventos'] = $this->coordenador_model->getEventoUnico($id_evento);
        
       $u = new Evento();
       $u->select("id_evento");
       $u->get(3);
       
       $arr = array();
       foreach ($u->all as $valor){
         $arr[] = $valor->id_evento;  
       };
       
       print_r($arr);
       
        
        
        
        die('fim');
        
       $this->load->view('header');
        $this->load->view('coordenador/editar');
        $this->load->view('footer');
        
        
        
        
        
        
        
        
        
    }

    function mostrarFiliais($filial = null) {
        $this->load->model('coordenador_model', 'coordenador');
        $filial = $this->coordenador->MntFilialDados($filial);
        $data['resultado'] = $filial;
        $this->load->view('/coordenador/mostrarFilial', $data);
    }

    function dados_filial() {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $dados['filiais'] = $this->administrador->MntFilial();
        $this->load->view('coordenador/manterFiliais', $dados);
        $this->load->view('footer');
    }

    function modalidade() {
        $this->load->model('Modalidade_model', 'modalidades');
        $data['categorias'] = $this->modalidades->get_modalidade();
        $this->load->view('header');
        $this->load->view('/coordenador/modalidade', $data);
        $this->load->view('footer');
    }

    function professores_modalidade($id_professor = null) {


        $this->load->model('Coordenador_model', 'coordenador');

        $data['professor'] = $this->coordenador->get_professores($id_professor);
//       echo "<pre>";
//       print_r($data);
//       echo "</pre>";

        $this->load->view('/coordenador/professores_modalidade', $data);
        return true;
    }

}

?>

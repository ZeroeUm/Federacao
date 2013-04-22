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

     function __construct()
    {
        parent::__construct();
        $this->load->model('coordenador_model', 'coordenador');
        $this->load->library('funcoes');
    }
    
    function certificado(){
                $this->load->view('header');
                $this->load->view('coordenador/certificado');
                $this->load->view('footer');
    }
    
    
    function notas(){
                $this->load->view('header');
                $this->load->view('coordenador/notas');
                $this->load->view('footer');
    }
    function  curriculo(){
                $this->load->view('header');
                $this->load->view('coordenador/curriculo');
                $this->load->view('footer');
    }
    
   
    function pre_avaliar(){
                
        
                $dados['filiais'] = $this->coordenador->FiliaisAgen();
        
                               
                $this->load->view('header');
                $this->load->view('coordenador/lista_pre_avaliar',$dados);
                $this->load->view('footer');
                
                if($this->input->post()){
                    $id = $this->input->post('id_filial');
                    redirect("coordenador/agendar_pre_avaliacao/$id");
                }
                
               
    }
    
    function agendar_pre_avaliacao($id_filial=null){
                
        
                $dados['id_filial'] = $id_filial;
                $dados['alunos'] = $this->coordenador->getPreAvaliar($id_filial);
                $this->load->view('header');
                $this->load->view('coordenador/lista_alunos_avaliacao',$dados);
                $this->load->view('footer');
                
           if($this->input->post()){
            
            $this->funcoes->imprimir($this->input->post());
            die('fim');
            }
                
    }
    
    function prontuario(){
            
            
         $this->load->model('coordenador_model','coordenador');   
         $this->load->view('header');
         $this->load->view('footer');
           
    }
    
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

 
    function participantes($id_evento,$faixa='0'){
        $this->load->model('coordenador_model','coordenador');   
                
        $data['participantes'] = $this->coordenador->getParticipantes($id_evento,$faixa);
        $data['id_evento'] = $id_evento;
        $data['faixa'] = $faixa;
        $contar = count($data['participantes']);
        if($contar==0){
            $this->session->set_flashdata('erro', 'Nenhum participante cadastrado para essa categoria');
            redirect("/coordenador/listaEventos");
        }
        $data['faixas']= $this->coordenador->getFaixas($data['participantes']['0']['id_modalidade']);
        
        
       
        $this->load->view('header');
        $this->load->view('coordenador/participantes',$data);
        $this->load->view('footer');
    }
    
    
    function editarEvento($id_evento){
        $this->load->model('coordenador_model','coordenador');   
        
        $data['id'] = $id_evento;
        $data['estados'] = $this->coordenador->getEstados();
        $data['Eventos'] = $this->coordenador->getEventoUnico($id_evento);
        $this->load->view('header');
        $this->load->view('coordenador/editar',$data);
        $this->load->view('footer');
        
        if($this->input->post()){
            
            $this->coordenador->editEvento($this->input->post('data'));
            redirect('/coordenador/listaEventos');
        }
        
        
        
        
        
        
        
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

        $this->load->view('/coordenador/professores_modalidade', $data);
        return true;
    }

}

?>

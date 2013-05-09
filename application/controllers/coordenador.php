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
        $this->load->library('funcoes','session');
        
        
    }
   
    function participantes($id_evento,$faixa=null){
       
        
       $dados['faixa'] = $faixa;
       $dados['id_evento'] = $id_evento; 
       $dados['faixas'] = $this->coordenador->faixas_por_evento($id_evento); 
       $dados['participantes'] = $this->coordenador->participantes_evento($id_evento,$faixa);
       
      
                $this->load->view('header');
                $this->load->view('coordenador/participantes',$dados);
                $this->load->view('footer');
    }
    
    function salvar_pedido(){
        $faixa = $this->input->post('faixa');
        $id_evento = $this->input->post('id_evento');
        foreach ($faixa as $i=>$v){
            $i = explode('X',$i);
            $id_graduacao = $i['0'];
            $tamanho = $i['1'];
            $quantidade = $v;
            
                $v = $this->coordenador->pedidos($id_evento,$id_graduacao,$quantidade,$tamanho);
            if($v!=true){
                $this->session->set_flashdata('alerta','Já foi realizado pedido de faixa para esse evento');
                redirect("/coordenador/totalizar_faixa/$id_evento");
            }
        }
        $this->session->set_flashdata('alerta','Pedido de faixas realizado com sucesso');
        redirect('/coordenador/solicitar_faixa');
    }

    function totalizar_faixa($id_evento=null){
        
        $dados['totais'] = $this->coordenador->totalizar_faixas_por_evento($id_evento);
        $dados['evento'] = $this->coordenador->getEventoUnico($id_evento);
       
                $this->load->view('header');
                $this->load->view('coordenador/totalizar_faixa',$dados);
                $this->load->view('footer');
    }
    
    function solicitar_faixa(){
        
        $dados['eventos'] = $this->coordenador->pedidos_para_evento();
            
                $this->load->view('header');
                $this->load->view('coordenador/solicitar_faixa',$dados);
                $this->load->view('footer');
    }


    function ajax_remover_curriculo($id){
        
        $dados = $this->coordenador->remover_movimento_id($id);
        if($dados){
            echo "Removido com sucesso";
        }else{
            echo "Não foi possível remover esse movimento de faixa";
        }
    }




    function index(){
        $dados['ultimo_evento'] = $this->coordenador->ultimo_evento();
        
        
        $dados['total']= $this->coordenador->agendamento_pendentes();
        $dados['agenda']= $this->coordenador->compromisso_agendados();
        
                $this->load->view('header');
                $this->load->view('coordenador/index',$dados);
                $this->load->view('footer');
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
        
                $dados['faixas'] = $this->coordenador->getFaixas('1');
                
                
                $this->load->view('header');
                $this->load->view('coordenador/curriculo',$dados);
                $this->load->view('footer');
    }
    
   
    function alterar_curriculo(){
        if($this->input->post()){
            
            $this->coordenador->incluir_movimento_faixa($this->input->post());
            $this->session->set_flashdata('alerta','Incluido com sucesso');
            redirect('/coordenador/curriculo');
        }
    }
    
    function ajax_curriculo($id_graduacao){
        
        $dados['movimentos'] = $this->coordenador->movimentos($id_graduacao);
        $dados['graduacao'] = $id_graduacao;
        
        $this->load->view('coordenador/ajax_curriculo',$dados);
        
    }


    function pre_avaliar(){
                
        
                $dados['filiais'] = $this->coordenador->FiliaisAgen();
                $total = count($dados['filiais']);
               
                               
                $this->load->view('header');
                $this->load->view('coordenador/lista_pre_avaliar',$dados);
                $this->load->view('footer');
                
                
                
                if($this->input->post()){
                    $id = $this->input->post('id_filial');
                    redirect("coordenador/agendar_pre_avaliacao/$id");
                }
                
               
    }
    
    function cancelar_agendamento(){
        if($this->input->post()){
           
            $avaliacao = $this->coordenador->set_cancelar_agendado($this->input->post());
            
            if($avaliacao==true){
                $this->session->set_flashdata('alerta','Cancelado com sucesso');
                redirect('/coordenador/agenda_de_compromissos');
            }else{
                $this->session->set_flashdata('alerta','Não foi possivel cancelar esse agendamento');
                redirect('/coordenador/agenda_de_compromissos');
            }
            
        }else{
            $this->session->set_flashdata('alerta','Nenhum aluno foi selecionado');
            redirect('/coordenador/agenda_de_compromissos');
        }
    }
    
    function ajax_exibir_agenda($id_filial){
                    
                    $dados['agenda'] = $this->coordenador->getCompromissos($id_filial);
                    
                    $this->load->view('coordenador/result_ajax_lista_agendado',$dados);
               
    }
    
    
    function ajax_lancar_notas_lista($id_filial,$faixa = null){
        
                $dados['id_filial'] = $id_filial;
                
                $dados['alunos'] = $this->coordenador->get_alunos_notas($id_filial);
               
                
                $this->load->view('coordenador/ajax_lancar_notas_lista',$dados);
                
        
    }

   
    function avaliacao(){
        
        if($this->input->post()){
            
            //Verificar se a média é ideal;
            //
            $media = $this->input->post('media');
            $id_filial = $this->input->post('id_filial');
            $id_pre_avaliacao = $this->input->post('id_pre_avaliacao');
            $status = 0;
            if($media>=9.51){
                $texto=  "Aprovado com faixa extra";
                $status = 3;
            }elseif ($media >=9) {
                $texto= "Ótimo";
                $status = 2;
            }elseif ($media>=8) {
                $texto= "Bom";
                $status = 2;
            }elseif ($media>=7) {
                $texto= "Regular";
                $status = 2;
            }elseif ($media>=6) {
                $texto= "Refazer o exame";
                $status = 1;
            }else{
                $texto= "Reprovado";
                $status = 0;
            }
            
            if($status==3){
              //salvar as notas no prontuario do aluno
            $this->coordenador->salvarProntuario($this->input->post());
             //incluir o aluno do evento de graduação
            $this->coordenador->incluir_em_evento($this->input->post());
            //mudar o status do pre-avaliação para aprovado
            $this->coordenador->result_pre_avaliacao($this->input->post('id_federado'),$this->input->post('id_evento'),'1');
            //Atualizar a faixa do aluno
            $this->coordenador->atualiza_faixa($this->input->post('id_federado'),'2');
            //Enviar email ao aluno informando sobre o evento
            $this->session->set_flashdata('alerta',"Lançamento realizado, status de avaliação = $texto");
            redirect('/coordenador/lancar_nota');
             }
             
             if($status==2){
                 
            //salvar as notas no prontuario do aluno
            $this->coordenador->salvarProntuario($this->input->post());
             //incluir o aluno do evento de graduação
            $this->coordenador->incluir_em_evento($this->input->post());
            //mudar o status do pre-avaliação para aprovado
            $this->coordenador->result_pre_avaliacao($this->input->post('id_federado'),$this->input->post('id_evento'),'1');
            //Atualizar a faixa do aluno
            $this->coordenador->atualiza_faixa($this->input->post('id_federado'),'1');
            //Enviar email ao aluno informando sobre o evento
            $this->session->set_flashdata('alerta',"Lançamento realizado, status de avaliação = $texto");
            redirect('/coordenador/lancar_nota');     
             }elseif ($status==1) {
            
            //Reagendar uma nova pré-avaliação mudar status da pre-avaliação para agendar
                 
                 $this->coordenador->remarcar_pre_agendar($id_pre_avaliacao);
                 $this->session->set_flashdata('alerta','Será necessário reagendar a avaliação do aluno, informe a data ou clique <a href="/coordenador/lancar_nota">aqui</a> para continuar a lançar notas');
                 redirect("/coordenador/agendar_pre_avaliacao/$id_filial");
                 
            }  else {
            $this->coordenador->result_pre_avaliacao($this->input->post('id_federado'),$this->input->post('id_evento'),'2');
            $this->session->set_flashdata('alerta',"Lançamento realizado, status de avaliação = $texto");
            redirect('/coordenador/lancar_nota');
                
             //Aluno foi reprovado cancela participação no evento, mudar status da pré-avaliação para reprovado
            }

             
            
            
            
        }
    }
    function lancar_notas_aluno($id_federado){
        //pegar dados de faixa do aluno
        //pegar movimentos da faixa candidata
        $dados['aluno']= $this->coordenador->get_aluno_faixa($id_federado);
        
        
        $id_faixa = $dados['aluno']['0']['ordem']+1;
        
        $dados['movimentos'] = $this->coordenador->movimentos($id_faixa);
        $dados['ultimo_evento'] = $this->coordenador->get_ultimo_evento($id_federado);
        
//        $this->funcoes->imprimir($dados['movimentos']);
        $this->load->view('header');
        $this->load->view('/coordenador/lancar_notas_aluno',$dados);
        $this->load->view('footer');
        
        //preparar o prontuário com notas do aluno
        //inclui-lo automáticamente no evento de graduação
        
    }
    

    function lancar_nota(){
                    $this->load->view('header');
                    $dados['filiais'] = $this->coordenador->getFiliais();
                    $this->load->view('coordenador/lancar_nota',$dados);
                    $this->load->view('footer');
    }
    
    function agenda_de_compromissos($id_filial = null){
                    $this->load->view('header');
                    $dados['filiais'] = $this->coordenador->getFiliais();
                    $this->load->view('coordenador/agenda_de_compromissos',$dados);
                    $this->load->view('footer');
    }
    
    
    function agendar_pre_avaliacao($id_filial=null){
                
        
            if($this->input->post()){
            $d = $this->coordenador->agendar_avaliacao($this->input->post());
            if($d==true){
                 $this->session->set_flashdata('alerta','Operação realizada com sucesso');
                 redirect("/coordenador/pre_avaliar");
            }else{
                 $this->session->set_flashdata('alerta','Não foi possivel alterar a participação dos alunos');
                  redirect("/coordenador/pre_avaliar");
            };   
            
            }
        
                $dados['id_filial'] = $id_filial;
                $dados['alunos'] = $this->coordenador->getPreAvaliar($id_filial);
                $this->load->view('header');
                $this->load->view('coordenador/lista_alunos_avaliacao',$dados);
                $this->load->view('footer');
                
           
                
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
                $this->session->set_flashdata('alerta','Você já possui um evento para o mês Selecionado');   
                redirect('/coordenador/criarEvento'); 
            };
        } else {
            $this->load->model('Modalidade_model', 'modalidades');
            $data['modalidades'] = $this->modalidades->get_modalidade();
            $this->load->view('coordenador/criarEvento', $data);
            $this->load->view('footer');
        }
    }

    function imprimir_listagem($id_faixa = null){
       
        if(!empty($id_faixa)){
          $id_evento = $this->coordenador->getUltimoEvento(); 
          $dados['movimentos'] = $this->coordenador->movimentos($id_faixa);
          $dados['participantes'] = $this->coordenador->Participantes($id_faixa,$id_evento);
          
          $this->load->view('coordenador/imprimir_listagem',$dados);
          
          
        }
    }
    function listagem(){
        
        
        
        
        
        $dados['faixas'] = $this->coordenador->get_faixas_avaliadas();
        
        
        
        $this->load->view('header');
        $this->load->view('coordenador/listagem',$dados);
        $this->load->view('footer');
    }
    
    function removerEvento($id_evento){
        
        $this->load->model('coordenador_model','coordenador');
        if($this->coordenador->deletarEvento($id_evento)){
            $this->session->set_flashdata('alerta','Removido com sucesso');
            redirect('/coordenador/listaEventos');
        }else{
            $this->session->set_flashdata('alerta','Não foi possivel remover o evento, pois o mesmo já possui Federados associados a ele');
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

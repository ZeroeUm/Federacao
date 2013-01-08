<?php

/**
 * Description of administrador
 *
 * @author Humberto
 */
class administrador extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Administrador_model','administrador');
    }

    function notificacoes() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function federados() 
    {
        $this->load->view('header');
        $dados['instrutores'] = $this->administrador->MntFedInstrutor();
        $this->load->view('administrador/manterFederados',$dados);
        $this->load->view('footer');
    }
    
    function getFiliais(){
        $instrutor = $this->uri->segment(3);
        $filiais = $this->administrador->MntFedFilial($instrutor);
        
        if(empty($filiais))
            return '{"Nome": "Nenhuma filial associada ao instrutor escolhido" }';
        
        $arrFiliais = array();
        
        foreach($filiais as $filial)
            $arrFiliais[] = '{"id":' . $filial->id . ',"nome":"' . $filial->nome. '"}';
        
        echo '[' . implode(",",$arrFiliais) . ']';
        
        
        return;
    }

    function pedidos() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function historico() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function filiais() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function maladireta() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

}

?>

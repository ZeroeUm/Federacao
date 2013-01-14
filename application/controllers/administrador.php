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
    }

    function notificacoes() 
    {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function federados() 
    {
        $this->load->model('Administrador_model','administrador');
        $this->load->view('header');
        $dados['instrutores'] = $this->administrador->MntFedInstrutor();
        $this->load->view('administrador/manterFederados',$dados);
        $this->load->view('footer');
    }
    
    function getFiliais($instrutor)
    {
        $this->load->model('Administrador_model','administrador');
        header('Content-Type: application/x-json; charset=utf-8');
        $filiais = $this->administrador->MntFedFilial($instrutor);
        for($i = 0;$i < count($filiais);$i++)
        {
            $filiais[$i]["nome"] = htmlentities($filiais[$i]["nome"]);
        }        
        echo(json_encode($filiais));
    }
    
    function getFederados($filial,$status)
    {
        $this->load->model('Administrador_model','administrador');
        header('Content-Type: application/x-json; charset=utf-8');
        $federados = $this->administrador->MntFedFederado($filial,$status);
        
        for($i = 0;$i < count($federados);$i++)
        {
            $federados[$i]["nome"] = htmlentities($federados[$i]["nome"]);
        }
        echo(json_encode($federados));
    }
    
    function getFederado($federado)
    {
        $this->load->model('Administrador_model','administrador');
        header('Content-type: application/x-json; charset=utf-8');
        $federado = $this->administrador->MntFedDados($federado);
    }
    
    function alterarFederado($federado)
    {
        $this->load->model('Administrador_model','administrador');
        $this->load->view('header');
        $dados['federado'] = $this->administrador->AlterarDadosFederado($federado);
        $this->load->view('administrador/alterarFederado',$dados);
        $this->load->view('footer');
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

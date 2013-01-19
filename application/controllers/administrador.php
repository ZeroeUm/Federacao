<?php

/**
 * Description of administrador
 *
 * @author Humberto
 */
class administrador extends CI_Controller
{

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
        $this->load->model('Administrador_model', 'administrador');
        $this->load->view('header');
        $dados['instrutores'] = $this->administrador->MntFedInstrutor();
        $this->load->view('administrador/manterFederados', $dados);
        $this->load->view('footer');
    }

    function getFiliais($instrutor)
    {
        $this->load->model('Administrador_model', 'administrador');
        header('Content-Type: application/x-json; charset=utf-8');
        $filiais = $this->administrador->MntFedFilial($instrutor);
        if (!empty($filiais))
        {
            for ($i = 0; $i < count($filiais); $i++)
            {
                $filiais[$i]["nome"] = htmlentities($filiais[$i]["nome"]);
            }
        } else
        {
            $filiais[0]['id'] = "";
            $filiais[0]['nome'] = htmlentities("N�o foi encontrada filial para esse instrutor.");
        }
        echo(json_encode($filiais));
    }

    function getFederados($filial, $status)
    {
        $this->load->model('Administrador_model', 'administrador');
        header('Content-Type: application/x-json; charset=utf-8');
        $federados = $this->administrador->MntFedFederado($filial, $status);
        if (!empty($federados))
        {
            for ($i = 0; $i < count($federados); $i++)
            {
                $federados[$i]["nome"] = htmlentities($federados[$i]["nome"]);
            }
        }
        else
        {
            $federados[0]["id"] = "";
            $federados[0]["nome"] = htmlentities("N�o foram encontrados federados nessa filial com essa situa��o.");
        }
        echo(json_encode($federados));
    }

    function getFederado($federado)
    {
        $this->load->model('Administrador_model', 'administrador');
        header('Content-type: application/x-json; charset=utf-8');
        $fed = $this->administrador->MntFedDados($federado);
        $nasc = new DateTime($fed[0]['dtNasc']);
        $fed[0]['dtNasc'] = $nasc->format('d-m-Y');
        $hoje = new DateTime('now');
        $idade = $hoje->diff($nasc)->format("%y");
        $fed[0]['idade'] = $idade;
        $resultado = array_map('htmlentities', $fed[0]);

        echo(json_encode($resultado));
    }

    public function alpha_acent($input)
    {
        if(preg_match("^[A-Za-z�-�]+$", $input))
        {
            $this->form_validation->set_message('alpha_acent','O campo %s deve conter somente letras e caracteres acentuados.');
            return false;
        }
        else
        {
            return true;
        }
    }
    
    function alterarFederado($federado)
    {  
        $this->form_validation->set_rules('nome','Nome','required|alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna','Filia��o Materna','alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna','Filia��o Paterna','alpha_acent|trim');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('dtNasc','Data','required|alpha_dash|trim');
        $this->form_validation->set_rules('rg','RG','required');
        $this->form_validation->set_rules('telefone','Telefone para contato','required|trim');
        $this->form_validation->set_rules('celular','Celular para contato','required|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato','required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade','Escolaridade','required');
        $this->form_validation->set_rules('situacao','Situa��o na federa��o','required');
        $this->form_validation->set_rules('nacionalidade','Nacionalidade','required');
        $this->form_validation->set_rules('tipo','Tipo de federado na federa��o','required');
        $this->form_validation->set_rules('logradouro','Logradouro do endere�o','required|alpha_acent|trim');
        $this->form_validation->set_rules('numero','N�mero do endere�o','required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro','Bairro do endere�o','required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade','Cidade do endere�o','required|alpha_acent|trim');
        $this->form_validation->set_rules('uf','UF do endere�o','required');
        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->model('Administrador_model', 'administrador');
            $this->load->view('header');
            $dados['federado'] = $this->administrador->DadosFederado($federado);
            $endereco = $dados['federado'][0]['endereco'];
            $dados['nacionalidade'] = $this->administrador->getNacionalidade();
            $dados['escolaridade'] = $this->administrador->getEscolaridade();
            $dados['tipo'] = $this->administrador->getTipoFederado();
            $dados['statusFederado'] = $this->administrador->getStatus();
            $dados['endereco'] = $this->administrador->getEndereco($endereco);
            $dados['uf'] = $this->administrador->getUF();
            $this->load->view('administrador/alterarFederado', $dados);
            $this->load->view('footer');
        }
        else
        {
            $this->atualizarFederado();
            $this->trocarFotoFederado();
        }
        
    }
    
    function trocarFotoFederado()
    {
        
        
    }
    
    function atualizarFederado()
    {
        $this->load->model('Administrador_model','administrador');
        $endereco = array();
        $federado = array();
        
        $endereco['logradouro']     = $this->input->post('logradouro');
        $endereco['numero']         = $this->input->post('numero');
        $endereco['complemento']    = $this->input->post('compl');
        $endereco['bairro']         = $this->input->post('bairro');
        $endereco['cidade']         = $this->input->post('cidade');
        $endereco['uf']             = $this->input->post('uf');
        
        $federado['nome']               = $this->input->post('nome');
        $federado['filiacao_materna']   = ($this->input->post('fMaterna')?$this->input->post('fMaterna'):NULL);
        $federado['filiacao_paterna']   = ($this->input->post('fPaterna')?$this->input->post('fPaterna'):NULL);
        $federado['sexo']               = $this->input->post('sexo');
        $federado['data_nasc']          = date('Y-m-d', strtotime($this->input->post('dtNasc')));
        $federado['rg']                 = $this->input->post('rg');
        $federado['telefone']           = $this->input->post('telefone');
        $federado['celular']            = $this->input->post('celular');
        $federado['email']              = $this->input->post('email');
        $federado['escolaridade']       = $this->input->post('escolaridade');
        $federado['status']             = $this->input->post('situacao');
        $federado['nacionalidade']      = $this->input->post('nacionalidade');
        $federado['tipo_federado']      = $this->input->post('tipo');
        
        $this->administrador->AtualizarDadosFederado($this->input->post('federado'),$federado);
        
        $this->administrador->AtualizarEndereco($this->input->post('endereco'),$endereco);
        
        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('administrador/sucessoAlteracao',$dados);
        $this->load->view('footer');
        
    }
    
    function salvarFederado()
    {
        
    }

    function imprimirFederado($federado)
    {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $dados['federado'] = $this->administrador->ImprimirDadosFederado($federado);
        $this->load->view('administrador/imprimirFederado', $dados);
        $this->load->view('footer');
    }

    function pedidos()
    {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function historico()
    {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function filiais()
    {
        $this->load->model('administrador_model', 'administrador');        
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

    function maladireta()
    {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('footer');
    }

}

?>

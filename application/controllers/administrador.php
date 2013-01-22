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
            $filiais[0]['nome'] = htmlentities("Não foi encontrada filial para esse instrutor.");
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
            $federados[0]["nome"] = htmlentities("Não foram encontrados federados nessa filial com essa situação.");
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
        if(preg_match("^[A-Za-zÀ-ú]+$", $input))
        {
            $this->form_validation->set_message('alpha_acent','O campo %s deve conter somente letras e caracteres acentuados.');
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function telephone($input)
    {
        if(preg_match("^\(?\d{2}\)?\d{4}-?\d{4}$", $input))//formato (11)3940-1294, sem espaço
        {
            $this->form_validation->set_message('telephone','O campo %s deve possuir um telefone no formato (12)3456-7890.');
            return false;
        }
        else
            return true;
    }
    
    function alterarFederado($federado)
    {  
        $this->form_validation->set_rules('nome','Nome','required|alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna','Filiação Materna','alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna','Filiação Paterna','alpha_acent|trim');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('dtNasc','Data','required|alpha_dash|trim');
        $this->form_validation->set_rules('rg','RG','required');
        $this->form_validation->set_rules('telefone','Telefone para contato','required|telephone|trim');
        $this->form_validation->set_rules('celular','Celular para contato','required|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato','required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade','Escolaridade','required');
        $this->form_validation->set_rules('situacao','Situação na federação','required');
        $this->form_validation->set_rules('nacionalidade','Nacionalidade','required');
        $this->form_validation->set_rules('tipo','Tipo de federado na federação','required');
        $this->form_validation->set_rules('logradouro','Logradouro do endereço','required|alpha_acent|trim');
        $this->form_validation->set_rules('numero','Número do endereço','required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro','Bairro do endereço','required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade','Cidade do endereço','required|alpha_acent|trim');
        $this->form_validation->set_rules('uf','UF do endereço','required');
        
        
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
            $this->fotoFederado(1);
        }
        
    }
    
    function fotoFederado($op)
    {
        $path_info = ((isset($_FILES))?pathinfo($_FILES["foto"]["name"]):NULL);
        $extensao = ((isset($path_info))?$path_info['extension']:NULL);
        
        $config['upload_path'] = './federados/fotos/tkd/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['max_width'] = '400';
        $config['max_height'] = '500';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $config['file_name'] = $this->input->post('nome') . "." . $extensao;
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if( ! $this->upload->do_upload("foto"))
        {
            $dados = array('error' => $this->upload->display_errors('<div class="alert-error"><b>','</b></div>') );
            (($op)?$this->atualizarFederado($dados):$this->salvarFederado($dados));
        }
        else
        {
             $dados = array('upload_foto' => $this->upload->data());
             (($op)?$this->atualizarFederado($dados, $config['file_name']):$this->salvarFederado($dados,$config['file_name']));
        }     
    }
    
    function atualizarFederado($dados,$foto = NULL)
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
        $federado['caminho_imagem']     = (isset($foto)?"tkd/".$foto:"sem foto");
        
        $this->administrador->AtualizarDadosFederado($this->input->post('federado'),$federado);
        
        $this->administrador->AtualizarEndereco($this->input->post('endereco'),$endereco);
        
        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('administrador/sucessoAlteracao',$dados);
        $this->load->view('footer');
        
    }
    
    function incluirFederado()
    {
        $this->form_validation->set_rules('nome','Nome','required|alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna','Filiação Materna','alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna','Filiação Paterna','alpha_acent|trim');
        $this->form_validation->set_rules('sexo','Sexo','required');
        $this->form_validation->set_rules('dtNasc','Data','required|alpha_dash|trim');
        $this->form_validation->set_rules('rg','RG','required');
        $this->form_validation->set_rules('telefone','Telefone para contato','required|telephone|trim');
        $this->form_validation->set_rules('celular','Celular para contato','required|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato','required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade','Escolaridade','required');
        $this->form_validation->set_rules('nacionalidade','Nacionalidade','required');
        $this->form_validation->set_rules('tipo','Tipo de federado na federação','required');
        $this->form_validation->set_rules('logradouro','Logradouro do endereço','required|alpha_acent|trim');
        $this->form_validation->set_rules('numero','Número do endereço','required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro','Bairro do endereço','required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade','Cidade do endereço','required|alpha_acent|trim');
        $this->form_validation->set_rules('uf','UF do endereço','required');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->model('Administrador_model', 'administrador');
            $this->load->view('header');
            $dados['nacionalidade'] = $this->administrador->getNacionalidade();
            $dados['escolaridade'] = $this->administrador->getEscolaridade();
            $dados['statusFederado'] = $this->administrador->getStatus();
            $dados['uf'] = $this->administrador->getUF();
            $dados['tipo'] = $this->administrador->getTipoFederado();
            $this->load->view('administrador/incluirFederado', $dados);
            $this->load->view('footer');
        }
        else
        {
            $this->fotoFederado(0);
        }
    }
    
    function salvarFederado($dados,$foto = NULL)
    {
        $this->load->model('Administrador_model','administrador');
        $endereco = array();
        $federado = array();
        
        $endereco['logradouro']     = $this->input->post('logradouro');
        $endereco['numero']         = $this->input->post('numero');
        $endereco['complemento']    = $this->input->post('compl');
        $endereco['tipo_endereco']  = 1;
        $endereco['bairro']         = $this->input->post('bairro');
        $endereco['cidade']         = $this->input->post('cidade');
        $endereco['uf']             = $this->input->post('uf');
        
        $this->administrador->InserirEndereco($endereco);
        
        $federado['endereco'] = $this->db->insert_id();
        
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
        $federado['nacionalidade']      = $this->input->post('nacionalidade');
        $federado['tipo_federado']      = $this->input->post('tipo');
        $federado['caminho_imagem']     = (isset($foto)?"tkd/".$foto:"sem foto");
        
        $this->administrador->InserirFederado($federado);
        
        
        
        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('administrador/sucessoInclusao',$dados);
        $this->load->view('footer');
        
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

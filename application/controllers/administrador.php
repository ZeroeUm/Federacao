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
        $this->load->view('administrador/notificacoes');
        $this->load->view('footer');
    }

    function enviarNotificacoes()
    {
        $this->load->library('email');
        $this->load->model('Administrador_model', 'administrador');
        $this->load->view('header');
        if (($this->input->post('aluno')))
            if (($this->input->post('instrutor')))
                $criterio = 5;
            else if (($this->input->post('coordenador')))
                $criterio = 6;
            else
                $criterio = 1;
        else if (($this->input->post('instrutor')))
            if (($this->input->post('coordenador')))
                $criterio = 7;
            else
                $criterio = 2;
        else if (($this->input->post('coordenador')))
            $criterio = 3;
        else
            $criterio = 4;
        $emailOrigem = "fp_interestilos@hotmail.com";
        $nomeOrigem = "federa��o Paulista de Artes Marciais Interestilos";
        $listaEmails = $this->administrador->NotifEmail($criterio);
        $assunto = $this->input->post('assunto');
        $mensagem = htmlentities($this->input->post('txtNotificacao'));

        foreach ($listaEmails as $destinatario)
        {
            $this->email->clear();
            $this->email->to($destinatario['email']);
            $this->email->from($emailOrigem, $nomeOrigem);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
            if (!$this->email->send())
            {
                $dados['erros'][] = $destinatario['nome'];
            }
        }
        $this->load->view('administrador/enviarNotificacoes', $dados);
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
        } else
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
        if (preg_match("^[A-Za-z�-�]+$", $input))
        {
            $this->form_validation->set_message('alpha_acent', 'O campo %s deve conter somente letras e caracteres acentuados.');
            return false;
        } else
        {
            return true;
        }
    }

    public function telephone($input)
    {
        if (preg_match("^\(?\d{2}\)?\d{4}-?\d{4}$", $input))//formato (11)3940-1294, sem espa�o
        {
            $this->form_validation->set_message('telephone', 'O campo %s deve possuir um n�mero de telefone ou fax no formato (12)3456-7890.');
            return false;
        }
        else
            return true;
    }

    public function cnpj($input)
    {
        if (preg_match("(^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$)", $input))
        {
            $this->form_validation->set_messasge('cnpj', "O campo %s deve possuir um n�mero de CNPJ no formato 12.345.678/0123-45");
            return false;
        }
        else
            return true;
    }

    function alterarFederado($federado)
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna', 'Filia��o Materna', 'alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna', 'Filia��o Paterna', 'alpha_acent|trim');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');
        $this->form_validation->set_rules('dtNasc', 'Data', 'required|alpha_dash|trim');
        $this->form_validation->set_rules('rg', 'RG', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone para contato', 'required|telephone|trim');
        $this->form_validation->set_rules('celular', 'Celular para contato', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato', 'required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade', 'Escolaridade', 'required');
        $this->form_validation->set_rules('situacao', 'Situa��o na federa��o', 'required');
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo de federado na federa��o', 'required');
        $this->form_validation->set_rules('filial','Filial','required');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endere�o', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'n�mero do endere�o', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro', 'Bairro do endere�o', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade do endere�o', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF do endere�o', 'required');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model('Administrador_model', 'administrador');
            $this->load->view('header');
            $dados['federado'] = $this->administrador->DadosFederado($federado);
            $endereco = $dados['federado'][0]['id_endereco'];
            $modalidade = $dados['federado'][0]['modalidade'];
            $dados['nacionalidade'] = $this->administrador->getNacionalidade();
            $dados['escolaridade'] = $this->administrador->getEscolaridade();
            $dados['tipo'] = $this->administrador->getTipoFederado();
            $dados['statusFederado'] = $this->administrador->getStatus();
            $dados['endereco'] = $this->administrador->getEndereco($endereco);
            $dados['uf'] = $this->administrador->getUF();
            $dados['modalidade'] = $this->administrador->GetModalidades();
            $dados['filiais'] = $this->administrador->getFiliaisModalidade($modalidade);
            $this->load->view('administrador/alterarFederado', $dados);
            $this->load->view('footer');
        } else
        {
            $this->fotoFederado(1);
        }
    }

    function fotoFederado($op)
    {
        $path_info = ((isset($_FILES)) ? pathinfo($_FILES["foto"]["name"]) : NULL);
        $extensao = ((isset($path_info['extension'])) ? $path_info['extension'] : NULL);

        $config['upload_path'] = './federados/fotos/tkd/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['max_width'] = '400';
        $config['max_height'] = '500';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = FALSE;
        $config['file_name'] = (isset($extensao) ? $this->input->post('nome') . "." . $extensao : NULL);


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload("foto"))
        {
            $dados = array('error' => $this->upload->display_errors('<div class="alert-error"><b>', '</b></div>'));
            (($op) ? $this->atualizarFederado($dados) : $this->salvarFederado($dados));
        } else
        {
            $dados = array('upload_foto' => $this->upload->data());
            (($op) ? $this->atualizarFederado($dados, $config['file_name']) : $this->salvarFederado($dados, $config['file_name']));
        }
    }

    function atualizarFederado($dados, $foto = NULL)
    {
        $this->load->model('Administrador_model', 'administrador');
        $endereco = array();
        $federado = array();

        $this->alterarMatricula($this->input->post('federado'), $this->input->post('filial'), 1);
        
        $endereco['logradouro'] = $this->input->post('logradouro');
        $endereco['numero'] = $this->input->post('numero');
        $endereco['complemento'] = $this->input->post('compl');
        $endereco['bairro'] = $this->input->post('bairro');
        $endereco['cidade'] = $this->input->post('cidade');
        $endereco['uf'] = $this->input->post('uf');

        $federado['nome'] = $this->input->post('nome');
        $federado['filiacao_materna'] = ($this->input->post('fMaterna') ? $this->input->post('fMaterna') : NULL);
        $federado['filiacao_paterna'] = ($this->input->post('fPaterna') ? $this->input->post('fPaterna') : NULL);
        $federado['sexo'] = $this->input->post('sexo');
        $federado['data_nasc'] = date('Y-m-d', strtotime($this->input->post('dtNasc')));
        $federado['rg'] = $this->input->post('rg');
        $federado['telefone'] = $this->input->post('telefone');
        $federado['celular'] = $this->input->post('celular');
        $federado['email'] = $this->input->post('email');
        $federado['id_escolaridade'] = $this->input->post('escolaridade');
        $federado['id_status'] = $this->input->post('situacao');
        $federado['id_nacionalidade'] = $this->input->post('nacionalidade');
        $federado['id_tipo_federado'] = $this->input->post('tipo');
        $federado['caminho_imagem'] = (isset($foto) ? "tkd/" . $foto : "sem foto");

        $this->administrador->AtualizarDadosFederado($this->input->post('federado'), $federado);

        $this->administrador->AtualizarEndereco($this->input->post('endereco'), $endereco);

        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('administrador/sucessoAlteracaoFederado', $dados);
        $this->load->view('footer');
    }
    
    function matricularFederado($federado,$filial,$modalidade)
    {
        $this->load->model('Administrador_model','administrador');
        $matricula = array();
        $matricula['id_federado']       = $federado;
        $matricula['id_modalidade']     = $modalidade;
        $matricula['id_filial']         = $filial;
        $matricula['data_matricula']    = date('Y-m-d');
        $matricula['matricula_filial']  = date('Y-m-d');
        $this->administrador->matricularFederado($matricula);
    }
    
    function alterarMatricula($federado,$filial,$modalidade)
    {
        $this->load->model('Administrador_model','administrador');
        $matricula = array();
        $matricula['id_federado'] = $federado;
        $matricula['id_modalidade'] = $filial;
        $matricula['id_filial'] = $modalidade;
        $matricula['matricula_filial'] = date("Y-m-d");
        
        $this->administrador->alterarMatricula($federado,$modalidade,$matricula);
    }
    
    function criarLogin($federado,$nome)
    {
        $this->load->model('Administrador_model','administrador');
        $login = array();
        $login['id_federado'] = $federado;
        $login['login'] = $this->gerarLogin($nome);
        $login['senha'] = md5($this->gerarSenha());
        $this->administrador->criarLogin($login);
    }

    function gerarLogin($nome)
    {
        $arrNome = explode(" ", $nome);
        $retorno = substr($arrNome[0],0,1);
        $retorno .= end($arrNome);
        return $retorno;
    }
    
    function gerarSenha($tamanho = 10,$maiusculas = true,$numeros = true)
    {
        $lmin = 'abcdefghijkmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $num = '0123456789';
        
        $caracteres = '';
        $retorno = '';
        
        $caracteres .= $lmin;
        if($maiusculas) $caracteres .= $lmai;
        if($numeros) $caracteres .= $num;
        
        $len = strlen($caracteres);
        
        for($i = 0; $i <= $tamanho; $i++):
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        endfor;
        
        return $retorno;
    }
    
    function incluirFederado()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna', 'Filia��o Materna', 'alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna', 'Filia��o Paterna', 'alpha_acent|trim');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');
        $this->form_validation->set_rules('dtNasc', 'Data', 'required|alpha_dash|trim');
        $this->form_validation->set_rules('rg', 'RG', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone para contato', 'required|telephone|trim');
        $this->form_validation->set_rules('celular', 'Celular para contato', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato', 'required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade', 'Escolaridade', 'required');
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo de federado na federa��o', 'required');
        $this->form_validation->set_rules('filial','Filial','required');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endere�o', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'n�mero do endere�o', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro', 'Bairro do endere�o', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade do endere�o', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF do endere�o', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model('Administrador_model', 'administrador');
            $this->load->view('header');
            $dados['nacionalidade'] = $this->administrador->getNacionalidade();
            $dados['escolaridade'] = $this->administrador->getEscolaridade();
            $dados['statusFederado'] = $this->administrador->getStatus();
            $dados['uf'] = $this->administrador->getUF();
            $dados['tipo'] = $this->administrador->getTipoFederado();
            $dados['modalidade'] = $this->administrador->GetModalidades();
            $this->load->view('administrador/incluirFederado', $dados);
            $this->load->view('footer');
        } else
        {
            $this->fotoFederado(0);
        }
    }

    function salvarFederado($dados, $foto = NULL)
    {
        $this->load->model('Administrador_model', 'administrador');
        $endereco = array();
        $federado = array();

        $endereco['logradouro'] = $this->input->post('logradouro');
        $endereco['numero'] = $this->input->post('numero');
        $endereco['complemento'] = $this->input->post('compl');
        $endereco['tipo_endereco'] = 1;
        $endereco['bairro'] = $this->input->post('bairro');
        $endereco['cidade'] = $this->input->post('cidade');
        $endereco['uf'] = $this->input->post('uf');

        $this->administrador->InserirEndereco($endereco);

        $federado['id_endereco'] = $this->db->insert_id();

        $federado['nome'] = $this->input->post('nome');
        $federado['filiacao_materna'] = ($this->input->post('fMaterna') ? $this->input->post('fMaterna') : NULL);
        $federado['filiacao_paterna'] = ($this->input->post('fPaterna') ? $this->input->post('fPaterna') : NULL);
        $federado['sexo'] = $this->input->post('sexo');
        $federado['data_nasc'] = date('Y-m-d', strtotime($this->input->post('dtNasc')));
        $federado['rg'] = $this->input->post('rg');
        $federado['telefone'] = $this->input->post('telefone');
        $federado['celular'] = $this->input->post('celular');
        $federado['email'] = $this->input->post('email');
        $federado['id_escolaridade'] = $this->input->post('escolaridade');
        $federado['id_nacionalidade'] = $this->input->post('nacionalidade');
        $federado['id_tipo_federado'] = $this->input->post('tipo');
        $federado['caminho_imagem'] = (isset($foto) ? "tkd/" . $foto : "sem foto");

        $this->administrador->InserirFederado($federado);
        
        $novoFederado = $this->db->insert_id();
        
        $this->matricularFederado($novoFederado, $this->input->post('filial'), 1);
        $this->criarLogin($novoFederado, $federado['nome']);

        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('administrador/sucessoInclusaoFederado', $dados);
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
        $this->load->library("pagination");
        $config = array();

        $config['base_url'] = base_url() . 'administrador/pedidos';
        $config['total_rows'] = $this->administrador->totalPedidos();
        $config['per_page'] = 10;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);
        $config["anchor_class"] = "class='btn btn-link'";

        $config['full_tag_open'] = "<div class='pagination pagination-centered'><ul>";
        $config['full_tag_close'] = "</ul></div>";

        $config['cur_tag_open'] = "<li class='disabled'><a><strong>";
        $config['cur_tag_close'] = "</strong></a></li>";

        $config['num_tag_open'] = "<li class='active'>";
        $config['num_tag_close'] = "</li>";

        $config['prev_link'] = "&lt;";
        $config['prev_tag_open'] = $config['num_tag_open'];
        $config['prev_tag_close'] = $config['num_tag_close'];

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = $config['num_tag_open'];
        $config['next_tag_close'] = $config['num_tag_close'];

        $config['first_link'] = "&laquo;";
        $config['first_tag_open'] = $config['num_tag_open'];
        $config['first_tag_close'] = $config['num_tag_close'];

        $config['last_link'] = "&raquo;";
        $config['last_tag_open'] = $config['num_tag_open'];
        $config['last_tag_close'] = $config['num_tag_close'];

        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $pag = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

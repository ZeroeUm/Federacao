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
        $this->checar_sessao();
    }

    function checar_sessao()
    {
        if (!$this->session->userdata('autentificado'))
            redirect('login', 'refresh');
    }

    function notificacoes()
    {
        $this->form_validation->set_rules('assunto', 'Assunto', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('txtNotificacao', 'Notificação', 'required|trim');
        if ($this->form_validation->run() == FALSE):
            $this->load->view('header');
            $this->load->view('administrador/notificacoes');
            $this->load->view('footer');
        else:
            $this->enviarNotificacoes();
        endif;
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
        $nomeOrigem = "Federação Paulista de Artes Marciais Interestilos";
        $listaEmails = $this->administrador->NotifEmail($criterio);
        $assunto = $this->input->post('assunto');
        $mensagem = htmlentities($this->input->post('txtNotificacao'), ENT_QUOTES, 'UTF-8');

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
                $filiais[$i]["nome"] = htmlentities($filiais[$i]["nome"], ENT_QUOTES, 'UTF-8');
            }
        }
        else
        {
            $filiais[0]['id'] = "";
            $filiais[0]['nome'] = htmlentities("Não foi encontrada filial para esse instrutor.", ENT_QUOTES, 'UTF-8');
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
                $federados[$i]["nome"] = htmlentities($federados[$i]["nome"], ENT_QUOTES, 'UTF-8');
            }
        }
        else
        {
            $federados[0]["id"] = "";
            $federados[0]["nome"] = htmlentities("Não foram encontrados federados nessa filial com essa situação.", ENT_QUOTES, 'UTF-8');
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
        foreach($fed[0] as $f):
            $f = htmlentities($f,ENT_QUOTES,'UTF-8');
        endforeach;
        echo(json_encode($fed[0]));
    }

    private function alpha_acent($input)
    {
        if (preg_match("/^[A-Za-záàãâéêíóôõú]+$/", $input))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('alpha_acent', 'O campo %s deve conter somente letras e caracteres acentuados da língua portuguesa.');
            return false;
        }
    }

    private function telephone($input)
    {
        if (preg_match("/^\(?\d{2}\)?\d{4}-?\d{4}$/", $input))//formato (11)3940-1294, sem espaço
        {
            return true;   
        }
        else
        {
            $this->form_validation->set_message('telephone', 'O campo %s deve possuir um número de telefone ou fax no formato (12)3456-7890.');
            return false;
        }
    }

    private function celular($input)
    {
        if (preg_match("/^\(?\d{2}\)?[9]?\d{4}-?\d{4}$/", $input)):
            return true;
        else:
            $this->form_validation->set_message('celular', 'O campo %s deve possuir um número de celular no formato de São Paulo (11)90494-3904.');
            return false;
        endif;
    }

    private function rg($input)
    {
        if (preg_match("/^\d{2}\.\d{3}\.\d{3}\-\d{1}|[X]$/", $input)):
            return true;
        else:
            $this->form_validation->set_message('rg', 'O campo %s deve possuir um número de RG no formato de São Paulo, 23.456.789-0.');
            return false;
        endif;
    }

    private function cnpj($input)
    {
        if (preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/", $input))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_messasge('cnpj', "O campo %s deve possuir um número de CNPJ no formato 12.345.678/0123-45");
            return false;
        }
    }
    
    private function combo($input)
    {
        if($input == "#"):
            $this->form_validation->set_message('combo','Na campo com opções de %s deve ser selecionada uma opção.');
            return FALSE;
        else:
            return TRUE;
        endif;
    }

    function alterarFederado($federado)
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|callback_alpha_acent|trim|xss_clean');
        $this->form_validation->set_rules('fMaterna', 'Filiação Materna', 'callback_alpha_acent|trim|xss_clean');
        $this->form_validation->set_rules('fPaterna', 'Filiação Paterna', 'callback_alpha_acent|trim|xss_clean');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required|callback_combo');
        $this->form_validation->set_rules('dtNasc', 'Data', 'required|alpha_dash|trim||xss_clean');
        $this->form_validation->set_rules('rg', 'RG', 'required|callback_rg|trim');
        $this->form_validation->set_rules('telefone', 'Telefone para contato', 'required|callback_telephone|trim');
        $this->form_validation->set_rules('celular', 'Celular para contato', 'required|callback_celular|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato', 'required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade', 'Escolaridade', 'required|callback_combo');
        $this->form_validation->set_rules('situacao', 'Situação na federação', 'required|callback_combo');
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required|callback_combo');
        $this->form_validation->set_rules('tipo', 'Tipo de federado na federação', 'required|callback_combo');
        $this->form_validation->set_rules('filial', 'Filial', 'required|callback_combo');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endereço', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'Número do endereço', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('compl', 'Complemento do endereço','callback_alpha_acent|trim');
        $this->form_validation->set_rules('bairro', 'Bairro do endereço', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade do endereço', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF do endereço', 'required|callback_combo');


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
        }
        else
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
        }
        else
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
        
        (($this->input->post('antigaFilial') != $this->input->post('filial'))? $this->alterarMatricula($this->input->post('federado'), $this->input->post('filial'), 1):"");

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

    function matricularFederado($federado, $filial, $modalidade)
    {
        $this->load->model('Administrador_model', 'administrador');
        $matricula = array();
        $matricula['id_federado'] = $federado;
        $matricula['id_modalidade'] = $modalidade;
        $matricula['id_filial'] = $filial;
        $matricula['data_matricula'] = date('Y-m-d');
        $matricula['matricula_filial'] = date('Y-m-d');
        $this->administrador->matricularFederado($matricula);
    }

    function alterarMatricula($federado, $filial, $modalidade)
    {
        $this->load->model('Administrador_model', 'administrador');
        $matricula = array();
        $matricula['id_federado'] = $federado;
        $matricula['id_modalidade'] = $modalidade;
        $matricula['id_filial'] = $filial;
        $matricula['matricula_filial'] = date("Y-m-d");

        $this->administrador->alterarMatricula($federado, $modalidade, $matricula);
    }

    function criarLogin($federado, $nome)
    {
        $this->load->model('Administrador_model', 'administrador');
        $login = array();
        $login['id_federado'] = $federado;
        $login['login'] = strtolower($this->gerarLogin($nome));
        $login['senha'] = $this->gerarSenha();
        $this->administrador->criarLogin($login);
    }

    function gerarLogin($nome)
    {
        $arrNome = explode(" ", $nome);
        $retorno = substr($arrNome[0], 0, 1);
        $retorno .= end($arrNome);
        if (strlen($retorno) > 20)
            $retorno = substr($retorno, 0, 20);
        return $retorno;
    }

    function gerarSenha($tamanho = 10, $maiusculas = true, $numeros = true)
    {
        $lmin = 'abcdefghijkmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $num = '0123456789';

        $caracteres = '';
        $retorno = '';

        $caracteres .= $lmin;
        if ($maiusculas)
            $caracteres .= $lmai;
        if ($numeros)
            $caracteres .= $num;

        $len = strlen($caracteres);

        for ($i = 0; $i <= $tamanho; $i++):
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        endfor;

        return $retorno;
    }

    function incluirFederado()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna', 'Filiação Materna', 'callback_alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna', 'Filiação Paterna', 'callback_alpha_acent|trim');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required|callback_combo');
        $this->form_validation->set_rules('dtNasc', 'Data', 'required|alpha_dash|trim');
        $this->form_validation->set_rules('rg', 'RG', 'required|callback_rg|trim');
        $this->form_validation->set_rules('telefone', 'Telefone para contato', 'required|callback_telephone|trim');
        $this->form_validation->set_rules('celular', 'Celular para contato', 'required|callback_celular|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato', 'required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade', 'Escolaridade', 'required|callback_combo');
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required|callback_combo');
        $this->form_validation->set_rules('tipo', 'Tipo de federado na federação', 'required|callback_combo');
        $this->form_validation->set_rules('filial', 'Filial', 'required|callback_combo');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endereço', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'Número do endereço', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('compl', 'Complemento do endereço','callback_alpha_acent|trim');
        $this->form_validation->set_rules('bairro', 'Bairro do endereço', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade do endereço', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF do endereço', 'required|callback_combo');

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
        }
        else
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

        $dados['resultado'] = $this->administrador->pedidos($config['per_page'], $pag);
        $dados['links'] = $this->pagination->create_links();

        $this->load->view('header');
        $this->load->view('administrador/pedidos', $dados);
        $this->load->view('footer');
    }

    function alterarPedido($id)
    {
        $this->load->model('administrador_model', 'administrador');
        $dados['modalidade'] = $this->administrador->GetModalidades();
        $dados['taekwondo'] = $this->administrador->itensModalidade(1);
        $dados['itens'] = $this->administrador->informacoesPedido($id);
        $dados['status'] = $this->administrador->statusPedidos();
        $this->load->view('header');
        $this->load->view('administrador/alterarPedido', $dados);
        $this->load->view('footer');
    }

    function atualizarPedido($pedido)
    {
        $this->load->model('Administrador_model', 'administrador');
        $post = $this->input->post();

        $pedido = $post['pedido'];

        $alterar = $post['numero'];
        if (isset($post['excluir'])):
            $excluir = array_keys($post['excluir']);
            foreach ($excluir as $chave => $numero):
                $this->administrador->deletarItemPedido($pedido, $numero);
            endforeach;
            $alterar = array_diff_key($post['numero'], $post['excluir']);
        endif;

        if (isset($post['novoItem'])):
            $ultimo = $this->administrador->ultimoItem($pedido);
            $novoId = (isset($ultimo) ? $ultimo[0]['ultimo'] + 1 : 1);
            $itemNovo = array();
            for ($i = 0; $i < count($post['novoItem']); $i++):
                $itemNovo['id_pedido'] = $pedido;
                $itemNovo['numero'] = $novoId;
                $itemNovo['id_item'] = $post['novoItem'][$i];
                $itemNovo['tamanho'] = $post['novoTamanho'][$i];
                $itemNovo['quantidade'] = $post['novaQuantidade'][$i];
                $this->administrador->inserirItemPedido($itemNovo);
                $novoId++;
            endfor;
        endif;

        if (isset($post['numero'])):
            $item = array();
            $alt = 0;
            foreach ($alterar as $key => $value):
                $item['id_item'] = $post['item'][$key];
                $item['tamanho'] = $post['tamanho'][$key];
                $item['quantidade'] = $post['quantidade'][$key];
                $this->administrador->alterarItemPedido($pedido, $key, $item);
                $alt++;
            endforeach;
        endif;

        $this->administrador->alterarStatusPedido($pedido, array('status' => $post['situacao']));

        $dados['excluidos'] = (isset($post['excluir']) ? count($excluir) : 0);
        $dados['incluidos'] = (isset($post['novoItem']) ? $i + 1 : 0);
        $dados['atualizados'] = (isset($post['numero']) ? $alt : 0);
        $dados['pedido'] = $pedido;
        $this->load->view('header');
        $this->load->view('administrador/sucessoAlterarPedido', $dados);
        $this->load->view('footer');
    }

    function itensModalidade($id)
    {
        $this->load->model('Administrador_model', 'administrador');
        header('Content-type: application/x-json; charset=utf-8');
        $itens = $this->administrador->itensModalidade($id);
        if (!empty($itens))
        {
            for ($i = 0; $i < count($itens); $i++)
            {
                $itens[$i]['descricao'] = htmlentities($itens[$i]['descricao'], ENT_QUOTES, 'UTF-8');
            }
        }
        else
        {
            $itens[0]['id'] = "";
            $itens[0]['descricao'] = htmlentities('Não foram encontrados itens para a modalidade escolhida.', ENT_QUOTES, 'UTF-8');
        }

        echo(json_encode($itens));
    }

    function historico()
    {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $dados['instrutores'] = $this->administrador->MntFedInstrutor();
        $this->load->view('administrador/historico', $dados);
        $this->load->view('footer');
    }

    function getHistorico($federado)
    {
        header('Content-type: text/html; charset=UTF-8');
        $this->load->model('Administrador_model', 'administrador');
        $historico = $this->administrador->getHistoricoNotas($federado);

        if (!empty($historico))
        {
            foreach ($historico as $evento):
                echo ("Data do evento: " . date("d-m-Y", strtotime($evento['data_evento'])));
                echo ("<br />");
                echo ("Modalidade: " . $evento['modalidade']);
                echo ("<hr />");
                include_once($evento['arquivo']);
                echo ("<br />");
            endforeach;
        }
        else
            echo ("Não foi encontrado nenhum registro do federado escolhido.<br/>Verifique se o federado já realizou alguma graduação na federação Paulista de Artes Marciais Interestilos.");
    }

    function filiais()
    {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $dados['filiais'] = $this->administrador->MntFilial();
        $this->load->view('administrador/manterFiliais', $dados);
        $this->load->view('footer');
    }

    function getFilial($filial)
    {
        $this->load->model('Administrador_model', 'administrador');
        $filial = $this->administrador->MntFilialDados($filial);
        header('Content-type: application/x-json; charset=utf-8');
        
        foreach($filial[0] as $f):
            $f = htmlentities($f, ENT_QUOTES, 'UTF-8');
        endforeach;
        echo(json_encode($filial[0]));
    }

    function modalidades()
    {
        $this->load->model('Administrador_model', 'administrador');
        $modalidade = $this->administrador->GetModalidades();

        header('Content-type: application/x-json; charset=utf-8');

        if (!empty($modalidade))
        {
            for ($i = 0; $i < count($modalidade); $i++)
                $modalidade[$i]['nome'] = htmlentities($modalidade[$i]['nome'], ENT_QUOTES, 'UTF-8');
        }
        else
        {
            $modalidade[0]['id'] = "";
            $modalidade[0]['nome'] = htmlentities("Não foram encontradas as modalidades, verifique a conexão com o banco.", ENT_QUOTES, 'UTF-8');
        }

        echo(json_encode($modalidade));
    }

    function getFilialModalidade($modalidade)
    {
        $this->load->model('Administrador_model', 'administrador');
        $filiais = $this->administrador->getFiliaisModalidade($modalidade);
        header('Content-type: application/x-json; charset=utf-8');
        if (!empty($filiais))
            for ($i = 0; $i < count($filiais); $i++)
                $filiais[$i]['nome'] = htmlentities($filiais[$i]['nome'], ENT_QUOTES, 'UTF-8');
        else
        {
            $filiais[0]['id'] = "";
            $filiais[0]['nome'] = htmlentities("Não foram encontradas filiais para essa modalidade, verifique a conexão com o banco.", ENT_QUOTES, 'UTF-8');
        }
        echo (json_encode($filiais));
    }

    function alterarFilial($filial)
    {
        $this->form_validation->set_rules('nome', 'Nome da Filial', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('cnpj', 'Número de CNPJ', 'required|cnpj');
        $this->form_validation->set_rules('telefone', 'Telefone da filial', 'telephone|trim');
        $this->form_validation->set_rules('fax', 'Fax da filial', 'telephone|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|trim');
        $this->form_validation->set_rules('representante', 'Representante', 'callback_alpha_acent|trim');
        $this->form_validation->set_rules('instrutor', 'Instrutor', 'required|callback_combo');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'número', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF', 'required|callback_combo');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model('Administrador_model', 'administrador');
            $this->load->view('header');
            $dados['filial'] = $this->administrador->AlterarDadoasFilial($filial);
            $endereco = $dados['filial'][0]['id_endereco'];
            $dados['endereco'] = $this->administrador->getEndereco($endereco);
            $dados['modalidade'] = $this->administrador->getModalidades();
            $dados['uf'] = $this->administrador->getUF();
            $dados['instrutor'] = $this->administrador->MntFedInstrutor();
            $this->load->view("administrador/alterarFilial", $dados);
            $this->load->view("footer");
        }
        else
        {
            $this->atualizaFilial();
        }
    }

    function atualizaFilial()
    {
        $this->load->model("Administrador_model", "administrador");
        $filial = array();
        $endereco = array();

        $endereco['logradouro'] = $this->input->post('logradouro');
        $endereco['numero'] = $this->input->post('numero');
        $endereco['complemento'] = $this->input->post('compl');
        $endereco['bairro'] = $this->input->post('bairro');
        $endereco['cidade'] = $this->input->post('cidade');
        $endereco['uf'] = $this->input->post('uf');

        $this->administrador->AtualizarEndereco($this->input->post('endereco'), $endereco);

        $filial['nome'] = $this->input->post('nome');
        $filial['cnpj'] = $this->input->post('cnpj');
        $filial['telefone'] = (($this->input->post('telefone')) ? $this->input->post('telefone') : NULL);
        $filial['fax'] = (($this->input->post('fax')) ? $this->input->post('fax') : NULL);
        $filial['representante'] = (($this->input->post('representante')) ? $this->input->post('representante') : NULL);
        $filial['instrutor'] = $this->input->post('instrutor');
        $filial['email'] = $this->input->post('email');

        $this->administrador->AtualizarFilial($this->input->post('filial', $filial));

        $dados['filial'] = $filial['nome'];
        $this->load->view('header');
        $this->load->view('administrador/sucessoAlteracaoFilial', $dados);
        $this->load->view('footer');
    }

    function imprimirFilial($filial)
    {
        $this->load->model("Administrador_model", "administrador");
        $dados['filial'] = $this->administrador->MntFilialDados($filial);
        $dados['modalidade'] = $this->administrador->getModalidades();
        $dados['instrutor'] = $this->administrador->MntFedInstrutor();
        $this->load->view('header');
        $this->load->view("administrador/imprimirFilial", $dados);
        $this->load->view("footer");
    }

    function incluirFilial()
    {
        $this->form_validation->set_rules('nome', 'Nome da Filial', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('cnpj', 'número de CNPJ', 'required|cnpj');
        $this->form_validation->set_rules('telefone', 'Telefone da filial', 'required|callback_telephone|trim');
        $this->form_validation->set_rules('fax', 'Fax da filial', 'required|callback_telephone|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|trim');
        $this->form_validation->set_rules('representante', 'Representante', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('instrutor', 'Instrutor', 'required|callback_combo');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'número', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required|callback_alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF', 'required|callback_combo');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model("Administrador_model", "administrador");
            $this->load->view("header");
            $dados['modalidade'] = $this->administrador->getModalidades();
            $dados['uf'] = $this->administrador->getUF();
            $dados['instrutores'] = $this->administrador->MntFedInstrutor();
            $this->load->view("administrador/incluirFilial", $dados);
            $this->load->view("footer");
        }
        else
        {
            $this->salvarFilial();
        }
    }

    function salvarFilial()
    {
        $this->load->model("Administrador_model", "administrador");
        $filial = array();
        $endereco = array();

        $endereco['logradouro'] = $this->input->post('logradouro');
        $endereco['numero'] = $this->input->post('numero');
        $endereco['tipo_endereco'] = 3;
        $endereco['complemento'] = $this->input->post('compl');
        $endereco['bairro'] = $this->input->post('bairro');
        $endereco['cidade'] = $this->input->post('cidade');
        $endereco['uf'] = $this->input->post('uf');

        $this->administrador->InserirEndereco($endereco);

        $filial['id_endereco'] = $this->db->insert_id();

        $filial['nome'] = $this->input->post('nome');
        $filial['cnpj'] = $this->input->post('cnpj');
        $filial['telefone'] = (($this->input->post('telefone')) ? $this->input->post('telefone') : NULL);
        $filial['fax'] = (($this->input->post('fax')) ? $this->input->post('fax') : NULL);
        $filial['representante'] = (($this->input->post('representante')) ? $this->input->post('representante') : NULL);
        $filial['id_modalidade'] = 1;
        $filial['id_instrutor'] = $this->input->post('instrutor');
        $filial['email'] = $this->input->post('email');

        $this->administrador->InserirFilial($filial);

        $dados['filial'] = $filial['nome'];
        $this->load->view('header');
        $this->load->view('administrador/sucessoInclusaoFilial', $dados);
        $this->load->view('footer');
    }

    function maladireta()
    {
        $this->load->model('administrador_model', 'administrador');
        $this->load->view('header');
        $dados['mensagem'] = $this->administrador->malaDireta();
        $this->load->view('administrador/malaDireta', $dados);
        $this->load->view('footer');
    }

    function inserirMensagem()
    {
        $this->load->model('administrador_model', 'administrador');
        $dados['mensagem'] = htmlentities($this->input->post('mensagem'), ENT_QUOTES, 'UTF-8');
        $this->administrador->inserirMaladireta($dados);
        $this->load->view('header');
        $dados['troca'] = FALSE;
        $this->load->view('administrador/novaMensagem', $dados);
        $this->load->view('footer');
    }

    function alterarMensagem()
    {
        $this->load->model('administrador_model', 'administrador');
        $dados['mensagem'] = htmlentities($this->input->post('mensagem'), ENT_QUOTES, 'UTF-8');
        $this->administrador->alterarMalaDireta($this->input->post('id'), $dados);
        $this->load->view('header');
        unset($dados);
        $dados['troca'] = TRUE;
        $this->load->view('administrador/novaMensagem', $dados);
        $this->load->view('footer');
    }

}

?>
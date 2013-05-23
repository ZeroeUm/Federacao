<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of instrutores
 *
 * @author Marcos
 */
class Instrutores extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Instrutor_model', 'instrutor');
        $this->checar_sessao();
    }

    function checar_sessao() {
        if (!$this->session->userdata('autentificado'))
            redirect('login', 'refresh');
    }

    function remover_pre_avaliacao($id_federado, $id_evento) {

        $remover = $this->instrutor->remover_pre_avalicacao($id_federado, $id_evento);
        if ($remover) {
            $this->session->set_flashdata('alerta', "Removido com sucesso");

            redirect('/instrutores/');
        } else {
            $this->session->set_flashdata('alerta', "Não foi possivel remover");

            redirect('/instrutores/');
        }
    }

    function confirma_participacao($id_federado, $id_evento) {

        $remover = $this->instrutor->confirma_participacao($id_federado, $id_evento);

        if ($remover) {
            $this->session->set_flashdata('alerta', "Confirmado com sucesso");

            redirect('/instrutores/');
        } else {
            $this->session->set_flashdata('alerta', "Não foi possivel confirmar");

            redirect('/instrutores/');
        }
    }

    function remover_evento_graduacao($id_federado, $id_evento) {

        $remover = $this->instrutor->remover_evento_graduacao($id_federado, $id_evento);

        if ($remover) {
            $this->session->set_flashdata('alerta', "Removido com sucesso");

            redirect('/instrutores/');
        } else {
            $this->session->set_flashdata('alerta', "Não foi possivel remover");

            redirect('/instrutores/');
        }
    }

    function index() {
        //lista de participantes para o proximo evento 
        $dados['resultado'] = $this->instrutor->get_status_avaliacao();

        //total de alunos do instrutor
        $dados['total_alunos'] = $this->instrutor->total_alunos($this->session->userdata('id'), 'total');

        //Carregar data do próximo evento
        $this->load->model('Coordenador_model', 'coordenador');
        @$dados['ultimo_evento'] = $this->coordenador->ultimo_evento();


        $this->load->view('header');
        $this->load->view('instrutores/index', $dados);
        $this->load->view('footer');
    }

    function cadastro() {
        $this->load->model('Instrutor_model');
        $tema["filial"] = $this->instrutor->getFilial($this->session->userdata('id'));
        $this->load->view('header');
        $this->load->view('instrutores/cadastro', $tema);
        $this->load->view('footer');
    }

    function getFilial($id) {
        $tmp = '';
        $data = $this->instrutor->getFilial($id);
        if ($id == null) {
            $tmp .= "<option value=''>Selecione a Filial</option>";
        } else if (!empty($data)) {
            $tmp .= "<option value=''>Selecione uma Filial</option>";
            foreach ($data as $row) {
                $tmp .= "<option value='" . $row->id . "'>" . utf8_encode($row->nome) . "</option>";
            }
        } else {
            $tmp .= "<option value=''>Sem registro para esta Filial</option>";
        }

        die($tmp);
    }

    function getStatus($id) {
        if ($id != null || !empty($id)) {
            $tmp = '';
            $data = $this->instrutor->getStatus();
        }
        if (!empty($data)) {
            $tmp .= "<option value=''>Selecione o Status</option>";
            foreach ($data as $row) {
                $tmp .="<option value ='" . $row->id . "'>" . $row->status . "</option>";
            }
        } else {
            $tmp .="<option value=''>Selecione o Status</option>";
        }
        die($tmp);
    }

    function getAluno($filial, $status) {
        $tmp = '';
        $data = $this->instrutor->getAluno($filial, $status);
        if (!empty($data)) {
            $tmp .= "<option value=''>Selecione o Federado</option>";
            foreach ($data as $row) {
                $tmp .="<option value ='" . $row->id . "'>" . utf8_encode($row->nome) . "</option>";
            }
        } else {
            $tmp .="<option value=''>Sem registro para com os parametros informados</option>";
        }
        die($tmp);
    }

    function getFederado($federado) {
        $this->load->model('Instrutor_model', 'instrutor');
        header('Content-type: application/x-json; charset=utf-8');
        $fed = $this->instrutor->MntFedDados($federado);
        $nasc = new DateTime($fed[0]['dtNasc']);
        $fed[0]['dtNasc'] = $nasc->format('d-m-Y');
        $hoje = new DateTime('now');
        $idade = $hoje->diff($nasc)->format("%y");
        $fed[0]['idade'] = $idade;
        $resultado = array_map('htmlentities', $fed[0]);

        echo utf8_decode(json_encode($resultado));
    }

    function imprimirFederado($federado) {
        $this->load->model('Instrutor_model', 'instrutor');
        $this->load->view('header');
        $dados['instrutor'] = $this->instrutor->ImprimirDadosFederado($federado);
        $this->load->view('instrutores/imprimirFederado', $dados);
        $this->load->view('footer');
    }

    function incluirFederado() {
        $this->form_validation->set_rules('nome', 'Nome', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna', 'Filiação Materna', 'alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna', 'Filiação Paterna', 'alpha_acent|trim');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');
        $this->form_validation->set_rules('dtNasc', 'Data', 'required|alpha_dash|trim');
        $this->form_validation->set_rules('rg', 'RG', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone para contato', 'required|telephone|trim');
        $this->form_validation->set_rules('celular', 'Celular para contato');
        $this->form_validation->set_rules('email', 'E-mail para contato', 'required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade', 'Escolaridade', 'required');
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required');

        $this->form_validation->set_rules('logradouro', 'Logradouro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'Número do endereo', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro', 'Bairro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF do endereço', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Instrutor_model', 'instrutor');
            $this->load->view('header');
            $dados['nacionalidade'] = $this->instrutor->getNacionalidade();
            $dados['escolaridade'] = $this->instrutor->getEscolaridade();
            $dados['statusFederado'] = $this->instrutor->getStatus();
            $dados['uf'] = $this->instrutor->getUF();
            $dados["filial"] = $this->instrutor->getFilial($this->session->userdata('id'));
            $this->load->view('instrutores/incluirFederado', $dados);
            $this->load->view('footer');
        } else {

            $this->fotoFederado(0);
        }
    }

    function alterarFederado($federado) {
        $this->form_validation->set_rules('nome', 'Nome', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('fMaterna', 'Filiação Materna', 'alpha_acent|trim');
        $this->form_validation->set_rules('fPaterna', 'Filiação Paterna', 'alpha_acent|trim');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');
        $this->form_validation->set_rules('dtNasc', 'Data', 'required|alpha_dash|trim');
        $this->form_validation->set_rules('rg', 'RG', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone para contato', 'required|telephone|trim');
        $this->form_validation->set_rules('celular', 'Celular para contato', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato', 'required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade', 'Escolaridade', 'required');
        $this->form_validation->set_rules('situacao', 'Situação na federação', 'required');
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'Número do endereço', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro', 'Bairro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF do endereço', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $dados['federado'] = $this->instrutor->DadosFederado($federado);
            $endereco = $dados['federado'][0]['id_endereco'];
            $dados['nacionalidade'] = $this->instrutor->getNacionalidade();
            $dados['escolaridade'] = $this->instrutor->getEscolaridade();
            $dados['tipo'] = $this->instrutor->getTipoFederado();
            $dados['statusFederado'] = $this->instrutor->getStatu();
            $dados['endereco'] = $this->instrutor->getEndereco($endereco);
            $dados['uf'] = $this->instrutor->getUF();


            $dados["filial"] = $this->instrutor->getFilial($id);
            $this->load->view('instrutores/alterarFederado', $dados);
            $this->load->view('footer');
        } else {
            $this->fotoFederado(1);
        }
    }

    function fotoFederado($op) {

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
        $config['file_name'] = (isset($extensao) ? hash($this->input->post('nome')) . "." . $extensao : NULL);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload("foto")) {

            $dados = array('error' => $this->upload->display_errors('<div class="alert-error"><b>', '</b></div>'));
            (($op) ? $this->atualizarFederado($dados) : $this->salvarFederado($dados));
        } else {
            
            $dados = array('upload_foto' => $this->upload->data());
            (($op) ? $this->atualizarFederado($dados, $config['file_name']) : $this->salvarFederado($dados, $config['file_name']));
        }
    }

    function salvarFederado($dados, $foto = NULL) {

        $this->load->model('Instrutor_model', 'instrutor');
        $endereco = array();
        $federado = array();

        $endereco['logradouro'] = $this->input->post('logradouro');
        $endereco['numero'] = $this->input->post('numero');
        $endereco['complemento'] = $this->input->post('compl');
        $endereco['tipo_endereco'] = 1;
        $endereco['bairro'] = $this->input->post('bairro');
        $endereco['cidade'] = $this->input->post('cidade');
        $endereco['uf'] = $this->input->post('uf');

        $this->instrutor->InserirEndereco($endereco);


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
        $federado['tamanho_faixa'] = $this->input->post('faixa');
        $federado['id_tipo_federado'] = 1;
        $federado['caminho_imagem'] = (isset($foto) ? "tkd/" . $foto : "sem foto");



        $this->instrutor->InserirFederado($federado);



        $novoFederado = $this->db->insert_id();

        $this->matricularFederado($novoFederado, $this->input->post('filial'), '1');

        $this->criarLogin($novoFederado, $federado['nome']);

        $this->enviarSenha($novoFederado);
        
        $dados['id_federado'] = $novoFederado;
        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('instrutores/sucessoinclusaoFederado', $dados);
        $this->load->view('footer');
    }

    function enviarSenha($id_federado,$relembrar=null) {

        $dados = $this->instrutor->get_login($id_federado);
        if(empty($dados)){
            $this->session->set_flashdata('aviso','Operação ilegal realizada erro 404 -  usuário não encontrado');
            redirect('/login/erro');
        }
        extract($dados['0']);

        
        $this->load->library('email');
        $this->email->from('elder.f.silva@gmail.com', 'Felipe');
        $this->email->to($email);
        $this->email->subject('Acesso ao sistema FEPAMI');
        
        $mensagem = "<p>Caro Aluno(a) {$nome} </p>
                  <p>Seu cadastro de acesso ao sistema FEPAMI foi realizado</p>
                  <p>segue abaixo informações de acesso.</p>
                  <p>Login: {$login}</p>
                  <p>Senha: {$senha}</p>
                  <p>ATENÇÃO: ao realizar seu primeiro acesso será obrigatório a troca de senha</p>";
        
            $this->email->message($mensagem);      
        if($this->email->send()){
           
           if($relembrar!=null){
               $this->session->set_flashdata('alerta','Email re-enviado com os dados de acesso para o aluno');
               redirect('/instrutores');
           }
            
        }else{
            $this->session->set_flashdata('aviso','Não foi possivel enviar um email com os dados de acesso');
            };

        
      
    }

    function atualizarFederado($dados, $foto = NULL) {


        $this->load->model('Instrutor_model', 'instrutor');
        $endereco = array();
        $federado = array();

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

        $federado['caminho_imagem'] = (isset($foto) ? "tkd/" . $foto : "sem foto");


        $this->instrutor->AtualizarEndereco($this->input->post('endereco'), $endereco);

        $this->instrutor->AtualizarDadosFederado($this->input->post('federado'), $federado);

        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('instrutores/sucessoAlteracaoFederado', $dados);
        $this->load->view('footer');
    }

    function matricularFederado($federado, $filial, $modalidade) {

        $this->load->model('Instrutor_model', 'instrutor');
        $matricula = array();
        $matricula['id_federado'] = $federado;
        $matricula['id_modalidade'] = $modalidade;
        $matricula['id_filial'] = $filial;
        $matricula['data_matricula'] = date('Y-m-d');
        $matricula['matricula_filial'] = date('Y-m-d');

        $this->gerarGraduacao($federado, $modalidade);

        $this->instrutor->matricularFederado($matricula);
    }

    function gerarGraduacao($federado, $modalidade) {

        $primeiraFaixa = '1';
        $graduacao['id_modalidade'] = $modalidade;
        $graduacao['id_graduacao'] = $primeiraFaixa;
        $graduacao['id_federado'] = $federado;
        $graduacao['status'] = '1';
        $graduacao['data_emissao'] = date('Y-m-d');
        $this->instrutor->gerarGraduacao($graduacao);
    }

    function alterarMatricula($federado, $filial, $modalidade) {
        $this->load->model('Instrutor_model', 'instrutor');
        $matricula = array();
        $matricula['id_federado'] = $federado;
        $matricula['id_modalidade'] = $modalidade;
        $matricula['id_filial'] = $filial;
        $matricula['matricula_filial'] = date("Y-m-d");

        $this->instrutor->alterarMatricula($federado, $modalidade, $matricula);
    }

    function criarLogin($federado, $nome) {
        $this->load->model('Instrutor_model', 'instrutor');
        $login = array();
        $login['id_federado'] = $federado;
        $login['login'] = strtolower($this->gerarLogin($nome));
        $login['senha'] = $this->gerarSenha();
        $login['status'] = '0';
        $this->instrutor->criarLogin($login);
    }

    function gerarLogin($nome) {
        $arrNome = explode(" ", $nome);
        $retorno = substr($arrNome[0], 0, 1);
        $retorno .= end($arrNome);
        if (strlen($retorno) > 20)
            $retorno = substr($retorno, 0, 20);
        return $retorno;
    }

    function gerarSenha($tamanho = 10, $maiusculas = true, $numeros = true) {
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

    //function cadastro() {
//        $this->load->model('Instrutor_model');
//        $tema["filial"] = $this->instrutor->getFilial($this->session->userdata('id'));
//        $this->load->view('header');
//        $this->load->view('instrutores/cadastro', $tema);
//        $this->load->view('footer');
//    }
//
//    function getFilial($id) {
//        $tmp = '';
//        $data = $this->instrutor->getFilial($id);
//        if ($id == null) {
//            $tmp .= "<option value=''>Selecione a Filial</option>";
//        } else if (!empty($data)) {
//            $tmp .= "<option value=''>Selecione uma Filial</option>";
//            foreach ($data as $row) {
//                $tmp .= "<option value='" . $row->id . "'>" . utf8_encode($row->nome) . "</option>";
//            }
//        } else {
//            $tmp .= "<option value=''>Sem registro para esta Filial</option>";
//        }
//
//        die($tmp);
//    }

    function inscricao() {
        $this->load->model('Instrutor_model');
        $this->load->model('Coordenador_model','coordenador');

        $tema["filial"] = $this->instrutor->getFilial($this->session->userdata('id'));
        
        $tema['evento'] = $this->coordenador->ultimo_evento();
        $this->load->view('header');
        $this->load->view('instrutores/inscricao', $tema);
        $this->load->view('footer');
    }

    function getFiliais($id) {
        $tmp = '';
        $data = $this->instrutor->getFilial($id);
        if ($id == null) {
            $tmp .= "<option value='' >Selecione a Filial</option>";
        } else if (!empty($data)) {
            $tmp .= "<option value=''>Selecione uma Filial</option>";
            foreach ($data as $row) {
                $tmp .= "<option value='" . $row->id . "'>" . utf8_encode($row->nome) . "</option>";
            }
        } else {
            $tmp .= "<option value=''>Sem registro para esta Filial</option>";
        }

        die($tmp);
    }

    function getInscrito($filial) {

        $this->load->model('Instrutor_model', 'instrutor');

        header('Content-type: application/x-json; charset=utf-8 ', true);

        //   echo (htmlentities(utf8_encode('�,n�o, tr�s')));

        $filiais = $this->instrutor->getInscrito($filial);


//        print_r($filiais);
        if (!empty($filiais)) {
            echo (json_encode($filiais));
        }
    }

    function confirmar() {
        $this->load->view('header');



        if ($this->input->post('nodeCheck')) {


            //salvar alunos na tabela pre-avaliação
            $this->instrutor->pre_avaliacao($this->input->post());


            $dados['msg'] = 'Inclusão de Federados no Evento realizada com sucesso.<br />';
            $dados['status'] = true;
        } else {
            $dados['status'] = false;
            $dados['msg'] = 'Nenhum Federado foi selecionado para inclusão no evento' . '<br/>' . 'Favor Selecionar um ou mais Federado.<br />';
        }
        $this->load->view('instrutores/sucessoInclusaoEvento', $dados);


        $this->load->view('footer');
    }

    function manutencao($id = '1') {
        //lista de participantes para o proximo evento 
        $dados['resultado'] = $this->instrutor->get_status_avaliacao();

        //total de alunos do instrutor
        $dados['total_alunos'] = $this->instrutor->total_alunos($this->session->userdata('id'), 'total');

        //Carregar data do próximo evento
        $this->load->model('Coordenador_model', 'coordenador');
        @$dados['ultimo_evento'] = $this->coordenador->ultimo_evento();


        $this->load->view('header');
        $this->load->view('instrutores/manutencao', $dados);
        $this->load->view('footer');
    }

    function evento() {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('instrutores/evento');
        $this->load->view('footer');
    }

}


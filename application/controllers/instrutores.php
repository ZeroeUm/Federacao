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
        $this->load->model('Instrutor_model');
    }

    function cadastro() {
        $this->load->model('instrutor_model');
        $tema["instrutor"] = $this->Instrutor_model->cadastro();
        $this->load->view('header');
        $this->load->view('instrutores/cadastro', $tema);
        $this->load->view('footer');
    }

    function getFilial($id) {
        $tmp = '';
        $data = $this->Instrutor_model->getFilial($id);
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
            $data = $this->Instrutor_model->getStatus();
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
        $data = $this->Instrutor_model->getAluno($filial, $status);
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

        echo(json_encode($resultado));
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
        $this->form_validation->set_rules('celular', 'Celular para contato', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail para contato', 'required|valid_email|trim');
        $this->form_validation->set_rules('escolaridade', 'Escolaridade', 'required');
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo de federado na federação', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'Número do endereço', 'required|is_natural_no_zero|trim');
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
            $dados['tipo'] = $this->instrutor->getTipoFederado();
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
        $this->form_validation->set_rules('tipo', 'Tipo de federado na federação', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'Número do endereço', 'required|is_natural_no_zero|trim');
        $this->form_validation->set_rules('bairro', 'Bairro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('cidade', 'Cidade do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('uf', 'UF do endereço', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Instrutor_model', 'instrutor');
            $this->load->view('header');
            $dados['federado'] = $this->instrutor->DadosFederado($federado);
            $endereco = $dados['federado'][0]['id_endereco'];
            $dados['nacionalidade'] = $this->instrutor->getNacionalidade();
            $dados['escolaridade'] = $this->instrutor->getEscolaridade();
            $dados['tipo'] = $this->instrutor->getTipoFederado();
            $dados['statusFederado'] = $this->instrutor->getStatu();
            $dados['endereco'] = $this->instrutor->getEndereco($endereco);
            $dados['uf'] = $this->instrutor->getUF();
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
        $config['file_name'] = (isset($extensao) ? $this->input->post('nome') . "." . $extensao : NULL);

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
        $federado['id_tipo_federado'] = $this->input->post('tipo');
        $federado['caminho_imagem'] = (isset($foto) ? "tkd/" . $foto : "sem foto");

        $this->instrutor->AtualizarDadosFederado($this->input->post('instrutor'), $federado);

        $this->instrutor->AtualizarEndereco($this->input->post('endereco'), $endereco);

        $dados['federado'] = $federado['nome'];
        $this->load->view('header');
        $this->load->view('instrutores/sucessoAlteracaoFederado', $dados);
        $this->load->view('footer');
    }

    function novoaluno() {
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
        $this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo de federado na federação', 'required');
        $this->form_validation->set_rules('logradouro', 'Logradouro do endereço', 'required|alpha_acent|trim');
        $this->form_validation->set_rules('numero', 'Número do endereço', 'required|is_natural_no_zero|trim');
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
            $dados['tipo'] = $this->instrutor->getTipoFederado();
            $this->load->view('instrutores/novoaluno', $dados);
            $this->load->view('footer');
        } else {
            $this->fotoFederado(0);
        }
    }

    function inscricao() {
        $this->load->model('Instrutor_model');
        $tema["instrutor"] = $this->Instrutor_model->inscrever();
        $this->load->view('header');
        $this->load->view('instrutores/inscricao', $tema);
        $this->load->view('footer');
    }

    function getFiliais($id) {
        $tmp = '';
        $data = $this->Instrutor_model->getFilial($id);
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

    function getInscrito($filial) {
        $this->load->model('Instrutor_model', 'instrutor');
        header('Content-type: application/x-json; charset=utf-8');
        $filiais = $this->instrutor->getInscrito($filial);
        if (!empty($filiais)) {
             for ($i = 0; $i < count($filiais); $i++) {
            $resultado = array_map('htmlentities', $filiais[$i]);
             }
            echo(json_encode($resultado));
        }
    }

    function manutencao($id = '1') {
        $this->load->model('Instrutor_model');
        $tema["instrutor"] = $this->Instrutor_model->getInscrito('1');
        $this->load->view('header');
        $this->load->view('instrutores/manutencao', $tema);
        $this->load->view('footer');
    }

    function evento() {
        $this->load->view('header');
        $this->load->view('devel');
        $this->load->view('instrutores/evento');
        $this->load->view('footer');
    }

}


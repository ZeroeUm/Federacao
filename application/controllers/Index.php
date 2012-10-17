<?php

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $this->load->model('usuario_model');
        $data ['usuario'] = $this->usuario_model->get_all('');
        $this->load->view('index', $data);
        //$this->load->view('login_view');
    }

    function create_usuario() {
        //$this->load->library("session");
        $this->load->model('usuario_model');
        $data = array('nome' => $this->input->post('nome'), 'email' => $this->input->post('email'), 'senha' => $this->input->post('senha'));

        if ($this->usuario_model->add_record($data)) {
            $this->session->set_flashdata('msg', 'Criado com sucesso!');
            redirect('http://localhost/cod2/');
        }
    }

    function apagar_usuario() {

        $this->load->model('usuario_model');
        if ($this->usuario_model->delete_record()) {
            $this->session->set_flashdata('msg', 'Excluido com sucesso!');
            //redirect('http://localhost/cod2/');
            redirect(base_url());
        }
    }

    function editar_usuario($id) {
        $this->load->model('usuario_model');
        $data['usuario'] = $this->usuario_model->get_by_id($id);
        $this->form_validation->set_rules('nome', 'nome', 'trim|requerired');
        if ($this->form_validation->run()) {
            $_POST['id'] = $id;
            if ($this->usuario_model->update_record($_POST)) {
                $this->session->set_flashdata('msg', 'Editado com sucesso!');
                redirect(base_url());
            }
        }
        $this->load->view('update_view', $data);
    }

    function login() {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback__check_login');
        $this->form_validation->set_rules('senha','senha','trim|required|callback|valid_senha|__check_login');
        if ($this->form_validation->run())
            die('Você esta logado');
        $this->load->view('login_view');
    }

    function _check_login($email) {
        if ($this->input->post('senha')) {
            $this->load->model('usuario_model');
            $user = $this->usuario_model->get_usuario($email, $this->input->post('senha'));
            if ($user)
                return true;
        }
        $this->form_validation->set_message('_check_login', 'Usuario / senha incorreta');
        return false;
    }

    
    
    
    function estacoes($estacao) {
        $datas ["estacao"] = $estacao;
        switch ($estacao) {
            case "primavera" :
                // $data ["estacao"] = "Primavera";
                $datas ["programacao"] = "Café da manha - Passeio";
                break;
            case "verao" :
                // $data["programacao"] = "Verão";
                $datas ["programacao"] = "Bola - sorvete";
                break;
        }
        $this->load->view('programacao', $datas);
    }

}

?>

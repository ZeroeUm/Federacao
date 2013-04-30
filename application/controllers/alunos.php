<?php
/**
 * Description of alunos
 *
 * @author Humberto
 */
class alunos extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Aluno_model','aluno');
        $this->checar_sessao();
    }

    function index()
    {
        
    }

    function checar_sessao()
    {
        if (!$this->session->userdata('autentificado'))
            redirect('login', 'refresh');
    }

    function notas()
    {
        $this->load->view('header');
        $this->load->view('alunos/notas');
        $this->load->view('footer');
    }

    function eventos()
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

    function modalidade()
    {
        $this->load->view('header');
        $modalidade = $this->session->userdata('idModalidade');
        $dados['faixas'] = $this->aluno->curriculoModalidade($modalidade);
        $this->load->view('alunos/curriculoModalidade',$dados);
        $this->load->view('footer');
    }

}

?>

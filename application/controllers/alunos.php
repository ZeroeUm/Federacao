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
        redirect('alunos/eventos','refresh');
    }
    
    function historico_de_notas($id_evento)
    {
        $data['historico'] = $this->aluno->get_historico($this->session->userdata("id"),$id_evento);
        
        $this->load->view('header');
        $this->load->view('alunos/historico_notas',$data);
        $this->load->view('footer');
    }

    function checar_sessao()
    {
        if (!$this->session->userdata('autentificado'))
            redirect('login', 'refresh');
    }

    function notas()
    {
        $this->load->view('header');
        $aluno = $this->session->userdata('id');
        $dados['historico'] = $this->aluno->historicoNotas($aluno);
        
        $this->load->view('alunos/notas',$dados);
        $this->load->view('footer');
    }

    function eventos()
    {
        $data['eventos']= $this->aluno->get_eventos();
       
        $this->load->view('header');
        $this->load->view('alunos/lista_de_evento',$data);
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
    
    function curriculoFaixa($faixa)
    {
        $this->load->view('header');
        $modalidade = $this->session->userdata('idModalidade');
        $dados['faixas'] = $this->aluno->curriculoModalidade($modalidade);
        $dados['inf'] = $this->aluno->curriculoFaixa($faixa);
        $dados['id_faixa'] = $faixa;
        $this->load->view('alunos/curriculoFaixa',$dados);
        $this->load->view('footer');
    }

}

?>

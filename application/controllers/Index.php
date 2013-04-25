<?php

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        /*$this->load->model('usuario_model');
        $data ['usuario'] = $this->usuario_model->get_all('');
        $this->load->view('index', $data);*/
        $this->load->view('index');
    }
    
    
    

}

?>

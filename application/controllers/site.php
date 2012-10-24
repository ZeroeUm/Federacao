<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of site
 *
 * @author felipe
 */
class Site extends CI_Controller{
   function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->view('index');
    }
    
}

?>

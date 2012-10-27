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
class Home extends CI_Controller{
   function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');    
    }
  
    

    
}   
?>
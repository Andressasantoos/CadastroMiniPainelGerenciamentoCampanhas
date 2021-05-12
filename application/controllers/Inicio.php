<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

   public function __construct(){

        parent::__construct();
        $this->load->Library('form_validation');
    }

     //Pagina Inicio
     public function index()
     {
        $this->load->view('template/index');    
     }      
     //Pagina Empresa   
     public function empresa()
     {  	
        $this->load->view('painel/template/empresa');
     }
     //Pagina Participante
     public function participantes()
     {   		
        redirect('participantes','refresh');
     }
	
	
	
}

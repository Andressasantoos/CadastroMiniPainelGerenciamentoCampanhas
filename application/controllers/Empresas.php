<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {
    
    public function __construct(){

    	parent::__construct();
        $this->load->Library('form_validation');
        $this->load->model('empresas_model');
    }

	public function index()
	{
        //Listo todas as empresas
        $data['empresas'] = $this->empresas_model->getEmpresas();

        $data['titulo'] = "Empresas";
        $data['view'] = 'empresas/lista';
        $this->load->view('template/home', $data);    
    }
    
    //Visualizar Participantes Vinculado a Empresas
    public function view_participantes_empresas($id_empresa=NULL)
    {
          //Listo todos(as) participantes vinculado a empresas
          $data['participantes'] = $this->empresas_model->getParticipantesEmpresa($id_empresa);
  
          $data['titulo'] = "Participantes Vinculados a Empresa";
          $data['view'] = 'empresas/lista_empresa';
          $this->load->view('template/home', $data);    
      }

    //Chamar Pagina para atualizar ou cadastrar empresa
    public function empresa($id_empresa=NULL)
    {         
        $dados = NULL;   

          //Se o id_empresa for passado, ele abre o form para atualizar
          if ($id_empresa) {
              
            $data['titulo'] = 'Atualizar Empresa';

            $dados = $this->empresas_model->getEmpresaId($id_empresa);

            if (!$dados) {
                
                 redirect('empresas', 'refresh');
            }
             
          }  else{ // Se o id não for passado, ele abre o form para salvar
             
              $data['titulo'] = 'Cadastrar Nova Empresa';
        }
      
        $data['dados'] = $dados;
        $data['view'] = 'empresas/cadas_empresa';
        $this->load->view('template/home', $data);    
    }
    
    //Cadastrar Empresa
    public function cadastrar_emp()
    {            
        $retorno = '';
          
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|is_unique[empresas.cnpj]', ['is_unique' => 'CNPJ já cadastrado, cadastre outra empresa']);
        $this->form_validation->set_rules('razao_social', 'Razão Social', 'required|is_unique[empresas.razao_social]', ['is_unique' => 'Razão Social já cadastrado, cadastre outra empresa']);
      
       //Faz a validação dos campos
       if ($this->form_validation->run()) {

               $empresa = [                   
                  'cnpj' => $this->input->post('cnpj'),
                  'razao_social' => $this->input->post('razao_social')
              ];
     
              //Realiza o Cadastro da Empresa
             $this->empresas_model->doInsertEmpresa($empresa);            
   
             //Retorna a Mensagem para a Página
             $retorno = [
              'erro' => 0,
              'msg' => 'Empresa Cadastrada com Sucesso',
              'status' => 'Cadastro Efetuado'
            ];

              header('Content-Type: application/json');
              echo json_encode($retorno);
              exit();

        } else{               
                 //Retorna de erro de validação
                  $error = array();
                  foreach($this->input->post() as $key => $val){
                    $error[$key] = form_error($key);
                  }
                
                    $retorno = [
                      'erro' => 10,
                      'errors' => array_filter($error),
                      'msg' => validation_errors(),
                      'cnpj' => form_error('cnpj'),
                      'razao_social' => form_error('razao_social'),                      
                  ];        
                   
        }
        
        header('Content-Type: application/json');
        echo json_encode($retorno);
        exit();   
    }

    //Atualizar Empresa
    public function atualizar_emp()
    {            
        $retorno = '';
          
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required');
        $this->form_validation->set_rules('razao_social', 'Razão Social', 'required');
      
       //Faz a validação dos campos
       if ($this->form_validation->run()) {
             
               $empresa = [                   
                  'cnpj' => $this->input->post('cnpj'),
                  'razao_social' => $this->input->post('razao_social')                  
              ];
               
              $id_empresa = $this->input->post('id_empresa'); 

             //Realiza a Atualização da Empresa
             $this->empresas_model->doUpdateEmpresa($empresa,$id_empresa);            
   
             //Retorna a Mensagem para a Página
             $retorno = [
              'erro' => 0,
              'msg' => 'Empresa Atualizada com Sucesso',
              'status' => 'Cadastro Atualizado'
            ];

              header('Content-Type: application/json');
              echo json_encode($retorno);
              exit();

        } else{               
                 //Retorna de erro de validação
                  $error = array();
                  foreach($this->input->post() as $key => $val){
                    $error[$key] = form_error($key);
                  }
                
                    $retorno = [
                      'erro' => 10,
                      'errors' => array_filter($error),
                      'msg' => validation_errors(),
                      'cnpj' => form_error('cnpj'),
                      'razao_social' => form_error('razao_social'),                      
                  ];        
                   
        }
        
        header('Content-Type: application/json');
        echo json_encode($retorno);
        exit();   
    }

    //Deletar Empresa
    public function del_empresa($id_empresa=NULL)
    {
            if ($id_empresa) 
            {
                //Deleto a Empresa
                $this->empresas_model->doDelete($id_empresa);
                redirect('empresas', 'refresh');
            }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participantes extends CI_Controller {
    
    public function __construct(){

    	parent::__construct();
        $this->load->Library('form_validation');
        $this->load->model('participantes_model');
    }

	public function index()
	{
        //Listo todos os participantes
        $data['participantes'] = $this->participantes_model->getParticipantes();
         //Listo nomes das empresas
         $data['empresas'] = $this->participantes_model->getEmpresas();

        $data['titulo'] = "Participantes";
        $data['view'] = 'participantes/lista';
        $this->load->view('template/home', $data);    
    }

    //Verificar se pagina é para cadastrar ou atualizar os dados
    public function participante($id_cliente=NULL)
    {       
        $dados = NULL;   

          //Se o id_cliente for passado, ele abre o form para atualizar
          if ($id_cliente) {
              
            $data['titulo'] = 'Atualizar Participante';

            $dados = $this->participantes_model->getParticipanteId($id_cliente);
            $data['empresas'] = $this->participantes_model->getEmpresas();

            if (!$dados) {
                
                 redirect('participantes', 'refresh');
            }
             
          }  else{ //Se o id não for passado, ele abre o form para salvar
             
              $data['titulo'] = 'Cadastrar Novo Participante';
        }
      
        
        //Listo nomes das empresas
        $data['empresas'] = $this->participantes_model->getEmpresas();
        $data['dados'] = $dados;
        $data['view'] = 'participantes/cadas_participantes';
        $this->load->view('template/home', $data);    
    }

    //Cadastrar Participante
    public function cadastrar_pt()
    {       
          $retorno = '';
          
          $this->form_validation->set_rules('nome', 'Nome', 'required');
          $this->form_validation->set_rules('cpf', 'CPF', 'required');
          $this->form_validation->set_rules('data_nascimento', 'Data de nascimento', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('empresa', 'Empresa', 'greater_than[0]'); 
        
         //Faz a validação dos campos
         if ($this->form_validation->run()) {

                 $participante = [
                    'nome' => $this->input->post('nome'),
                    'cpf' => $this->input->post('cpf'),
                    'data_nascimento' => format_DataDb($this->input->post('data_nascimento')), 
                    'email' => $this->input->post('email'),       
                    'empresa' => $this->input->post('empresa'),
                ];
       
                //Realiza o Cadastro do Participante
               $this->participantes_model->doInsertParticipante($participante);            
     
               //Retorna a Mensagem para a Página
               $retorno = [
                'erro' => 0,
                'msg' => 'Participante Cadastrado com Sucesso',
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
                        'nome' => form_error('nome'),
                        'cpf' => form_error('cpf'), 
                        'data_nascimento' => form_error('data_nascimento'),
                        'email' => form_error('email'),
                        'empresa' => form_error('empresa'),
                        
                    ];        
                     
          }
          
          header('Content-Type: application/json');
          echo json_encode($retorno);
          exit();
    }

    //Atualizar Cadastro de Participante
    public function atualizar_pt()
    {   
          $retorno ='';

          $this->form_validation->set_rules('nome', 'Nome', 'required');
          $this->form_validation->set_rules('cpf', 'CPF', 'required');
          $this->form_validation->set_rules('data_nascimento', 'Data de nascimento', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('empresa', 'Empresa', 'greater_than[0]'); 
        
         //Faz a validação dos campos
         if ($this->form_validation->run()) {
                           
            $participante = [
                'nome' => $this->input->post('nome'),
                'cpf' => $this->input->post('cpf'),
                'data_nascimento' => format_DataDb($this->input->post('data_nascimento')), 
                'email' => $this->input->post('email'),       
                'empresa' => $this->input->post('empresa'),
            ];
   
            $id_cliente = $this->input->post('id_cliente');

            //Realiza a Atualização do Participante
            $this->participantes_model->doUpdate($participante, $id_cliente);
            
             //Retorna a Mensagem para a Página
             $retorno = [
                'erro' => 0,
                'msg' => 'Participante Atualizado com Sucesso',
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
                 'nome' => form_error('nome'),
                 'cpf' => form_error('cpf'), 
                 'data_nascimento' => form_error('data_nascimento'),
                 'email' => form_error('email'),
                 'empresa' => form_error('empresa'),
                 
             ];        
              
        }
        
        
        header('Content-Type: application/json');
        echo json_encode($retorno);
        exit();
           
    }

    //Deletar Participante
    public function del_participante($id_cliente=NULL)
    {
            if ($id_cliente) 
            {
                //Deleto o Participante
                $this->participantes_model->doDelete($id_cliente);
                redirect('participantes', 'refresh');

            } else{
            
                redirect('participantes', 'refresh');
          }
    }


}
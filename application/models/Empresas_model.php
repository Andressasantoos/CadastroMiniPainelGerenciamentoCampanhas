<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   /* Model do Controller Empresas */
   class Empresas_model extends CI_Model{

     //Lista de Empresas
     public function getEmpresas()     {

        $this->db->select('empresas.*');
        $this->db->from('empresas');;
        $this->db->group_by('empresas.id_empresa');
        $this->db->order_by('empresas.razao_social', 'asc');
        return $this->db->get()->result();

      }
          
      //Cadastrar Empresa
      public function doInsertEmpresa($dados=NULL)
      {
           if (is_array($dados)) {
               
               $this->db->insert('empresas', $dados);
               return TRUE;
          }  else {

       }    return FALSE;
     } 

         //Verificar se existe Empresa
         public function getEmpresaId($id_empresa=NULL)
         {
                if ($id_empresa) {
                  
                  $this->db->where('id_empresa', $id_empresa);
                  $this->db->limit(1);
                  $query = $this->db->get('empresas');
                  return $query->row();
            }
        } 

      //Atualizar Cadastro da Empresa
      public function doUpdateEmpresa($dados=NULL, $id_empresa=NULL)
      {
             if (is_array($dados)) {
                 
                  $this->db->update('empresas', $dados, array('id_empresa' => $id_empresa));

             }
      }

     //Lista de Participantes Vinculados a Empresa
     public function getParticipantesEmpresa($id_empresa=NULL)
     {

        $this->db->select('participantes.*, empresas.id_empresa, empresas.razao_social');
        $this->db->from('participantes');
        $this->db->join('empresas', 'participantes.empresa = empresas.id_empresa');
        $this->db->where('participantes.empresa', $id_empresa);
        $this->db->group_by('participantes.id_cliente');
        $this->db->order_by('participantes.id_cliente', 'asc');
        return $this->db->get()->result();

      }

             //Delete Empresa
             public function doDelete($id_empresa=NULL)
             {
                 
                 if ($id_empresa) {
                   
                   $this->db->delete('empresas', array('id_empresa' => $id_empresa));
      
                   if ($this->db->affected_rows() > 0) {
                        
                        setMsg('msgCadastro', 'Empresa deletada com sucesso.', 'sucesso');
      
                       } else{
                           
                           setMsg('msgCadastro', 'Erro ao apagar empresa.', 'erro');
      
                       }
                 }
             }


 }     
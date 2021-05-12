<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   /* Model do Controller Participantes */
   class Participantes_model extends CI_Model{

     //Lista de Participantes
     public function getParticipantes()
     {

        $this->db->select('participantes.*, empresas.id_empresa, empresas.razao_social');
        $this->db->from('participantes');
        $this->db->join('empresas', 'participantes.empresa = empresas.id_empresa', 'left');
        $this->db->group_by('participantes.id_cliente');
        $this->db->order_by('participantes.id_cliente', 'asc');
        return $this->db->get()->result();

      }
      
      //Lista de Empresas
      public function getEmpresas()
      {

        $this->db->select('id_empresa, razao_social');
        $this->db->from('empresas');
        $this->db->order_by('razao_social', 'asc');
        return $this->db->get()->result();

      }

      //Verificar se existe Participante
      public function getParticipanteId($id_cliente=NULL)
      {
            if ($id_cliente) {
              
              $this->db->where('id_cliente', $id_cliente);
              $this->db->limit(1);
              $query = $this->db->get('participantes');
              return $query->row();
        }
    }
       
      //Cadastrar Participante
       public function doInsertParticipante($dados=NULL)
       {
            if (is_array($dados)) {
                
                $this->db->insert('participantes', $dados);
                return TRUE;
           }  else {

        }    return FALSE;
      } 

      //Atualizar Cadastro do Participante
      public function doUpdate($dados=NULL, $id_cliente=NULL)
      {
             if (is_array($dados)) {
                 
                  $this->db->update('participantes', $dados, array('id_cliente' => $id_cliente));
                  
             }
      }

       //Delete Participante
       public function doDelete($id_cliente=NULL)
       {
           
           if ($id_cliente) {
             
             $this->db->delete('participantes', array('id_cliente' => $id_cliente));

             if ($this->db->affected_rows() > 0) {
                  
                  setMsg('msgCadastro', 'Participante deletado com sucesso.', 'sucesso');

                 } else{
                     
                     setMsg('msgCadastro', 'Erro ao apagar participante.', 'erro');

                 }
           }
       }

   }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   function setMsg($id, $msg, $tipo){
        
        $CI =& get_instance();

        switch ($tipo) {
        	case 'erro':
        		$CI->session->set_flashdata($id, '<div class="alert alert-danger" role="alert">'.$msg.'</div>');
        		break;
        	case 'sucesso':
        		$CI->session->set_flashdata($id, '<div class="alert alert-success" role="alert">'.$msg.'</div>');
        		break;
        }

        return FALSE;
   }

   function getMsg($id){

     $CI =& get_instance();
     if ($CI->session->flashdata($id)) {
     	
     	echo $CI->session->flashdata($id);
     }
   }

   function errosValidacao(){
     
      if (validation_errors()) {
          echo'<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
       } 

   }


   function format_DataDb($data=NULL){

             if ($data) {

              //ENTRADA -> 10/05/1990
             $data = explode("/", $data);

            //SAIDA -> 1980-05-10
             return $data[2] .'-'. $data[1] .'-'. $data[0];
               
             }
             
   }

   function formataDataView($data=NULL)
   {
        if ($data) {
            
            //ENTRADA ->1980-10-10
            $data = explode('-', $data);

            //SAIDA -> 10/10/1980
            return $data[2] .'/'. $data[1] .'/'. $data[0];
        }
   }
   
  
       function formataMoedaReal($valor=NULL, $real=FALSE)
       {
           if ($valor) {
                   
               $valor = ($real == TRUE ? 'R$' : '').number_format($valor, 2, ',', '.');
               return $valor;
                   
           }      

       }

       function formatoDecimal($valor=NULL){
           
           $valor = str_replace('.', '', $valor);
           $valor = str_replace(',', '.', $valor);

           return $valor;

       }

       function dataDiaDb()
       {
          date_default_timezone_get('America/Sao_paulo');
          $formato = 'DATE_W3C';
          $hora = time();
          return standard_date($formato, $hora);
       }

        function dataDb()
       {
          date_default_timezone_set('America/Sao_paulo');
          $stringdedata = 'y-m-d';
          $hora = time();
          $data = date($stringdedata, $hora);
          return $data;
       }


       function slug($string=NULL)
       {
          $string =  remove_acentos($string);
          return url_title($string, '-', TRUE);
       }

       function remove_acentos($string=NULL)
       {
          $procurar = array('Á','À','Ã','Â','Ä','à','ã','â','ä','é','è','ê','ë','É','È','Ê','Ë','í','ì','î','ï','Í','Ì','Î','Ï','ó','ò','õ','ô','ö','Ó','Ò','Õ','Ô','Ö','ú','ù','û','ü','Ú','Ù','Û','Ü','ñ','Ñ','ç','Ç');
        $substituir = array('A','A','A','A','A','a','a','a','a','a','e','e','e','E','E','E','E','i','i','i','i','I','I','I','I','o','o','o','o','o','O','O','O','O','O','u','u','u','u','U','U','U','U','n','N','c','C');
         
         return str_replace($procurar, $substituir, $string); 
       }

       function limpaString($string=NULL){
            if ($string) {
                return preg_replace('/[^0-9]/', '', $string);
            }
       }

       
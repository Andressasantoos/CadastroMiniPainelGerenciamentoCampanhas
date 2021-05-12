var cdem = function (){

    //cadastrar Empresa
    var cadastrarEmpresa = function(){
      
      $('.btn-cadastrar_emp').on('click', function(e){
      event.preventDefault();
          
          $('.resposta_em').addClass('d-none');
        
           var form = $('.form_cadastrar_empresa').serialize();


           $.ajax({
             type: 'post',
             url: 'http://[::1]/gerenciamentocampanhas/empresas/cadastrar_emp',
             data: form,
             dataType: "JSON",
                beforeSend: function(){
                 
                  //Envia a mensagem de espera enquanto cadastra
                  $('.msg_wait_em').removeClass('d-none');
                 
               },
                 success: function(res){

                 $('.msg_wait_em').addClass('d-none');
                 
                    if (res.erro == 0) {
                        
                        $('.resposta_em').removeClass('d-none');
                         var div_concluido = '<div class="row margin-top-40">'+
                                              '<div class="col-md-12 text-center" style="color:#20B2AA!important;">'+
                                                 '<h2 style="font-family: "Times New Roman", Times, serif;"><i class="fas fa-check-square" style="color:#01B1AF;"></i> ' + res.msg + '</h2>'+
                                                 '<p>' + res.status + ' <i class="fas fa-check"></i></p>'+
                                                '</div>'+  
                                            '</div>';       
                                 $('.resposta_em').html(div_concluido);    

                                //Limpa os campos 
                                $("#cnpj").val("");
                                $("#razao_social").val("");
                                $('.cnpj').html('');
                                $('.razao_social').html('');

                    } else {
                  
                        //Limpa os campos 
                        $('.cnpj').html('');
                        $('.razao_social').html('');
                        
                        $('.msg_wait_em').addClass('d-none');
                        $('.resposta_em').html('');          
                        $('.resposta_em').addClass('d-none');
                        
                        $('.cnpj').html(res.cnpj);
                        $('.razao_social').html(res.razao_social); 
                   }
              },error: function(response){
                
                    $('.msg_wait_em').addClass('d-none');
                    console.log("Erro" + response); 
                    $('.resposta_em').html('<div class="alert alert-danger" role="alert"> Erro: '+ res.msg +'  atualize sua página e tente novamente! </div>');
                                    
               }
           });
      });
}


    //Atualizar Empresa
    var atualizarEmpresa = function(){

        //Verifico se alguma atualização do form foi atualizado
        if (sessionStorage) {
            sessionStorage.setItem('form', jQuery('form').serialize());
        }

      
        $('.btn-atualizar_emp').on('click', function(e){
        event.preventDefault();
            
            $('.resposta_em').addClass('d-none');

            //Se nenhuma alteração foi feita ele apresenta a mensagem
            if (jQuery('form').serialize() === sessionStorage.getItem('form')) {

                alert('Não é possivel atualizar, pois nenhuma informação foi alterada.');

            }else {
          
             var form = $('.form_cadastrar_empresa').serialize();
  
  
             $.ajax({
               type: 'post',
               url: 'http://[::1]/gerenciamentocampanhas/empresas/atualizar_emp',
               data: form,
               dataType: "JSON",
                  beforeSend: function(){
                   
                    //Envia a mensagem de espera enquanto cadastra
                    $('.msg_wait_em').removeClass('d-none');
                   
                 },
                   success: function(res){
  
                   $('.msg_wait_em').addClass('d-none');
                   
                      if (res.erro == 0) {
                          
                          $('.resposta_em').removeClass('d-none');
                           var div_concluido = '<div class="row margin-top-40">'+
                                                '<div class="col-md-12 text-center" style="color:#20B2AA!important;">'+
                                                   '<h2 style="font-family: "Times New Roman", Times, serif;"><i class="fas fa-check-square" style="color:#01B1AF;"></i> ' + res.msg + '</h2>'+
                                                   '<p>' + res.status + ' <i class="fas fa-check"></i></p>'+
                                                  '</div>'+  
                                              '</div>';       
                                   $('.resposta_em').html(div_concluido);    
  
                                  //Limpa os campos 
                                  $('.cnpj').html('');
                                  $('.razao_social').html('');
  
                      } else {
                    
                          //Limpa os campos 
                          $('.cnpj').html('');
                          $('.razao_social').html('');

                          $('.msg_wait_em').addClass('d-none');
                          $('.resposta_em').html('');          
                          $('.resposta_em').addClass('d-none');
                          
                          $('.cnpj').html(res.cnpj);
                          $('.razao_social').html(res.razao_social); 
                     }
                },error: function(response){
                  
                      $('.msg_wait_em').addClass('d-none');
                      console.log("Erro" + response); 
                      $('.resposta_em').html('<div class="alert alert-danger" role="alert"> Erro: '+ res.msg +'  atualize sua página e tente novamente! </div>');
                                      
                 }
             });
            }
        });
  }
             
  

return {
    init:function(){
        cadastrarEmpresa();
        atualizarEmpresa();
    }
}

}();

jQuery(document).ready(function(){
    cdem.init();
});        
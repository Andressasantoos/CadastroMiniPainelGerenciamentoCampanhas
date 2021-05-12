var cdp = function (){

    //cadastrar Participante
    var cadastrarParticipante = function(){
      
      $('.btn-cadastrar_pc').on('click', function(e){
      event.preventDefault();
          
          $('.resposta').addClass('d-none');
        
           var form = $('.form_cadastrar_participante').serialize();


           $.ajax({
             type: 'post',
             url: 'http://[::1]/gerenciamentocampanhas/participantes/cadastrar_pt',
             data: form,
             dataType: "JSON",
                beforeSend: function(){
                 
                  //Envia a mensagem de espera enquanto cadastra
                  $('.msg_wait').removeClass('d-none');
                 
               },
                 success: function(res){

                 $('.msg_wait').addClass('d-none');
               
                    if (res.erro == 0) {
                         
                        $('.resposta').removeClass('d-none');
                         var div_concluido = '<div class="row margin-top-40">'+
                                              '<div class="col-md-12 text-center" style="color:#20B2AA!important;">'+
                                                 '<h2 style="font-family: "Times New Roman", Times, serif;"><i class="far fa-thumbs-up" style="color:#01B1AF;"></i> ' + res.msg + '</h2>'+
                                                 '<p>' + res.status + ' <i class="fas fa-check"></i></p>'+
                                                '</div>'+  
                                            '</div>';       
                                 $('.resposta').html(div_concluido);    

                                //Limpa os campos 
                                $("#nome").val("");
                                $("#cpf").val("");
                                $("#email").val("");
                                $("#data_nascimento").val("");
                                $("#empresa").val("");
                                $('.email').html('');
                                $('.nome').html('');
                                $('.cpf').html('');
                                $('.data_nascimento').html('');
                                $('.empresas').html('');

                    } else {
                        
                        //Limpa os campos
                        $('.email').html('');
                        $('.nome').html('');
                        $('.cpf').html('');
                        $('.data_nascimento').html('');
                        $('.empresas').html('');
                  
                        $('.msg_wait').addClass('d-none');
                        $('.resposta').html('');          
                        $('.resposta').addClass('d-none');
                        
                        $('.nome').html(res.nome);
                        $('.cpf').html(res.cpf); 
                        $('.data_nascimento').html(res.data_nascimento);
                        $('.email').html(res.email);
                        $('.empresas').html(res.empresa); 
                   }
              },error: function(response){
                
                    $('.msg_wait').addClass('d-none');
                    console.log("Erro" + response); 
                    $('.resposta').html('<div class="alert alert-danger" role="alert"> Erro: '+ res.msg +'  atualize sua página e tente novamente! </div>');
                                    
               }
           });
      });
}


 //Atualizar Participante
 var atualizarParticipante = function(){
     
    //Verifico se alguma atualização do form foi atualizado
    if (sessionStorage) {
        sessionStorage.setItem('form', jQuery('form').serialize());
    }

    $('.btn-atualizar_pc').on('click', function(e){
    event.preventDefault();
        
        $('.resposta').addClass('d-none');

        //Se nenhuma alteração foi feita ele apresenta a mensagem
        if (jQuery('form').serialize() === sessionStorage.getItem('form')) {

            alert('Não é possivel atualizar, pois nenhuma informação foi alterada.');

        }else {
         var form = $('.form_cadastrar_participante').serialize();


         $.ajax({
           type: 'post',
           url: 'http://[::1]/gerenciamentocampanhas/participantes/atualizar_pt',
           data: form,
           dataType: "JSON",
              beforeSend: function(){
               
                //Envia a mensagem de espera enquanto cadastra
                $('.msg_wait').removeClass('d-none');
               
             },
               success: function(res){

               $('.msg_wait').addClass('d-none');
             
                  if (res.erro == 0) {
                       
                      $('.resposta').removeClass('d-none');
                       var div_concluido = '<div class="row margin-top-40">'+
                                            '<div class="col-md-12 text-center" style="color:#20B2AA!important;">'+
                                               '<h2 style="font-family: "Times New Roman", Times, serif;"><i class="far fa-thumbs-up" style="color:#01B1AF;"></i> ' + res.msg + '</h2>'+
                                               '<p>' + res.status + ' <i class="fas fa-check"></i></p>'+
                                              '</div>'+  
                                          '</div>';       
                               $('.resposta').html(div_concluido);    

                              //Limpa os campos
                              $('.email').html('');
                              $('.nome').html('');
                              $('.cpf').html('');
                              $('.data_nascimento').html('');
                              $('.empresas').html('');

                  } else {                
                      
                      //Limpa os campos
                      $('.email').html('');
                      $('.nome').html('');
                      $('.cpf').html('');
                      $('.data_nascimento').html('');
                      $('.empresas').html('');

                      $('.msg_wait').addClass('d-none');
                      $('.resposta').html('');          
                      $('.resposta').addClass('d-none');
                     
                      $('.nome').html(res.nome);
                      $('.cpf').html(res.cpf); 
                      $('.data_nascimento').html(res.data_nascimento);
                      $('.email').html(res.email);
                      $('.empresas').html(res.empresa); 
                 }
            },error: function(response){
              
                  $('.msg_wait').addClass('d-none');
                  console.log("Erro" + response); 
                  $('.resposta').html('<div class="alert alert-danger" role="alert"> Erro: '+ res.msg +'  atualize sua página e tente novamente! </div>');
                                  
             }
         });
        }
    });
}
     

return {
    init:function(){
        cadastrarParticipante();
        atualizarParticipante();
    }
}

}();

jQuery(document).ready(function(){
    cdp.init();
});        
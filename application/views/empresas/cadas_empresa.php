<style>
/*Cel Phone */
  label{font-weight:500!important;color:gray;}
  h1{font-weight:300!important;color:gray;font-size:26px;margin-top:25%;}
  h2{font-weight:300!important;color:#01B1AF;font-size:30px;font-family: "Times New Roman", Times, serif;}
  .form-group{padding-top:2%;}
  .text-danger{color:red!important;}

  .margin-bottom-20{margin-top:10%;margin-left:0px;}
  .margin-bottom-20 .btn-voltar{margin-right:0%;margin-top:-350px;}
  .margin-bottom-20 img{width:40px;height:30;}
  

/*SMALL DEVICES - SMARTPHONES */
@media screen and (min-width: 480px){
  h1{font-size:28px;margin-top:17%;}
  }

/*SMALL DEVICES - TABLETS */
@media screen and (min-width: 768px){
   h1{font-size:26px;margin-top:5%;}
  .margin-bottom-20{margin-top:5%;width:95%;margin-right:2.5%;margin-left:2.5%;}
  .margin-bottom-20 .btn-voltar{margin-top:20px;}
  .form_cadastrar_empresa{width:94%;margin-right:1%;margin-left:5%;margin-top:5%;}
}

/*MEDIUM DEVICES - TABLETS  & DESKTOPS*/
@media screen and (min-width: 960px){ 
  .form_cadastrar_empresa{margin-right:0%;margin-left:6%;}
}

/*LARGUE DEVICES - WIDE SCREENS*/
@media screen and (min-width: 1280px){
  .margin-bottom-20{margin-top:2%;width:90%;margin-right:5%;margin-left:5%;}
  .form_cadastrar_empresa{width:90%;margin-right:1%;margin-left:9%;margin-top:3%;}
}

</style>
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">         
          <div class="row margin-bottom-20">
               <div class="col-md-6 text-left">
                  <h1><img src="<?php echo base_url('public/img/office-building.png')?>" width=50 height=50>&nbsp;&nbsp;<?= $titulo ?></h1><br>
                 </div>                 
                 <div class="col-md-6 text-right">
                  <a href="<?php echo base_url('empresas') ?>" title="Voltar" class="btn btn-success btn-voltar"><i class="fas fa-arrow-left"></i> Voltar</a>
                 </div>  
                 <br>
            </div>     
              
              <div class="msg_wait_em d-none">
                   <h2 class="text-center">Realizando Cadastro, aguarde &nbsp;&nbsp;
                    <img src="<?php echo base_url('public/img/ajaxloader2.gif')?>" style="width:15px;height:15px;">
                    <img src="<?php echo base_url('public/img/ajaxloader2.gif')?>" style="width:15px;height:15px;">
                    <img src="<?php echo base_url('public/img/ajaxloader2.gif')?>" style="width:15px;height:15px;"></h2>
                 </div>

                <div class="resposta_em" id="resposta_emp">
                   <div class="row margin-top-40">
                   <div class="col-md-12">
                        
                  </div>
                  </div> 
                </div>

              <form action="" method="post" accept-charset="utf-8" class="form_cadastrar_empresa">
                               
                 <div class="form-row">
                    <div class="form-group col-md-4">
                      <label><i class="far fa-id-badge" style="color:#01B1AF;"></i>&nbsp; CNPJ:</label>
                      <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ" value="<?php echo ($dados != NULL ? $dados->cnpj : set_value('cnpj'));?>"/>
                       <?php echo form_error('cnpj','<p class="field-error"','</p>'); ?>
                       <label class='text-danger cnpj' id="cnpj" style="color:red!important;"></label>
                    </div>
                     <div class="form-group col-md-6">
                       <label><i class="fas fa-building" style="color:#01B1AF;"></i>&nbsp;&nbsp;Razão Social:</label>
                       <input type="text" name="razao_social" id="razao_social" class="form-control" placeholder="Nome da Empresa" value="<?php echo ($dados != NULL ? $dados->razao_social : set_value('razao_social'));?>"/>
                       <?php echo form_error('razao_social','<p class="field-error">','</p>'); ?>
                      <label class="text-danger razao_social" id="razao_social" style="color:red!important;"></label>
                     </div>
                   </div>
       
                    <?php if($dados != NULL) {?>
                     <input type="hidden" name="id_empresa" id="id_empresa" class="form-control" value="<?php echo ($dados != NULL ? $dados->id_empresa : set_value('id_empresa'));?>"/> 
                    <div class="form-group">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary btn-atualizar_emp"><i class="fas fa-save"></i>&nbsp;&nbsp; Atualizar</button>
                    </div>
                    </div>
                 <?php } else { ?>
                 <div class="form-group">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-cadastrar_emp"><i class="fas fa-save"></i>&nbsp;&nbsp; Salvar</button>
                  </div>
                </div>
                 <?php } ?>

              </form>        
              
                  <div class="form-group">
                  <div class="col-sm-10">
                  </div>
                </div>
              </form>    

        </div>
      </div>    
    </section>

   
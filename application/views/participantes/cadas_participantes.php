<style>
   /*Cel Phone */
  label{font-weight:500!important;color:gray;}
  h1{font-weight:300!important;color:gray;font-size:26px;margin-top:25%;}
  h2{font-weight:300!important;color:#01B1AF;font-size:30px;font-family: "Times New Roman", Times, serif;}
  .form-group{padding-top:2%;}
  .text-danger{color:red!important;}

  .margin-bottom-20{margin-top:10%;margin-left:0px;}
  .margin-bottom-20 .btn-voltar{margin-right:0%;margin-top:-350px;}
  .margin-bottom-20 img{width:49px;height:30;}
  

/*SMALL DEVICES - SMARTPHONES */
@media screen and (min-width: 480px){
  h1{font-size:28px;margin-top:17%;}
  }

/*SMALL DEVICES - TABLETS */
@media screen and (min-width: 768px){
   h1{font-size:26px;margin-top:5%;}
  .margin-bottom-20{margin-top:5%;width:95%;margin-right:2.5%;margin-left:2.5%;}
  .margin-bottom-20 .btn-voltar{margin-top:20px;}
  .form_cadastrar_participante{width:100%;margin-right:1%;margin-left:0%;margin-top:0%;}
}

/*MEDIUM DEVICES - TABLETS  & DESKTOPS*/
@media screen and (min-width: 960px){ 
  .form_cadastrar_participante{width:95%;margin-right:2.5%;margin-left:2.5%;margin-top:4%;}
  .margin-bottom-20{margin-top:3%;width:95%;margin-right:2.5%;margin-left:2.5%;}
}

/*LARGUE DEVICES - WIDE SCREENS*/
@media screen and (min-width: 1280px){
  .margin-bottom-20{margin-top:2%;width:90%;margin-right:5%;margin-left:5%;}
  .form_cadastrar_participante{width:90%;margin-right:0%;margin-left:8%!important;margin-top:3%;}
}
</style>
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">         
          <div class="row margin-bottom-20">
                <div class="col-md-6 text-left">
                  <h1><img src="<?php echo base_url('public/img/user.png')?>" width=50 height=50>&nbsp;&nbsp; <?= $titulo ?></h1><br>
                 </div>
                 <div class="col-md-6 text-right">
                  <a href="<?php echo base_url('participantes') ?>" title="Voltar" class="btn btn-success btn-voltar"><i class="fas fa-arrow-left"></i> Voltar</a>
                 </div>  
            </div>     
              
              <div class="msg_wait d-none">
                   <h2 class="text-center">Realizando Cadastro, aguarde &nbsp;&nbsp;
                    <img src="<?php echo base_url('public/img/ajaxloader2.gif')?>" style="width:15px;height:15px;">
                    <img src="<?php echo base_url('public/img/ajaxloader2.gif')?>" style="width:15px;height:15px;">
                    <img src="<?php echo base_url('public/img/ajaxloader2.gif')?>" style="width:15px;height:15px;"></h2>
                 </div>

                <div class="resposta" id="resposta">
                   <div class="row margin-top-40">
                   <div class="col-md-12">
                        
                  </div>
                  </div> 
                </div>



              <form action="" method="post" accept-charset="utf-8" class="form_cadastrar_participante" style="margin-left:4%;">
                               
                 <div class="form-row">
                    <div class="form-group col-md-6">
                      <label><i class="fas fa-user" style="color:#01B1AF;"></i>&nbsp; Nome:</label>
                      <input type="text" name="nome" id="nome" class="form-control ultimo-valor" placeholder="Nome" value="<?php echo ($dados != NULL ? $dados->nome : set_value('nome'));?>"/>
                       <?php echo form_error('nome','<p class="field-error"','</p>'); ?>
                       <label class='text-danger nome' id="nome" style="color:red!important;"></label>
                    </div>
                     <div class="form-group col-md-3">
                       <label><i class="far fa-id-badge" style="color:#01B1AF;"></i>&nbsp;&nbsp;CPF:</label>
                       <input type="text" name="cpf" id="cpf" data-mask="000.000.000-00" class="form-control input_cpf ultimo-valor" placeholder="CPF" value="<?php echo ($dados != NULL ? $dados->cpf : set_value('cpf'));?>"/>
                       <?php echo form_error('cpf','<p class="field-error">','</p>'); ?>
                      <label class="text-danger cpf" id="cpf" data-mask="000.000.000-00" style="color:red!important;"></label>
                     </div>
                      <div class="form-group col-md-2">
                        <label><i class="far fa-calendar-alt" style="color:#01B1AF;"></i>&nbsp;&nbsp;Nascimento:</label>
                        <input type="text" name="data_nascimento" id="data_nascimento" id="data_nascimento" data-mask="00/00/0000" class="form-control input_data ultimo-valor" placeholder="00/00/0000" value="<?php echo ($dados != NULL ? formataDataView($dados->data_nascimento) : set_value('data_nascimento'));?>"/>
                        <?php echo form_error('data_nascimento','<p class="field-error">','</p>'); ?>
                      <label class="text-danger data_nascimento" id="data_nascimento" data-mask="00/00/0000" style="color:red!important;"></label>
                      </div>
                   </div>
                   <div class="form-row">
                     <div class="form-group col-md-6">
                       <label><i class="far fa-envelope" style="color:#01B1AF;"></i>&nbsp;&nbsp;E-mail:</label>
                       <input type="email" name="email" id="email" class="form-control ultimo-valor" placeholder="E-mail" value="<?php echo ($dados != NULL ? $dados->email : set_value('email'));?>"/>
                       <?php echo form_error('email','<p class="field-error">','</p>'); ?>
                       <label class="text-danger email" id="email" style="color:red!important;margin-top:-1px;"></label>
                     </div>  
                      <div class="form-group col-md-5">
                        <label class="col-sm-9 control-label"><i class="fas fa-building" style="color:#01B1AF;"></i>&nbsp;&nbsp;Empresa:</label>
                         <div class="col-sm-15">
                            <select class="form-control empresa ultimo-valor" name="empresa" id="empresa" placeholder="empresa" required>
                            <option value="0"></option> 
                            <?php foreach ($empresas as $e) { ?>                         
                              <?php if($dados) {?>
                                <option value="<?= $e->id_empresa ?>" <?= ($dados->empresa == $e->id_empresa ? 'selected=""' : '') ?>><?= $e->razao_social ?></option>
                              <?php } else {?>
                                <option value="<?= $e->id_empresa ?>"><?= $e->razao_social ?></option>
                                <?php }   ?>       
                              <?php }   ?>  
                            </select>
                        </div>
                        <?php echo form_error('empresa','<p class="field-error"','</p>'); ?>
                        <label class="text-danger empresas" id="empresas" style="color:red!important;"></label>
                      </div> 
                     </div>   
                <?php if($dados != NULL){ ?> 
                  <input type="hidden" name="id_cliente" id="id_cliente" class="form-control"  value="<?php echo ($dados != NULL ? $dados->id_cliente : set_value('id_cliente'));?>"/>    
                  <div class="form-group">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-atualizar_pc"><i class="fas fa-save"></i>&nbsp;&nbsp; Atualizar</button>
                  </div>
                </div>
                <?php }else{ ?>
                 <div class="form-group">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-cadastrar_pc"><i class="fas fa-save"></i>&nbsp;&nbsp; Salvar</button>
                  </div>
                </div>
              <?php } ?>
              </form>               

        </div>
      </div>    
    </section>

   
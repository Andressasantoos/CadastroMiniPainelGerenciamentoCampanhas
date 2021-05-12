<style>
/*Cel Phone */
  td {color:gray;}
  table tr:hover td{ background-color: rgb(230,230,250) ;}
  h1,h2{font-weight:300!important;color:gray;font-size:24px;}
  .margin-bottom-20{margin-top:10%;margin-left:4px;}
  .margin-bottom-20 .btn-cadastro{margin-right:10%;margin-top:-30px;}
  .margin-bottom-20 img{width:50px;height:35;}
  .div-tbl{margin-top:30%;}

/*SMALL DEVICES - SMARTPHONES */
@media screen and (min-width: 480px){
  h1,h2{font-size:28px;}
  .margin-bottom-20{margin-top:6%;margin-left:5%;}
  .margin-bottom-20 .btn-cadastro{margin-right:25%;margin-top:-40px;}
  .div-tbl{margin-top:15%;}
  }

/*SMALL DEVICES - TABLETS */
@media screen and (min-width: 768px){
  h1,h2{font-size:30px;}
  .margin-bottom-20{margin-top:5%;margin-left:0%;}
  .margin-bottom-20 .btn-cadastro{margin-right:0%;margin-top:2%;}
  .div-tbl{margin-top:0%;}
}

/*MEDIUM DEVICES - TABLETS  & DESKTOPS*/
@media screen and (min-width: 960px){ 
}

/*LARGUE DEVICES - WIDE SCREENS*/
@media screen and (min-width: 1280px){
  h1,h2{font-size:30px;}
  .margin-bottom-20{margin-top:3%;width:95%;margin-left:2.5%;margin-right:2.5%;}
  .margin-bottom-20 .btn-cadastro{margin-right:0%;margin-top:2%;}
  .div-tbl{margin-top:0%;width:95%;margin-left:2.5%;margin-right:2.5%;}
  .margin-bottom-20 img{width:50px;height:50;}
}
</style>
 <!-- Main content -->
 <section class="content">
    <div class="card">
      <div class="card-body">   

         <div class="row margin-bottom-20">

            <div class="col-md-6 text-left">
              <h1><img src="<?php echo base_url('public/img/friends.png')?>" width=50 height=50>&nbsp;&nbsp; Participantes Cadastrados</h1><br><br><br>
            </div>

            <div class="col-md-6 text-right">
              <a href="<?php echo base_url('participantes/participante') ?>" title="Cadastrar Novo Participante" class="btn btn-info btn-cadastro" style="background:#A9A9A9;border:#A9A9A9;"><i class="fas fa-user-plus"></i>&nbsp;&nbsp; Cadastrar Novo Participante</a>
            </div>  

         </div> 

          <?php       
                       errosValidacao();
                       getMsg('msgCadastro');
           ?>
         
         <div class="table-responsive-sm div-tbl">  
         <table class="table table-striped table_listar_data-table">
            <thead>
              <tr>
              <!-- cpf,nome,email,data_nascimento,empresa-->
               <td class="text-center"><i class="fas fa-user" style="color:#01B1AF;"></i>&nbsp;&nbsp;Participante</td>
               <td class="text-center"><i class="far fa-id-badge" style="color:#01B1AF;"></i>&nbsp;&nbsp;CPF</td>
               <td class="text-center"><i class="far fa-envelope" style="color:#01B1AF;"></i>&nbsp;&nbsp;E-mail</td>
               <td class="text-center"><i class="far fa-calendar-check" style="color:#01B1AF;"></i>&nbsp;&nbsp;Data Nascimento</td>
               <td class="text-center"><i class="fas fa-building" style="color:#01B1AF;"></i>&nbsp;&nbsp;Empresa</td>
               <td class="text-center"><i class="fas fa-pen" style="color:#01B1AF;"></i>&nbsp;&nbsp;Configurações</td>
              </tr>
            </thead>
            <tbody>
              <?php 
                 foreach ($participantes as $p) {  ?>                   
                   <tr>
                   <td><?= $p->nome ?></td>
                   <td class="text-center"><?= $p->cpf ?></td>
                   <td class="text-center"><?= $p->email ?></td>
                   <td class="text-center"><?=  formataDataView($p->data_nascimento) ?></td>
                   <td class="text-center">
                     <?php if ($p->razao_social != NULL){ 
                               echo  $p->razao_social; 
                          } else { ?>
                               Empresa Desvinculada da Campanha
                      <?php } ?>    
                    </td>
                  <td class="text-center"> 
                     <a href="<?= base_url('participantes/participante/'.$p->id_cliente)?>" title="Atualizar Participante" class="btn btn-info"><i class="fas fa-edit"></i></a>
                     <a href="<?= base_url('participantes/del_participante/'.$p->id_cliente)?>" title="Apagar Participante" class="btn btn-danger btn-apagar-registro"><i class="fas fa-trash-alt"></i></a>
                   </td>
                   </tr>
                   <?php
                 }
              ?>
            </tbody>
          </table>
         </div>
        </div>
      </div>
      <!-- /.card -->

    </section>

<style>  
/*Cel Phone */
  td {color:gray;}
  table tr:hover td{  background-color: rgb(224,255,255);  }
  
  h1,h2{font-weight:300!important;color:gray;font-size:30px;}
  .margin-bottom-20{margin-top: 3%;margin-left:4px;}

  label{font-weight:500!important;color:gray;}
  h1{font-weight:300!important;color:gray;font-size:26px;margin-top:25%;}
  h2{font-weight:300!important;color:#01B1AF;font-size:30px;font-family: "Times New Roman", Times, serif;}
  .text-danger{color:red!important;}

  .margin-bottom-20{margin-top:10%;margin-left:0px;}
  .margin-bottom-20 .btn-voltar{margin-right:0%;margin-top:-470px;}
  .margin-bottom-20 img{width:45px;height:40;}
  .div-tbl{margin-top:-15px;}

/*SMALL DEVICES - SMARTPHONES */
@media screen and (min-width: 480px){
  h1{font-size:28px;margin-top:17%;}
  }

/*SMALL DEVICES - TABLETS */
@media screen and (min-width: 768px){
   h1{font-size:25px;margin-top:5%;}
  .margin-bottom-20{margin-top:5%;width:100%;}
  .margin-bottom-20 .btn-voltar{margin-top:20px;}
  .div-tbl{margin-top:0px;}
}

/*MEDIUM DEVICES - TABLETS  & DESKTOPS*/
@media screen and (min-width: 960px){ 
  .margin-bottom-20{margin-top:3%;}
  .div-tbl{width:95%;margin-left:2.5%;margin-right:2.5%;}
}

/*LARGUE DEVICES - WIDE SCREENS*/
@media screen and (min-width: 1280px){
  .margin-bottom-20{margin-top:2%;width:95%;margin-left:2.5%;margin-right:2.5%;}
  .div-tbl{width:95%;margin-left:2.5%;margin-right:2.5%;}
}

</style>
 <!-- Main content -->
 <section class="content">
    <div class="card">
      <div class="card-body">

         <div class="row margin-bottom-20">

            <div class="col-md-6 text-left">
              <h1><img src="<?php echo base_url('public/img/office-building.png')?>" width=50 height=50>&nbsp;&nbsp; <?= $titulo ?></h1><br><br><br>
            </div>

            <div class="col-md-6 text-right">
            <a href="<?php echo base_url('empresas') ?>" title="Voltar" class="btn btn-success btn-voltar"><i class="fas fa-arrow-left"></i> Voltar</a>
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
               <td class="text-center"><i class="fas fa-user" style="color:#01B1AF;"></i>&nbsp;&nbsp;Participante</td>
               <td class="text-center"><i class="far fa-id-badge" style="color:#01B1AF;"></i>&nbsp;&nbsp;CPF</td>
               <td class="text-center"><i class="far fa-envelope" style="color:#01B1AF;"></i>&nbsp;&nbsp;E-mail</td>
               <td class="text-center"><i class="far fa-calendar-check" style="color:#01B1AF;"></i>&nbsp;&nbsp;Data Nascimento</td>
               <td class="text-center"><i class="fas fa-building" style="color:#01B1AF;"></i>&nbsp;&nbsp;Empresa</td>
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
                   <td class="text-center"><?= $p->razao_social ?></td>
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
         
                 <div class="form-group">
                  <div class="col-sm-10">
                  </div>
                </div>
    </section>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo base_url('public/imag/con1.ico')?>">
  <?php
    
    if (isset($titulo)) {
      echo '<title>'.$titulo.'</title>';
    }else{
       echo '<title>Home</title>';
    }

  ?>

 <!--  Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/bootstrap/css/bootstrap.min.css') ?>" >
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" <?php echo base_url('public/dist/fontawesome-free/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/Ionicons/css/ionicons.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/adminlte.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/skin-blue.min.css') ?>">

  <!-- Plugin Data Table -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/dist/data-tables/datatables.css') ?>">
   
   <!-- jquery upload -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/dist/jquery.uploadfile/css/uploadfile.css') ?>">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
 
 <style>
 .nav-item{padding-top:6%;}
 .nav-item p{color:#01B1AF}
 .nav-item i{color:#01B1AF}

 .nav-item p:hover{color:gray}
 .nav-item i:hover{color:gray}

 .nav-item .w3-teal{background:gray;}
 .w3-teal p{color:white;}
 .w3-teal i{color:white;}



  .nav-item {height:40px!important;}
  .nav-link{margin-top:-30px!important;} 

 </style>
</head>
<body class="body hold-transition sidebar-mini" id="body">
<!-- Site wrapper -->
<div class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-light"  style="background:black;">
    
  <?php if($titulo == 'Participantes' || $titulo == 'Cadastrar Novo Participante' || $titulo == 'Atualizar Participante') { ?>
    <ul class="navbar-nav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item cima d-none d-sm-inline-block">
        <a href="#" class="nav-link" style="color:#F0F8FF!important;"><i class="fas fa-bars" style="color:white;"></i></a>
      </li>
      <li class="nav-item cima d-none d-sm-inline-block">
        <a href="<?php echo base_url('participantes') ?>" class="nav-link" style="color:#F0F8FF!important;"><i class="fas fa-user-friends" style="color:white;"></i>&nbsp;&nbsp;Participantes Cadastrados</a>
      </li>
      <li class="nav-item cima d-none d-sm-inline-block">
        <a href="<?php echo base_url('participantes/participante') ?>" class="nav-link" style="color:#F0F8FF!important;"><i class="fas fa-user-plus" style="color:white;"></i>&nbsp;&nbsp;Cadastradar Participante</a>
      </li>
    </ul>
  <?php } else {?>
    <ul class="navbar-nav">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item cima d-none d-sm-inline-block">
        <a href="#" class="nav-link" style="color:#F0F8FF!important;"><i class="fas fa-bars" style="color:white;"></i></a>
      </li>
      <li class="nav-item cima d-none d-sm-inline-block">
        <a href="<?php echo base_url('empresas') ?>" class="nav-link" style="color:#F0F8FF!important;"><i class="fas fa-passport" style="color:white;"></i>&nbsp;&nbsp;Empresas Cadastradas</a>
      </li>
      <li class="nav-item cima d-none d-sm-inline-block">
        <a href="<?php echo base_url('empresas/empresa') ?>" class="nav-link" style="color:#F0F8FF!important;"><i class="fas fa-building" style="color:white;"></i>&nbsp;&nbsp;Cadastrar Empresa</a>
      </li>
    </ul>
   <?php } ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a href="<?php echo base_url('inicio') ?>" class="navbar-nav" data-toggle="pushmenu" role="button" style="color:white;padding-top:1px;">
            Sair&nbsp;&nbsp;&nbsp;<i class="fas fa-sign-out-alt" style="color:white;margin-top:9%;margin-right:13px;"></i>
          </a> 
      </li>        
    </ul>
  </nav>
  <!-- /.navbar -->

   
        <?php 
          
           if (isset($view)) {
             $this->load->view($view);
           }

        ?>
    
  
  </div>
  <!-- /.content-wrapper -->
   
 
  <footer class="container footer" style="height:40px; padding-top:3px;color:gray;">
    <div class="float-right d-none d-sm-block">
      Andressa Santos
    </div>
    Copyright &nbsp;&nbsp; <a href="#" style="font-family: 'Kelly Slab';">Gerenciamento de Campanhas</a> &copy; 2021 . 
  </footer>


</div>
<!-- ./wrapper -->


<!-- MAIN -->
<script  type="text/javascript" src="<?php echo base_url('public/js/main.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
 <!-- jQuery --> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url('public/js/jquery.min.js') ?>"></script>
<!-- jQuery -->
<script src="<?php echo base_url('public/js/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('public/dist/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('public/dist/jquery/jquery.slimscroll.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/js/adminlte.min.js') ?>"></script>
 <!-- Jquery Upload -->
 <script src="<?php echo base_url('public/dist/jquery.uploadfile/js/jquery.uploadfile.min.js') ?>"></script>
  
<!-- FastClick -->
<script src="<?php echo base_url('public/dist/fastclick/fastclick.js') ?>"></script> 
<!-- Jquery Upload -->
 <script src="<?php echo base_url('public/dist/jquery.uploadfile/js/jquery.uploadfile.min.js') ?>"></script>
<!--Plugin Data-table -->
<script type="text/javascript" charset="utf8" src="<?php echo base_url('public/dist/data-tables/datatables.js') ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/js/demo.js') ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('public/js/adminlte.min.js') ?>"></script>
  
<!-- MAIN -->
<script src="<?php echo base_url('public/js/mains.js') ?>"></script>

<!-- Cadastrar Participante -->
<script src="<?php echo base_url('public/js/cadastrar_participante.js') ?>"></script>

<!-- Cadastrar Empresa -->
<script src="<?php echo base_url('public/js/cadastrar_empresa.js') ?>"></script>

<!-- Mascaras dos campos inputs-->
<script src="<?php echo base_url('public/dist/jquery_mask/js/jquery.mask.js') ?>"></script>
<script src="<?php echo base_url('public/dist/jquery_mask/js/jquery.mask.min.js') ?>"></script>

<!-- Jquery Upload -->
<script src="<?php echo base_url('public/dist/jquery.uploadfile/js/jquery.uploadfile.min.js') ?>"></script>
 

</body>
</html>
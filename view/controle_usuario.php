<!DOCTYPE html>
<html>
<head>
  <?php require_once '../includes/head.php'; ?>
   <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../public/plugins/iCheck/all.css">
  <link rel="stylesheet" href="../public/assets/lib/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css">
 
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <!-- menu lateral-->
  <?php 
    @$active_usuarios = 'active ';
    @$active_controle_usuario = 'active ';
    @$rotina = 'permissao';
    @$tipo = 'D';
    require_once '../includes/header.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard 
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard

        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

          <div class="col-xs-12">


          <div class="panel panel-primary">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Listagem de Controle de Usuarios <a href="#" data-toggle="modal" data-target="<?php echo $permSalvar == 'certo' ? "#addControleUsuario" : "#negado2";?>" class="btn btn-success  pull-right novo " <?php echo $permSalvar == 'certo' ? "" : "disabled";?>><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nova Permissâo</a></h3>
            </div>
            <div class="panel-body">
            
              <table id="tabela_controle_usuario" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                    <th>Rotina</th>
                    <th>Visualizar</th>
                    <th>Salvar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    <th>Usuário</th>
                    <th>Opção</th>
                  </tr>
                </thead>
                <tfoot>
                   <tr>
                    <th>Rotina</th>
                    <th>Visualizar</th>
                    <th>Salvar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    <th>Usuário</th>
                    <th>Opção</th>
                  </tr>
                </tfoot>
                <tbody>
                 
                </tbody>
              </table>  
            </div>
          </div>




          </div>
        </div>

     
    
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->
 <?php require_once '../includes/inserir_controle_usuario.php'; ?>
 <?php require_once '../includes/atualizar_controle_usuario.php'; ?>
 <?php require_once '../includes/footer.php'; ?>
 <script src="../public/assets/js/listagem_controle_usuario.js" type="text/javascript"></script>
  <script src="../public/assets/js/editar_controle_usuario.js" type="text/javascript"></script>
 <!-- iCheck 1.0.1 -->
<script src="../public/plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {
 
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

 
  })
</script>




</body>
</html>

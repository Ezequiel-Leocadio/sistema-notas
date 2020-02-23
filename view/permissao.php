<!DOCTYPE html>
<html>
<head>
  <?php require_once '../includes/head.php'; ?>
 
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <!-- menu lateral-->
  <?php 
    @$active_usuarios = 'active ';
    @$active_permissao = 'active ';
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
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-xs-12">


          <div class="panel panel-primary">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Listagem de Usuarios <a href="#" data-toggle="modal" data-target="<?php echo $permSalvar == 'certo' ? "#addUsuario" : "#negado2";?>" class="btn btn-success  pull-right novo"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Novo Usuario</a></h3>
            </div>
            <div class="panel-body">
            
              <table id="tabela_usuario" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Tipo</th>
                    <th>Filial</th>
                    <th>Setor</th>
                    <th>Opção</th>
                  </tr>
                </thead>
                <tfoot>
                   <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Tipo</th>
                    <th>Filial</th>
                    <th>Setor</th>
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
 <?php require_once '../includes/inserir_usuario.php'; ?>
 <?php require_once '../includes/footer.php'; ?>
 <script src="../public/assets/js/listagem_usuario.js" type="text/javascript"></script>

</body>
</html>

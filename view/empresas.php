<!DOCTYPE html>
<html>
<head>
  <?php require_once '../includes/head.php'; ?>
 
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <!-- menu lateral-->
  <?php 
    @$active_empresas = 'active ';
    @$rotina = 'empresa';
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
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-xs-12">


          <div class="panel panel-primary">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Listagem de Empresas <a href="#" data-toggle="modal"  data-target="<?php echo $permSalvar == 'certo' ? "#addEmpresa" : "#negado2";?>" <?php echo $permSalvar == 'certo' ? "" : "disabled";?> class="btn btn-success  pull-right novo"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nova Empresa</a></h3>
            </div>
            <div class="panel-body">
            
              <table id="tabela_empresa" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nome</th>
                   
                    <th>Opção</th>
                  </tr>
                </thead>
                <tfoot>
                   <tr>
                     <th>Código</th>
                    <th>Nome</th>
                   
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
 <?php require_once '../includes/inserir_empresa.php'; ?>
  <?php require_once '../includes/atualizar_empresa.php'; ?>
 <?php require_once '../includes/footer.php'; ?>
 <script src="../public/assets/js/listagem_empresa.js" type="text/javascript"></script>
  <script src="../public/assets/js/editar_empresa.js" type="text/javascript"></script>


</body>
</html>

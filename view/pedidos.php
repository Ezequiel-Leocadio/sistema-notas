<!DOCTYPE html>
<html>
<head>
  <?php require_once '../includes/head.php'; ?>

 
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <!-- menu lateral-->
  <?php 
    @$active_pedido= 'active';
    @$statusPedido = $_REQUEST["statusPedido"];

    if ($statusPedido == '1') {
      @$active_pedidosP= 'active';
    }elseif ($statusPedido == '2') {
      @$active_pedidosA= 'active';
    }elseif ($statusPedido == '3') {
      @$active_pedidosF= 'active';
    }else{
      @$active_pedidos= 'active';
    }
   
    @$rotina = 'pedidos';
    @$tipo = 'D';
   
    @$statusPedido = $_REQUEST["statusPedido"];
    require_once '../includes/header.php'; 
  ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pedidos
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pedidos</a></li>
        <li class="active">Visualizar Pedidos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-md-12">

          <div class="panel panel-primary">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Listagem de Pedidos
                
                 <a href="#" data-toggle="modal" data-target="<?php echo $permSalvar == 'certo' ? "#addPedido" : "#negado2";?>" class="btn btn-success pull-right novo" <?php echo $permSalvar == 'certo' ? "" : "disabled";?>><i class="fa fa-user-plus"   aria-hidden="true"></i>&nbsp;Novo Pedido</a>


              </h3>
            </div>
            <div class="panel-body">
           
               <!-- Basic Examples -->
                  <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="card">  
                              <div class="body">
                                  <div class="table-responsive">
                                      <table  id="tabela_pedido" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                          <thead>
                                            <input type="hidden" id="statusPedido" value="<?php echo $statusPedido;?>">
                                              <tr>
                                                <th>Protocolo</th>
                                                <th>Data</th>
                                                <th>Solicitante</th>
                                                <th>Loja</th>
                                                <th>Setor</th>
                                                <th>Solicitação</th>
                                                <th>Status</th>
                                                <th>Opção</th>
                                              </tr>

                                              <tr>
                                                <td id="td-1"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                              </tr>
                                          </thead>
                                          <tfoot>
                                              <tr>
                                                 <th>Protocolo</th>
                                                  <th>Data</th>
                                                  <th>Solicitante</th>
                                                  <th>Loja</th>
                                                  <th>Setor</th>
                                                  <th>Solicitação</th>
                                                  <th>Status</th>
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
                  </div>
                  <!-- #END# Basic Examples -->
      
        
          

          </div>
        </div>

     
    
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->
  <?php require_once '../includes/inserir_pedido.php'; ?>

  <?php require_once '../includes/atualizar_pedido2.php'; ?>
   <?php require_once '../includes/visualizar_pedido.php'; ?>
  <?php require_once '../includes/footer.php'; ?>
 <script src="../public/assets/js/listagem_pedidos.js" type="text/javascript"></script>

 <script src="../public/assets/js/editar_pedido.js" type="text/javascript"></script>
 <script src="../public/assets/js/excluir_pedido.js" type="text/javascript"></script>
  <script src="../public/assets/js/visualizar_pedido.js" type="text/javascript"></script>

 <!-- <script src="../public/assets/js/calc_nota.js" type="text/javascript"></script> -->
</body>
</html>

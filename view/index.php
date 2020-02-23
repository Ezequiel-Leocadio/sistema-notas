<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php require_once '../includes/head.php'; ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- menu lateral-->
  <?php 
  $active_principal = 'active';
  @$rotina = 'home';
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
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="notas.php">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Notas</span>
                <?php 
                  $nota = new acme\models\NotasModel;
                  $num_linhas = $nota->numeros_linhas('select * from notas');

                                                  
                ?>
              <span class="info-box-number"><?php echo $num_linhas;?></span>
            </div>




            <!-- /.info-box-content -->
          </div>
          </a>

          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="notas_cpd.php">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Notas CPD</span>
                <?php 
                  $nota = new acme\models\NotasModel;
                  $num_linhas = $nota->numeros_linhas('select * from notas_cpd');

                                                  
                ?>
              <span class="info-box-number"><?php echo $num_linhas;?></span>
            </div>

            


            <!-- /.info-box-content -->
          </div>
          </a>

          <!-- /.info-box -->
        </div>
        <!-- /.col -->

         <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuários</span>
                <?php 
                  $user = new acme\models\UserModel;
                  $num_linhas_user = $user->numeros_linhas('select * from usuario');

                ?>
              <span class="info-box-number"><?php echo $num_linhas_user;  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


         <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="fornecedor.php">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Fornecedores</span>
                <?php 
                  $fornecedor = new acme\models\FornecedorModel;
                  $num_linhas_forn = $fornecedor->numeros_linhas('select * from fornecedor');
                ?>
              <span class="info-box-number"><?php echo $num_linhas_forn;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



         <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="pedidos.php">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pedidos</span>
                 <?php 
                    $pedido = new acme\models\PedidosModel;
                    $num_linhas_ped = $pedido->numeros_linhas('select * from pedidos');
                  ?>
              <span class="info-box-number"><?php echo $num_linhas_ped;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="pedidos.php?statusPedido=3">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pedidos Concluidos</span>
                 <?php 
                    $pedido = new acme\models\PedidosModel;
                    $num_linhas_ped = $pedido->numeros_linhas('select * from pedidos where status=3');

                  ?>
              <span class="info-box-number"><?php echo $num_linhas_ped;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="pedidos.php?statusPedido=2">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pedidos Em Andamento</span>
               <?php 
                  $pedido = new acme\models\PedidosModel;
                  $num_linhas_ped = $pedido->numeros_linhas('select * from pedidos where status=2');

                  ?>
              <span class="info-box-number"><?php echo $num_linhas_ped;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="pedidos.php?statusPedido=1">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pedidos Pendentes</span>
                <?php 
                  $pedido = new acme\models\PedidosModel;
                  $num_linhas_ped = $pedido->numeros_linhas('select * from pedidos where status=1');
                ?>
              <span class="info-box-number"><?php echo $num_linhas_ped;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->



            <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="notas_cpd.php">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Notas Enviadas</span>
                 <?php 
                    $pedido = new acme\models\PedidosModel;
                    $num_linhas_ped = $pedido->numeros_linhas('select * from notas_cpd where status=2');

                  ?>
              <span class="info-box-number"><?php echo $num_linhas_ped;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="notas_cpd.php">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Notas Finalizadas</span>
               <?php 
                  $pedido = new acme\models\PedidosModel;
                  $num_linhas_ped = $pedido->numeros_linhas('select * from notas_cpd where status=3');

                  ?>
              <span class="info-box-number"><?php echo $num_linhas_ped;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="notas_cpd.php">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Notas Pendentes</span>
                <?php 
                  $pedido = new acme\models\PedidosModel;
                  $num_linhas_ped = $pedido->numeros_linhas('select * from notas_cpd where status=1');
                ?>
              <span class="info-box-number"><?php echo $num_linhas_ped;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


      </div>
      <!-- /.row -->

     
    
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->

 <?php require_once '../includes/footer.php'; ?>
</body>
</html>

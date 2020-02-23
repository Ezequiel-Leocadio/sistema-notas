<?php 
  require'../config/config.php'; 

  include '../includes/restricao.php';
  
  $usuario = $_SESSION['usuario'];
  $tipo = $_SESSION['tipo'];
  $usuario_filial = $_SESSION['filial'];
  $usuario_setor = $_SESSION['setor'];


  $usuario = $_SESSION['usuario'];

  if(($usuario == 'Ezequiel') || ($usuario == 'Simone')){
      $disabled_notas = '';
      $addNota = 'addNota';
    }else{
      $disabled_notas = 'disabled';
      $addNota ='';
    }
?>
 <header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">NF/OS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Controle - </b>NF/OS</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
        
          
               
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../public/dist/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo "$usuario";?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->

               
              </li>
              <!-- Menu Body -->
               
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat"  data-toggle="modal" data-target="#aditUser" data-nome="<?php  echo $_SESSION['nome'];?>" data-id="<?php echo $_SESSION['id']; ?>"  data-login="<?php echo $_SESSION['usuario']; ?>" data-toggle="tooltip" data-placement="top">Editar Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../includes/logout.php" class="btn btn-default btn-flat">Sair do Sistema</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle=""><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <!-- <li class="active treeview menu-open"> -->
          <!-- <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> -->
          <!-- <ul class="treeview-menu"> -->
           
            <!-- <li class="active"><a href="index.html"><i class="fa fa-home"></i> Principal</a></li> -->
             <li class="<?php echo @$active_principal; ?>">
             <a href="index.php"><i class="fa fa-home"></i> <span>Principal</span></a>
             </li>
          <!-- </ul> -->
        <!-- </li> -->

       

        

        <li id="editar_user_li" class="<?php echo @$active_usuarios; echo $tipo;?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo @$active_usuario; ?>"><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuários</a></li>
            <li class="<?php echo @$active_controle_usuario; ?>"><a href="controle_usuario.php"><i class="fa fa-circle-o"></i> Permissões</a></li>
           
          </ul>
        </li>


        <li class=" <?php echo @$active_notas; ?> treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Notas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <!-- <li class=" <?php echo @$active_notasG; ?>"><a href="notas.php"><i class="fa fa-circle-o"></i> Notas Gerais</a></li> -->

            <li class=" <?php echo @$active_notasF; ?>"><a href="notas.php"><i class="fa fa-circle-o"></i> Notas Financeiro</a></li>

             <li class=" <?php echo @$active_notasC; ?>"><a href="notas_cpd.php"><i class="fa fa-circle-o"></i> Notas CPD</a></li>

            <li class=" <?php echo @$active_notasH; ?>"><a href="notas_horth.php"><i class="fa fa-circle-o"></i> Notas Horth Fruth</a></li>


             <li class=" <?php echo @$active_notasU; ?>"><a href="notas_uso_consumo.php"><i class="fa fa-circle-o"></i> Notas Uso e Consumo</a></li>

           

          </ul>
        </li>

         <li class=" <?php echo @$active_contas; ?> treeview">
          <a href="#">
            <i class="fa fa-copy"></i>
            <span>Contas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

             <li class=" <?php echo @$active_contasP; ?>"><a href="contas.php"><i class="fa fa-circle-o"></i> Contas a Pagar</a></li>

          </ul>
        </li>

        <!-- <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Fornecedor</a></li> -->
        <li class="<?php echo @$active_fornecedor; ?>">
          <a href="fornecedor.php"><i class="fa fa-truck"></i> <span>Fornecedor</span></a>
        </li>

         <!-- <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Fornecedor</a></li> -->
        <li class="<?php echo @$active_empresas; ?>">
          <a href="empresas.php"><i class="fa fa-building"></i> <span>Empresas</span></a>
        </li>

         <!-- <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Fornecedor</a></li> -->
        <li class="<?php echo @$active_lojas; ?>">
          <a href="lojas.php"><i class="fa fa-clone"></i> <span>Lojas</span></a>
        </li>

        <li class="<?php echo @$active_pedido; ?> treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo @$active_pedidos; ?>"><a href="pedidos.php"><i class="fa fa-circle-o"></i> Visualizar Pedidos</a></li>

            <li class="<?php echo @$active_pedidosP; ?>">
              <a href="pedidos.php?statusPedido=1">
              <i class="fa fa-circle-o"></i> Pedidos Pendentes
              </a>
            </li>

            <li class="<?php echo @$active_pedidosA; ?>"><a href="pedidos.php?statusPedido=2"><i class="fa fa-circle-o"></i> Pedidos Em Andamento</a></li>

             <li class="<?php echo @$active_pedidosF; ?>"><a href="pedidos.php?statusPedido=3"><i class="fa fa-circle-o"></i> Pedidos Finalizados</a></li>
          </ul>
        </li>


       
       
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
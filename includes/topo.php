<?php
	require'../config/config.php';

	@$info =$_REQUEST['info'];
	@$page =$_REQUEST['page'];

	include '../includes/restricao.php';
	
	$usuario = $_SESSION['usuario'];
	$tipo = $_SESSION['tipo'];

	// $usuario = $_SESSION['usuario'];

	if(($usuario == 'Ezequiel') || ($usuario == 'Simone')){
			$disabled_notas = '';
			$addNota = 'addNota';
		}else{
			$disabled_notas = 'disabled';
			$addNota ='';
		}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Controle NFS / O.S</title>
	<meta name="viewport" content="width=device-width">
	<link rel="icon" type="image/png" href="../public/assets/img/icone.png" />
	<link href="../public/assets/lib/bootstrap_e_data-table/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/lib/bootstrap_e_data-table/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/assets/lib/font-awesome/css/font-awesome.css">
	<link href="../public/assets/css/nav.css " rel="stylesheet">
	<link href="../public/assets/css/estilo.css " rel="stylesheet">

    <!-- <link rel="stylesheet" href="estilos.css"> -->
	<!-- <script src="jquery/jquery-3.1.1.min.js"></script> -->
	<!-- <script src="javaScript.js"></script> -->
</head>
<body>
	<div id="header">
		<div class="logo"><a id="logo" href="#">Controle <span>NFS / O.S.</span></a></div>
		<div class="user"><a id="usuario" href="#"><?php echo "$usuario";?></a>
			<div id="sobre_usuario">
				<a href="../includes/logout.php" id="sair" class="btn btn-primary">Sair</a>
				<a href="#" id="editar_user" data-toggle="modal" data-target="#aditUser" data-nome="<?php  echo $_SESSION['nome'];?>" data-id="<?php echo $_SESSION['id']; ?>"  data-login="<?php echo $_SESSION['usuario']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top">Editar</a>
			</div>
		</div>
		

	</div>

	<div id="container">
		<div class="sidebar">
			<div class="menu">
		<ul>
			<li><a href="index.php"><span class="fa fa-home"></span> Principal</a></li>
			<li id="editar_user_li" class=" <?php echo $tipo;?>"><a href="usuario.php"><span class="fa fa-users"></span>Usuários</a>
				<ul class="topoz">
					<a data-toggle="modal" data-target="#addUsuario"><li><span class="fa fa-plus"></span>Adicionar</li></a>
					<a href="usuario.php"><li><span class="fa fa-edit"></span>Exibir Usuários</li></a>
				</ul>
			</li>
			<li><a href="notas.php"><span class="fa fa-list-alt"></span>Notas</a>
				<ul>
					<a data-toggle="modal" <?php echo $disabled_notas;?> data-target="#<?php echo $addNota;?>"><li><span class="fa fa-plus"></span>Adicionar</li></a>
					<a href="notas.php"><li><span class="fa fa-edit"></span>Exibir Notas</li></a>
				</ul>
			</li>
			<li><a href="#"><span class="fa fa-money"></span>Boletos</a>
				<!-- <ul>
					<a data-toggle="modal" data-target="#addBoleto"><li><span class="fa fa-plus"></span>Adicionar</li></a>
					<a href="#"><li><span class="fa fa-edit"></span>Exibir Boletos</li></a>
				</ul> -->
			</li>
			<li ><a href="fornecedor.php"><span class="fa fa-truck"></span>Fornecedor</a></li>
			<li id="rodape"><a href="pedidos.php"><span class="fa fa-bars"></span>Pedidos</a>
				<ul class="topoz">
					<a href="pedidos.php"><li><span class=""></span>Pedidos</li></a>
					<a href="pedidos.php?statusPedido=1"><li><span class=""></span>Pedidos Pendentes</li></a>
					<a href="pedidos.php?statusPedido=2"><li><span class=""></span>Pedidos Em Andamento</li></a>
					<a href="pedidos.php?statusPedido=3"><li><span class=""></span>Pedidos Finalizados</li></a>
				</ul>
			</li>
			
		</ul>
	</div>
</div>
</div>
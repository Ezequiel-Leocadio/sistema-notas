<?php 
	session_start();

	if(isset($_SESSION['logado'])){
		$_SESSION['logado'] = false;

		$usuario = $_SESSION['usuario'];
		$id = $_SESSION['id'];

		$user = new acme\models\UserModel;
  		$permissao = $user->permissaoUser($rotina,$id,$tipo,'visualizar');
  		$permData = $user->permissaoUser('contas',$id,'DT','visualizar');

  		$permEditar = $user->permissaoUser($rotina,$id,$tipo,'editar');
  		$permSalvar = $user->permissaoUser($rotina,$id,$tipo,'salvar');
  		$permExcluir = $user->permissaoUser($rotina,$id,$tipo,'excluir');

  		if ($permEditar != 'certo') {
  			$permocultar = 	'ocultarPerm';
  			$permDisabled = 'disabled';
  		}

  		if ($permissao != 'certo') {
  			header("location:index.php?info=negado");

  		}


	}else{
		header("location:../index.php?info=negado");
	}
	
 ?>

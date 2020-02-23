<?php
	require'../config/config.php';

	$login = htmlspecialchars(strip_tags($_REQUEST['txtLogin']));
	$senha = htmlspecialchars(strip_tags($_REQUEST['txtSenha']));


	$user = new acme\models\UserModel;
	$users = $user->findBy('login',"'$login'");

		$nome = $users->nome;
		$login = $users->login;
		$tipo = $users->tipo;
		$id = $users->id;
	
	$tipo="";
	$id="";

	if($users ==true){
		// for($i=0;$i<count($consulta);$i++){
			if(   crypt($senha,$users->senha)  == $users->senha){
				
				$horarioAtual = Time();
				session_start();
				$_SESSION['nome']=$users->nome;
				$_SESSION['usuario']=$users->nome;
				$_SESSION['login']=$users->login;
				$_SESSION['tipo']=$users->tipo;
				$_SESSION['id'] = $users->id;
				$_SESSION['setor'] = $users->setor;
				$_SESSION['filial'] = $users->filial;
				$_SESSION['logado'] = true;

				$_SESSION['horarioSalvo'] = $horarioAtual;

				header("location:../view/index.php");

			}else{
				header("location:../index.php?info=erro");
			}
		// }
	}else{
		header("location:../index.php?info=erro");
	}
?>
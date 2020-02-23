<?php require'../config/config.php'; 
	$action = filter_input(INPUT_POST, 'action');

	function encripta($senha){
		// VEJA QUE PRIMEIRO EU VOU GERAR UM SALT JÁ ENCRIPTADO EM MD5
		$salt = md5(strrev(time().session_id()));
		 
		//PRIMEIRA ENCRIPTAÇÃO ENCRIPTANDO COM crypt
		$codifica = crypt($senha,$salt);
		  
		//AGORA RETORNO O VALOR FINAL ENCRIPTADO
		return $codifica;
		 
	}

	
	
	if($action == "cadastrar"){
		cadastrar();
	}elseif ($action == "atualizar") {
		atualizar();
	}elseif ($action == "deletar") {
		deletar();
	}



	function cadastrar(){
		$senha = filter_input(INPUT_POST, 'txtSenha');
    	$senhaCript =  encripta($senha);
	
		$user = new acme\models\UserModel;
		$cadastrado = $user->create([
			'nome' => filter_input(INPUT_POST, 'txtNome'),
			'login'=> filter_input(INPUT_POST, 'txtLogin'),
			'tipo'=> filter_input(INPUT_POST, 'txtTipo'),
			'filial'=> filter_input(INPUT_POST, 'txtFilial'),
			'setor'=> filter_input(INPUT_POST, 'txtSetor'),
			'senha'=> $senhaCript
			]);
		echo $cadastrado;

		$login = filter_input(INPUT_POST, 'txtLogin');

		$idUser = $user->findBy('login',"'$login'");

		$controluser = new acme\models\ControlUserModel;
		$cadastrado2 = $controluser->create([
			'rotina' => 'home',
			'visualizar'=> '1',
			'usuario'=> $idUser->id,
		]);
		



		header("location:../view/usuario.php?info=$cadastrado");
	}


	function atualizar(){
		$senha = filter_input(INPUT_POST, 'senha');
	
    	$senhaCript =  encripta($senha);
    	
    	$user = new acme\models\UserModel;
		$atualizado = $user->update(filter_input(INPUT_POST, 'codigo'),[
			'nome' => filter_input(INPUT_POST, 'nome'),
			'senha'=> $senhaCript
			]);

		echo $atualizado;

		// $login = filter_input(INPUT_POST, 'login');
		// $idUser = $user->findBy('login',"'$login'");

		// $controluser = new acme\models\ControlUserModel;
		// $cadastrado2 = $controluser->create([
		// 	'rotina' => 'home',
		// 	'visualizar'=> '1',
		// 	'usuario'=> $idUser->id,
		// ]);
		

		
		header("location:../view/usuario.php?info=$atualizado");
	}


	function deletar(){
		$deletado = $user->delete('id',filter_input(INPUT_POST, 'codigo'));

		echo $deletado;
		header("location:../view/usuario.php?info=$deletado&page=usuario");
	}




	// if($action == "cadastrar"){
	// 	$senha = filter_input(INPUT_POST, 'txtSenha');
 //    	$senhaCript =  encripta($senha);
	
	
	// 	$cadastrado = $user->create([
	// 		'nome' => filter_input(INPUT_POST, 'txtNome'),
	// 		'login'=> filter_input(INPUT_POST, 'txtLogin'),
	// 		'tipo'=> filter_input(INPUT_POST, 'txtTipo'),
	// 		'senha'=> $senhaCript
	// 		]);
	// 	$retorno = $cadastrado;

	// }elseif($action == "atualizar"){
	// 	$senha = filter_input(INPUT_POST, 'senha');
	
 //    	$senhaCript =  encripta($senha);
    	
	// 	$atualizado = $user->update(filter_input(INPUT_POST, 'codigo'),[
	// 		'nome' => filter_input(INPUT_POST, 'nome'),
	// 		'senha'=> $senhaCript
	// 		]);

	// 	$retorno = $atualizado;

	// }elseif($action == "deletar"){
	
	// 	$deletado = $user->delete('id',filter_input(INPUT_POST, 'codigo'));

	// 	$retorno = $deletado;

		

	// 	//header("location:../view/usuarios.php");

	// }else{
	// 	$retorno = 0;
	// }






 ?>
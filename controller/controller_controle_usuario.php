<?php require'../config/config.php'; 
	$action = filter_input(INPUT_POST, 'action');

	function swap_date($date_str){
		date_default_timezone_set('America/cuiaba');
        if ($date = \DateTime::createFromFormat('Y-m-d', $date_str)) {
        		return $date->format('d/m/Y');
        } elseif ($date = \DateTime::createFromFormat('d/m/Y', $date_str)) {
           		return $date->format('Y-m-d');
        }else{
            	return "Invalido";
        }
        	throw new \InvalidArgumentException('Invalid input date format.');
    }
	

	

	
	
	if($action == "cadastrar"){
		cadastrar();
	}elseif ($action == "atualizar") {
		atualizar();
	}elseif ($action == "deletar") {
		deletar();
	}



	function cadastrar(){
		$checkSalvar = filter_input(INPUT_POST, 'checkSalvar');
		$checkVisualizar = filter_input(INPUT_POST, 'checkVisualizar');
		$checkEditar = filter_input(INPUT_POST, 'checkEditar');
		$checkExcluir = filter_input(INPUT_POST, 'checkExcluir');

		if ($checkSalvar == 'on') {
			$checkSalvar ='1';
		}else{
			$checkSalvar ='0';
		}

		if ($checkVisualizar == 'on') {
			$checkVisualizar ='1';
		}else{
			$checkVisualizar ='0';
		}

		if ($checkEditar == 'on') {
			$checkEditar ='1';
		}else{
			$checkEditar ='0';
		}

		if ($checkExcluir == 'on') {
			$checkExcluir ='1';
		}else{
			$checkExcluir ='0';
		}


		// echo filter_input(INPUT_POST, 'txtPermiUsuario');
		// echo filter_input(INPUT_POST, 'txtPermiRotina');
		date_default_timezone_set('America/cuiaba');
		$dataPerm = date('Y-m-d');
		
	
		$controluser = new acme\models\ControlUserModel;
		$cadastrado = $controluser->create([
			'rotina' => filter_input(INPUT_POST, 'txtPermiRotina'),
			'salvar'=> $checkSalvar,
			'visualizar'=> $checkVisualizar,
			'editar'=> $checkEditar,
			'excluir'=> $checkExcluir,
			'usuario'=> filter_input(INPUT_POST, 'txtPermiUsuario'),
			'data'=> $dataPerm
			]);
		echo $cadastrado;
		header("location:../view/controle_usuario.php?info=$cadastrado");
	}


	function atualizar(){
		$checkSalvar = filter_input(INPUT_POST, 'checkEditSalvar');
		$checkVisualizar = filter_input(INPUT_POST, 'checkEditVisualizar');
		$checkEditar = filter_input(INPUT_POST, 'checkEditEditar');
		$checkExcluir = filter_input(INPUT_POST, 'checkEditExcluir');

		if ($checkSalvar == 'on') {
			$checkSalvar ='1';
		}else{
			$checkSalvar ='0';
		}

		if ($checkVisualizar == 'on') {
			$checkVisualizar ='1';
		}else{
			$checkVisualizar ='0';
		}

		if ($checkEditar == 'on') {
			$checkEditar ='1';
		}else{
			$checkEditar ='0';
		}

		if ($checkExcluir == 'on') {
			$checkExcluir ='1';
		}else{
			$checkExcluir ='0';
		}
    	
    	
		$controluser = new acme\models\ControlUserModel;
		$atualizado = $controluser->update(filter_input(INPUT_POST, 'txtPermId'),[
			'salvar'=> $checkSalvar,
			'visualizar'=> $checkVisualizar,
			'editar'=> $checkEditar,
			'excluir'=> $checkExcluir,
			'data'=> filter_input(INPUT_POST, 'txtPermData')
			]);

		echo $atualizado;
		header("location:../view/controle_usuario.php?info=$atualizado");
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
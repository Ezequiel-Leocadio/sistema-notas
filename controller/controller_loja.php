<?php require'../config/config.php'; 
	$action = filter_input(INPUT_POST, 'actionLoja');

	if($action == "cadastrar"){
		cadastrar();

	}elseif ($action == "atualizar") {
		atualizar();
		
	}elseif ($action == "deletar") {
		deletar();
	}

	function cadastrar(){		
		$loja = new acme\models\LojaModel;
		$cadastrado = $loja->create([
			'nome' => filter_input(INPUT_POST, 'lojaNome'),
			'codigo'=> filter_input(INPUT_POST, 'lojaCodigo'),
			
			]);
		echo $cadastrado;
		header("location:../view/lojas.php?info=$cadastrado");
	}

	function atualizar(){
    	
    	$loja = new acme\models\LojaModel;
		$atualizado = $loja->update(filter_input(INPUT_POST, 'lojaId'),[
			'nome' => filter_input(INPUT_POST, 'lojaEditNome'),
			'codigo'=> filter_input(INPUT_POST, 'lojaEditCodigo'),
			]);

		echo $atualizado;
		header("location:../view/lojas.php?info=$atualizado");
	}

	function deletar(){
		$loja = new acme\models\LojaModel;
		$deletado = $loja->delete('id',filter_input(INPUT_POST, 'lojaId'));

		echo $deletado;
		header("location:../view/lojas.php?info=$deletado");
	}


 ?>
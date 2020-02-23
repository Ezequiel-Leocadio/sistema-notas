<?php require'../config/config.php'; 
	$action = filter_input(INPUT_POST, 'actionEmpresa');

	if($action == "cadastrar"){
		cadastrar();
	}elseif ($action == "atualizar") {
		atualizar();
	}elseif ($action == "deletar") {
		deletar();
	}



	function cadastrar(){
		
	
		$empresa = new acme\models\EmpresaModel;
		$cadastrado = $empresa->create([
			'nome' => filter_input(INPUT_POST, 'empresaNome'),
			'codigo'=> filter_input(INPUT_POST, 'empresaCodigo'),
			
			]);
		echo $cadastrado;
		header("location:../view/empresas.php?info=$cadastrado");
	}


	function atualizar(){
    	
    	$empresa = new acme\models\EmpresaModel;
		$atualizado = $empresa->update(filter_input(INPUT_POST, 'empresaId'),[
			'nome' => filter_input(INPUT_POST, 'empresaEditNome'),
			'codigo'=> filter_input(INPUT_POST, 'empresaEditCodigo'),
			]);

		echo $atualizado;
		header("location:../view/empresas.php?info=$atualizado");
	}


	function deletar(){
		$empresa = new acme\models\EmpresaModel;
		$deletado = $empresa->delete('id',filter_input(INPUT_POST, 'empresaId'));

		echo $deletado;
		header("location:../view/empresas.php?info=$deletado");
	}






 ?>
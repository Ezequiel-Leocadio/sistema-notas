<?php require'../config/config.php'; 
	

	if(isset($_POST['cadastrar'])){
		
	
		$fornecedor = new acme\models\FornecedorModel;
		$cadastrado = $fornecedor->create([
			'nome' => $_POST['txtNome'],
			'cnpj'=> $_POST['txtCnpj'],

			]);
		$retorno = $cadastrado;
		header("location:../view/fornecedor.php");

	}elseif(isset($_POST['atualizar'])){
		$cnpj = $_REQUEST['cnpj'];

		$fornecedor = new acme\models\FornecedorModel;
		$fornecedores = $fornecedor->findBy('cnpj',"'$cnpj'");
		$id_f = $fornecedores->id;
	
		$atualizado = $fornecedor->update($id_f,[
			'nome' => $_POST['nome'],
			]);

		$retorno = $atualizado;
		header("location:../view/fornecedor.php?info=1");

	}elseif(isset($_POST['deletar'])){
	
		$user = new acme\models\UserModel;
		$deletado = $user->delete('id_usuario',$_POST['id_user']);

		$retorno = $deletado;

		

		//header("location:../view/fornecedor.php");

	}else{
		$retorno = 0;
	}

	echo $retorno;



 ?>
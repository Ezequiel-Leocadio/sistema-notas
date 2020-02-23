<?php require'../config/config.php'; 

	$cnpj = $_REQUEST['cnpj'];

	$fornecedor = new acme\models\FornecedorModel;
	$fornecedores = $fornecedor->findBy('cnpj',"'$cnpj'");
	
	if($fornecedores == true){
		$consulta = $fornecedores->nome;
		echo $consulta;
	}else{

	}

	
?>
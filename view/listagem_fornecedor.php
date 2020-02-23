<?php 
	require'../config/config.php'; 
	
	
	session_start();

	$id = $_SESSION['id'];

	$user = new acme\models\UserModel;
	$permEditar = $user->permissaoUser('fornecedor',$id,'D','editar');
	$permExcluir = $user->permissaoUser('fornecedor',$id,'D','excluir');

	$disabled =  $permEditar == 'certo' ? "" : "disabled";
	$edit = $permEditar == 'certo' ? "aditForne" : "negado2";

	$disabled2 =  $permExcluir == 'certo' ? "" : "disabled";
	$excluir = $permExcluir == 'certo' ? "confirmacao" : "negado2";



	$data = array();
	$output= array();
	$query="select * from fornecedor";
										
	$fornecedor = new acme\models\FornecedorModel;
	$fornecedores = $fornecedor->read($query);

	

    foreach($fornecedores as $fornecedor){
    	
                  
        $sub_array=array();
                   
	    $sub_array[]=$fornecedor->nome;
		$sub_array[]=$fornecedor->cnpj;

		$sub_array[]= '<a href="#" '.$disabled.' data-toggle="modal" data-target="#'.$edit.'" data-nome="'.$fornecedor->nome.'" data-cnpj="'.$fornecedor->cnpj.'" data-toggle="tooltip" data-toggle=tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fa fa-pencil" ></i>';

        $data[]=$sub_array;

	}

	$output=array("data"=>$data);

	echo json_encode($output);
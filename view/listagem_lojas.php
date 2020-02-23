<?php 
	require'../config/config.php';

	session_start();

	$id = $_SESSION['id'];

	$user = new acme\models\UserModel;
	$permEditar = $user->permissaoUser('lojas',$id,'D','editar');
	$permExcluir = $user->permissaoUser('lojas',$id,'D','excluir');

	$disabled =  $permEditar == 'certo' ? "" : "disabled";
	$edit = $permEditar == 'certo' ? "aditLoja" : "negado2";

	$disabled2 =  $permExcluir == 'certo' ? "" : "disabled";
	$excluir = $permExcluir == 'certo' ? "confirmacao" : "negado2";
 


	$data = array();
	$output= array();
	$query="select * from lojas";
										
	$loja = new acme\models\LojaModel;
	$lojas = $loja->read($query);


   
   foreach ($lojas as $loja){
    	
    	$sub_array=array();
    	$sub_array[]=$loja->codigo;
		$sub_array[]=$loja->nome;
		
		

		$sub_array[]= '<a href="#" '.$disabled.'  data-toggle="modal" data-target="#'.$edit.'" data-loja_nome="'.$loja->nome.'" data-loja_id="'.$loja->id.'" data-loja_codigo="'.$loja->codigo.'"  data-toggle="tooltip" data-toggle=tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fa fa-pencil" ></i>';

        $data[]=$sub_array;

	}

	$output=array("data"=>$data);

	echo json_encode($output);
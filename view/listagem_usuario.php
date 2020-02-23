<?php 
	require'../config/config.php'; 
	session_start();

	$id = $_SESSION['id'];

	$user = new acme\models\UserModel;
	$permEditar = $user->permissaoUser('usuario',$id,'D','editar');
	$permExcluir = $user->permissaoUser('usuario',$id,'D','excluir');

	$disabled =  $permEditar == 'certo' ? "" : "disabled";
	$edit = $permEditar == 'certo' ? "aditUser" : "negado2";

	$disabled2 =  $permExcluir == 'certo' ? "" : "disabled";
	$excluir = $permExcluir == 'certo' ? "confirmacao" : "negado2";


	$data = array();
	$output= array();
	$query="select * from usuario";
										
	$user = new acme\models\UserModel;
	$users = $user->read($query);


   
   foreach ($users as $user){
    	
    	$sub_array=array();
		$sub_array[]=$user->nome;
		$sub_array[]=$user->login;
		$sub_array[]=$user->tipo;
		$sub_array[]=$user->filial;
		$sub_array[]=$user->setor;

		$sub_array[]= '<a href="#" '.$disabled.'  data-toggle="modal" data-target="#'.$edit.'" data-nome="'.$user->nome.'" data-id="'.$user->id.'" data-login="'.$user->login.'"  data-tipo="'.$user->tipo.'"  data-toggle="tooltip" data-toggle=tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fa fa-pencil" ></i>';

        $data[]=$sub_array;

	}

	$output=array("data"=>$data);

	echo json_encode($output);
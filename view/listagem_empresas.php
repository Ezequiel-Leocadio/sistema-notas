<?php 
	require'../config/config.php'; 

	session_start();

	$id = $_SESSION['id'];

	
	$user = new acme\models\UserModel;
	$permEditar = $user->permissaoUser('empresa',$id,'D','editar');
	$permExcluir = $user->permissaoUser('empresa',$id,'D','excluir');

	$disabled =  $permEditar == 'certo' ? "" : "disabled";
	$edit = $permEditar == 'certo' ? "aditEmpresa" : "negado2";

	$disabled2 =  $permExcluir == 'certo' ? "" : "disabled";
	$excluir = $permExcluir == 'certo' ? "confirmacao" : "negado2";


	$data = array();
	$output= array();
	$query="select * from empresas";
										
	$empresa = new acme\models\EmpresaModel;
	$empresas = $empresa->read($query);


   
   foreach ($empresas as $empresa){
    	
    	$sub_array=array();
		$sub_array[]=$empresa->codigo;
		$sub_array[]=$empresa->nome;
		

		$sub_array[]= '<a href="#" '.$disabled.' data-toggle="modal" data-target="#'.$edit.'" data-empresa_nome="'.$empresa->nome.'" data-empresa_id="'.$empresa->id.'" data-empresa_codigo="'.$empresa->codigo.'"  data-toggle="tooltip" data-toggle=tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fa fa-pencil" ></i>';

        $data[]=$sub_array;

	}

	$output=array("data"=>$data);

	echo json_encode($output);
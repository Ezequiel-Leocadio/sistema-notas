<?php 
	require'../config/config.php';

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
    session_start();
	$id = $_SESSION['id'];

	
	$user = new acme\models\UserModel;
	$permEditar = $user->permissaoUser('permissao',$id,'D','editar');
	$permExcluir = $user->permissaoUser('permissao',$id,'D','excluir');

	$disabled =  $permEditar == 'certo' ? "" : "disabled";
	$edit = $permEditar == 'certo' ? "aditControleUser" : "negado2";

	$disabled2 =  $permExcluir == 'certo' ? "" : "disabled";
	$excluir = $permExcluir == 'certo' ? "confirmacao" : "negado2";


	$data = array();
	$output= array();
	$query="select *,u.nome,p.id as idPerm from controle_usuario p inner join usuario u on p.usuario = u.id";
										
	$controluser = new acme\models\ControlUserModel;
	$controlusers = $controluser->read($query);


   
   foreach ($controlusers as $controluser){
    	
    	$sub_array=array();
		$sub_array[]=$controluser->rotina;

		$visualizar = $controluser->visualizar;
		$salvar =  $controluser->salvar;
		$editar = $controluser->editar;
		$excluir = $controluser->excluir;

		if($visualizar == '0'){
			$visualizar = "<span class='label label-danger'>NÃO</span>";
			
		}elseif($visualizar == '1'){
			$visualizar = "<span class='label label-success'>SIM";
			
		}

		if($salvar == '0'){
			$salvar = "<span class='label label-danger'>NÃO</span>";
			
		}elseif($salvar == '1'){
			$salvar = "<span class='label label-success'>SIM";
			
		}

		if($editar == '0'){
			$editar = "<span class='label label-danger'>NÃO</span>";
			
		}elseif($editar == '1'){
			$editar = "<span class='label label-success'>SIM";
			
		}

		if($excluir == '0'){
			$excluir = "<span class='label label-danger'>NÃO</span>";
			
		}elseif($excluir == '1'){
			$excluir = "<span class='label label-success'>SIM";
			
		}

		$sub_array[]=$visualizar;
		$sub_array[]=$salvar;
		$sub_array[]=$editar;
		$sub_array[]=$excluir;
		$sub_array[]=$controluser->nome;

		$dataPerm = swap_date($controluser->data);

		$sub_array[]= '<a href="#" '.$disabled.'  data-toggle="modal" data-target="#'.$edit.'" data-permi_rotina="'.$controluser->rotina.'" data-permi_id ="'.$controluser->idPerm.'" data-permi_visualizar="'.$controluser->visualizar.'"  data-permi_salvar="'.$controluser->salvar.'" data-permi_editar="'.$controluser->editar.'" data-permi_excluir="'.$controluser->excluir.'" data-permi_usuario="'.$controluser->usuario.'" data-permi_data="'.$controluser->data.'" data-toggle="tooltip" data-toggle=tooltip" data-placement="top" title="Editar" class="btn btn-primary"><i class="fa fa-pencil" ></i>';

        $data[]=$sub_array;

	}

	$output=array("data"=>$data);

	echo json_encode($output);
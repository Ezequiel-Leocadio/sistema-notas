<?php 
	require'../config/config.php'; 

	session_start();
	$usuario_S = '';
	$id = $_SESSION['id'];


	$user = new acme\models\UserModel;
	$permDataUser = $user->permissaoUser('contas',$id,'DT','visualizar');

	$permEditar = $user->permissaoUser('contas',$id,'D','editar');
	$permExcluir = $user->permissaoUser('contas',$id,'D','excluir');

	$disabled =  $permEditar == 'certo' ? "" : "disabled";
	$edit = $permEditar == 'certo' ? "editConta" : "negado2";

	$disabled2 =  $permExcluir == 'certo' ? "" : "disabled";
	$excluir = $permExcluir == 'certo' ? "confirmacao" : "negado2";


	// Converter Moeda
	function moeda($get_valor) {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }
  
    // Converter Data	
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

	//$DataInicio = swap_date($_POST['dataInicio']);
	// if($DataInicio == 'Invalido'){
	// 	$permData = $permDataUser;
	// }elseif ( $DataInicio > $permDataUser) {
	// 	$permData = $DataInicio;
	//}

	$data = array();
	$query='';
	$queryData='';
	$Invalido = '';

	$query2='';
	$query3='';
	$query4='';
	$output= array();

	$query .= "SELECT *,C.id as idC, L.nome as nomeL ,L.codigo as codigoL, E.nome as nomeEN,E.codigo as codigoE FROM contas C ";
	$query .= "INNER JOIN lojas L ON L.codigo = C.loja ";
	$query .= "INNER JOIN empresas E ON E.codigo = C.empresa  ";

	// Inicio Verificar total
	if ($_POST["total"]=="sim") {
		
		$dataVen = swap_date($_POST['dataVen']);
		$dataInicio = swap_date($_POST['dataInicio']);
		$dataFim = swap_date($_POST['dataFim']);


		$query4 .= "SELECT SUM(valor) AS VALOR FROM contas ";

		$query4 .= 'WHERE nf LIKE "%'.$_POST['nf'].'%" ';
		$query4 .= 'and empresa LIKE "%'.$_POST['codEmp'].'%" ';
		$query4 .= 'and loja LIKE "%'.$_POST['codLoja'].'%" ';
		$query4 .= 'and valor LIKE "%'.moeda($_POST['valor']).'%" ';
		$query4 .= 'and status LIKE "%'.$_POST['status'].'%" ';
		

		if($dataVen != "Invalido"){
			$query4 .= 'and dataVen LIKE "%'.$dataVen.'%" ';
		}else{
		}
		
		if($dataFim != "Invalido"){
			$query4 .= 'and data <= "'.$dataFim.'" ';
		}else{
		}

		if($dataInicio != "Invalido"){
			$query4 .= 'and data >= "'.$dataInicio.'" ';
		}else{	
		}

	  	$dataAtual = explode(",",$_POST['data']);
 		
 		for ($i=0; $i < count($dataAtual); $i++) { 
	   		
	  		$dataAtual[$i] = swap_date($dataAtual[$i]);

	   		if($dataAtual[$i] == "Invalido"){			 
				$Invalido = 'Invalido';		
			}
	  	}	 

	  	if ($Invalido != 'Invalido') {
			$queryData = "'".implode("','", $dataAtual)."'";
			$query4 .= 'and data in ('.$queryData.')  ';
		}

		$conta = new acme\models\ContasModel;
    	$contas = $conta->read($query4);
    	foreach($contas as $conta){
    		echo number_format($conta->VALOR,2,',','.');;
    	}


	}else{

		// Inicio Do POST de busca
		if(isset($_POST["search"]["value"])){

			$query2 .= "SELECT * FROM contas C ";
			
			$data3 = $_POST['data'];
			
			$dataVen = swap_date($_POST['dataVen']);
			$dataAtual = swap_date($_POST['data']);
			$dataInicio = swap_date($_POST['dataInicio']);
			$dataFim = swap_date($_POST['dataFim']);


			if($dataVen != "Invalido"){
				$dataVen = swap_date($_POST['dataVen']);
			}else{
				$dataVen = '';
			}

			$query .= 'WHERE nf LIKE "%'.$_POST['nf'].'%" ';
			$query .= 'and empresa LIKE "%'.$_POST['codEmp'].'%" ';
			$query .= 'and loja LIKE "%'.$_POST['codLoja'].'%" ';
			$query .= 'and valor LIKE "%'.moeda($_POST['valor']).'%" ';
			$query .= 'and dataVen LIKE "%'.$dataVen.'%" ';
			$query .= 'and status LIKE "%'.$_POST['status'].'%" ';

			//////////////////////////////////////////////////////////
			$query2 .= 'WHERE nf LIKE "%'.$_POST['nf'].'%" ';
			$query2 .= 'and empresa LIKE "%'.$_POST['codEmp'].'%" ';
			$query2 .= 'and loja LIKE "%'.$_POST['codLoja'].'%" ';
			$query2 .= 'and valor LIKE "%'.moeda($_POST['valor']).'%" ';
			$query2 .= 'and dataVen LIKE "%'.$dataVen.'%" ';
			$query2 .= 'and status LIKE "%'.$_POST['status'].'%" ';



			$dataAtual = explode(",",$_POST['data']);
	 		
	 		for ($i=0; $i < count($dataAtual); $i++) { 
		   		
		  		$dataAtual[$i] = swap_date($dataAtual[$i]);

		   		if($dataAtual[$i] == "Invalido"){			 
					$Invalido = 'Invalido';		
				}
		  	}	 

		  	if ($Invalido != 'Invalido') {
				$queryData = "'".implode("','", $dataAtual)."'";
				$query .= 'and data in ('.$queryData.')  ';
				$query2 .= 'and data in ('.$queryData.')  ';
			}	

			// $query .= 'and data >= "'.$permData.'" ';
			
			if($dataFim != "Invalido"){
				$query .= 'and data <= "'.$dataFim.'" ';
				$query2 .= 'and data <= "'.$dataFim.'" ';
			}else{
			}


			if($dataInicio != "Invalido"){
				$dataInicio = swap_date($_POST['dataInicio']);
				$query .= 'and data >= "'.$dataInicio.'" ';
				$query2 .= 'and data >= "'.$dataInicio.'" ';

			}else{	
			}

			if($_POST["length"] != -1){
				$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
			}

		// Fim Do POST de busca	
		}

		// if(isset($_POST["order"])){

		// 	if($_POST['order']['0']['column'] == 0 ){
				//$order = 'chave_acesso ';
		// 		$query .= 'ORDER BY '.$order.' ';
		// 	}else{
		// 	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		// 	}

		// }else{
		// 	$query .= 'ORDER BY data desc ';

		// }



		$conta = new acme\models\ContasModel;
	   
	  	$num_linhas2 =$conta->numeros_linhas($query2);
		$num_linhas = $conta->numeros_linhas($query2) +1;
	 
		$contas = $conta->read($query);
		// Inicio do For  para Contas
	    foreach($contas as $conta){
	    	         
	        $sub_array=array();
	                   
		    $sub_array[]="<div id= 'ocultar_soli'>".$conta->nf;
			$sub_array[]=$conta->nomeL;
			$sub_array[]=$conta->codigoE;
			$sub_array[]=$conta->nomeEN;
			$sub_array[]=swap_date($conta->data);
			$sub_array[]=swap_date($conta->dataVen);
			$sub_array[]="R$ ".number_format($conta->valor,2,',','.');;
			$sub_array[]=$conta->usuario;

			$tipo_status =$conta->status;
			if($tipo_status == 'Em Aberto'){
				$tipo_status = "<span class='label label-danger'>Em Aberto</span>";
				
			}elseif($tipo_status == 'Pago'){
				$tipo_status = "<span class='label label-success'> Pago</span> ";
				
			}

			$sub_array[]=$tipo_status;
			


			$sub_array[]= '<a href="#" '.$disabled.' data-toggle="modal" data-target="#'.$edit.'" data-chave="'.$conta->nf.'" data-conta_numero="'.$conta->numcomprovante.'" data-cnpj="'.$conta->empresa.'" data-conta_fpagamento="'.$conta->fpagamento.'" data-conta_banco="'.$conta->banco.'" data-usuario="'.$conta->usuario.'" data-conta_status="'.$conta->status.'" data-conta_comprovante="'.$conta->comprovante.'"  data-conta_id="'.$conta->idC.'" data-toggle="tooltip" data-toggle=tooltip" data-placement="top" title="Editar" class="btn btn-info"><i class="fa fa-pencil" ></i></a>';

	        $data[]=$sub_array;

	    // Fim do For  para Contas
		}

		$output=array(
				"draw"				=>intval($_POST["draw"]),
				"recordsTotal"		=>$num_linhas,
				"recordsFiltered"	=>$num_linhas2,	
				"data"				=>$data
			);

		echo json_encode($output);

	// Fim Verificar total	
	}
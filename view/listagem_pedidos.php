<?php require '../config/config.php'; ?>
<?php 
	include("function.php");


	session_start();
	$usuario = $_SESSION['login'];
	$id = $_SESSION['id'];

	
	$user = new acme\models\UserModel;
	$permEditar = $user->permissaoUser('pedidos',$id,'D','editar');
	$permExcluir = $user->permissaoUser('pedidos',$id,'D','excluir');

	$disabled =  $permEditar == 'certo' ? "" : "";
	$edit = $permEditar == 'certo' ? "aditPedido" : "aditPedido";

	$disabled2 =  $permExcluir == 'certo' ? "" : "disabled";
	$excluir = $permExcluir == 'certo' ? "confirmacao" : "negado2";


	function swap_date($date_str){
		date_default_timezone_set('America/cuiaba');

    	if ($date = \DateTime::createFromFormat('Y-m-d', $date_str)) {
       		return $date->format('d/m/Y');

    	}elseif ($date = \DateTime::createFromFormat('d/m/Y', $date_str)) {
        	return $date->format('Y-m-d');

    	}else{
        	return "Invalido";
      	}

    	throw new \InvalidArgumentException('Formato de data Invalido.');
    }

	$data = array();
	$detalheD = array();
	$query='';

	$query2='';
	$query3='';
	$output= array();
	$query .= "SELECT * FROM pedidos ";

	$query2 .= "SELECT * FROM pedidos ";
	$query3 .= "SELECT * FROM pedidos ";
	if(isset($_POST["search"]["value"])){

		$data3 = $_POST['columns']['1']['search']['value'];

		$statusPesquisa = $_POST['columns']['6']['search']['value'];
		$statusPesquisa2 = '';

		if($statusPesquisa == 'pendente'){
			$statusPesquisa2 = '1';
		}elseif ($statusPesquisa == 'Em andamento') {
			$statusPesquisa2 = '2';
		}elseif ($statusPesquisa == 'finalizado') {
			$statusPesquisa2 = '3';
		}

		$query .= 'WHERE protocolo LIKE "%'.$_POST['columns']['0']['search']['value'].'%" ';
		// $query .= 'and data LIKE "%'.$data3.'%" ';
		$query .= 'and solicitante LIKE "%'.$_POST['columns']['2']['search']['value'].'%" ';
		$query .= 'and loja LIKE "%'.$_POST['columns']['3']['search']['value'].'%" ';
		$query .= 'and setor LIKE "%'.$_POST['columns']['4']['search']['value'].'%" ';
        $query .= 'and solicitacao LIKE "%'.$_POST['columns']['5']['search']['value'].'%" ';
        $query .= 'and status LIKE "%'.$statusPesquisa2.'%" ';

        $query .= 'and  status LIKE "%'.$_REQUEST["statusPedido"].'%" ';
		

		$query2 .= 'WHERE protocolo LIKE "%'.$_POST['columns']['0']['search']['value'].'%" ';
		// $query2 .= 'and data LIKE "%'.$data3.'%" ';
		$query2 .= 'and solicitante LIKE "%'.$_POST['columns']['2']['search']['value'].'%" ';
		$query2 .= 'and loja LIKE "%'.$_POST['columns']['3']['search']['value'].'%" ';
		$query2 .= 'and setor LIKE "%'.$_POST['columns']['4']['search']['value'].'%" ';
        $query2 .= 'and solicitacao LIKE "%'.$_POST['columns']['5']['search']['value'].'%" ';
        $query2 .= 'and status LIKE "%'.$statusPesquisa2 .'%" ';
        $query2 .= 'and  status LIKE "%'.$_REQUEST["statusPedido"].'%" ';

		$data4 = swap_date($data3);

		if($data4 != "Invalido"){

			$data4 = swap_date($data3);
			$query .= 'and data LIKE "%'.$data4.'%" ';
			$query2.= 'and data LIKE "%'.$data4.'%" ';
		}
	
	}

	if(isset($_POST["order"])){
		$order2 = $_POST['order']['0']['column'];

		if($order2 == '0' ){
			$order = 'protocolo';
			$query .= 'ORDER BY '.$order.' '.$_POST['order']['0']['dir'].' ';
		}elseif($order2 == '4'){
			$order = 'status';
			$query .= 'ORDER BY '.$order.' '.$_POST['order']['0']['dir'].' ';
		}else{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		}

	}else{
		
		$query .= 'ORDER BY status asc ';

	}

	if($_POST["length"] != -1){
		$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];

	}
										
	$detalhe_pedido = new acme\models\Detalhe_PedidoModel;

	$pedido = new acme\models\PedidosModel;	
			 
	$pedidos = $pedido->read($query);
	    
	 // Retorna o total de registro filtados   
  	$num_linhas = $pedido->numeros_linhas($query2);

  	// Retorna o total de registros na tabela
  	$num_linhas2 = $pedido->numeros_linhas($query3);
	//   var_dump($pedidos);
		
    foreach($pedidos as $pedido){
    	$id_pedido = $pedido->id;
    	$detalhes = $detalhe_pedido->read("SELECT * FROM detalhe_pedido WHERE pedido = $id_pedido");
      
        $sub_array=array();

        foreach ($detalhes as $detalhe) {
        	$detalhe_array= array();
        	
        	$detalhe_array['situacao']=$detalhe->situacao;
        	$detalhe_array['data']=swap_date($detalhe->data);;
        	$detalhe_array['usuario']=$detalhe->usuario;

        	$detalheD[]=$detalhe_array;
        }
        
                   
	    $sub_array[]=$pedido->protocolo;
        // converter a data para o brasil
		$data2 = swap_date($pedido->data);
		$sub_array[]=$data2;

        $sub_array[]=$pedido->solicitante;
        $sub_array[]=$pedido->loja;
		$sub_array[]=$pedido->setor;
		$sub_array[]="<div id= 'ocultar_soli'>".$pedido->solicitacao;

		$tipo_status =$pedido->status;
		if($tipo_status == '1'){
			$tipo_status = "<span class='label label-danger'>Pendente</span>";
			$tipo_status2 = 'pendente';
		}elseif($tipo_status == '2'){
			$tipo_status = "<span class='label label-warning'>Em andamento</span>";
			$tipo_status2 = 'Em andamento';
		}elseif($tipo_status == '3'){
			$tipo_status = "<span class='label label-success'>Finalizado";
			$tipo_status2 = 'finalizado';
		}

		$sub_array[]=$tipo_status;

		$finalizado = $pedido->user_finalizado;

		if ($detalhes == true) {
			$detalhe_json = json_encode($detalheD);
		}else{
			$detalhe_json = '';
		}

		


		$sub_array[]= '<a href="#" '.$disabled.'  data-toggle="modal" data-target="#'.$edit.'"
		data-detalhe_pedido='."'$detalhe_json'".'
		data-pedido_protocolo="'.$pedido->protocolo.'"
		data-pedido_data="'.$data2.'"
		data-pedido_solicitante="'.$pedido->solicitante.'"
		data-pedido_loja="'.$pedido->loja.'"
		data-pedido_setor="'.$pedido->setor.'"
		data-pedido_solicitacao="'.$pedido->solicitacao.'"
		data-pedido_status="'.$tipo_status.'"
		data-pedido_finalizado="'.$pedido->user_finalizado.'"
		data-pedido_motivo="'.$pedido->motivo_finali.'"
		data-pedido_id="'.$pedido->id.'"

	
		data-toggle="tooltip" 
		data-toggle=tooltip" 
		data-placement="top" title="Editar/Visualizar" class="btn btn-primary"><i class="fa fa-pencil" ></i></a>
		<a href="#"  data-toggle="modal" '.$disabled2.' data-target="#'.$excluir.'" 	
		data-toggle="tooltip" 
		data-pedido_id="'.$pedido->id.'"
		data-toggle=tooltip" 
		data-placement="top" title="Excluir" class="btn btn-danger"><i class="fa fa-trash" ></i></a>';

        $data[]=$sub_array;
        $detalheD= array();

	}

	$output=array(
		"draw"				=>intval($_POST["draw"]),
		"recordsTotal"		=>$num_linhas,
		"recordsFiltered"	=>$num_linhas2,	
		"data"				=>$data
		);

echo json_encode($output);
// echo $detalhe_json;
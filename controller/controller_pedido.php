<?php require'../config/config.php'; 
    $action = filter_input(INPUT_POST, 'action_pedido');
        // echo filter_input(INPUT_POST, 'txtSituacao');
		// echo filter_input(INPUT_POST, 'tipo_atual_ped');
		// echo filter_input(INPUT_POST, 'txtId_pedido');
		// echo $id_det = filter_input(INPUT_POST, 'txtId_det');
		// echo filter_input(INPUT_POST, 'txtLoja');
		// echo filter_input(INPUT_POST, 'txtSetor');
		
	

    function protocolo(){
        $novo_valor= "";
        $valor = "0123456789";
        srand((double)microtime()*1000000);
        for ($i=0; $i<7; $i++){
        $novo_valor.= $valor[rand()%strlen($valor)];
        }
        return $novo_valor;
    }


	if($action == "cadastrar"){
		cadastrar();

	}elseif ($action == "atualizar") {
		atualizar();

	}elseif ($action == "deletar") {
		deletar();
	}



	function cadastrar(){
        date_default_timezone_set('America/cuiaba');
        $data = date("Y-m-d");

        session_start();
        $usuario= $_SESSION['usuario'];
        $protocolo = protocolo();
	
		$pedido = new acme\models\PedidosModel;
		$cadastrado = $pedido->create([
            'protocolo' => $protocolo,
            'data' => $data,
            'solicitante' => $usuario,
            'loja' => filter_input(INPUT_POST, 'txtLoja'),
            'setor' => filter_input(INPUT_POST, 'txtSetor'),
			'solicitacao' => filter_input(INPUT_POST, 'txtSolicitacao'),
            'status' => '1'
			]);
		echo $cadastrado;
		// header("location:../view/usuario.php?info=$cadastrado&page=usuario");
	}


	function atualizar(){
		session_start();
        $usuario= $_SESSION['usuario'];

		date_default_timezone_set('America/cuiaba');
     	$data = date("Y-m-d");
		 
		$situacao = filter_input(INPUT_POST, 'txtNovaSituacao');
		$motivo = filter_input(INPUT_POST, 'txtMotivo');
		$id = filter_input(INPUT_POST, 'txtPedidoID');

		$pedido = new acme\models\PedidosModel;

		if ($motivo == '') {
			$atualizado = $pedido->update($id,[
				'status' => '2',
				'user_finalizado' => ''
			]);
			
			$detalhe_pedido = new acme\models\Detalhe_PedidoModel;
			$atualizado = $detalhe_pedido->create([
				'pedido' => $id,
				'data' => $data,
				'situacao' => $situacao,
				'usuario' => $usuario
			]);

			
			
			echo $atualizado;
			
			
		}else{
			
			$atualizado = $pedido->update($id,[
				'status' => '3',
				'user_finalizado' => $usuario,
				'motivo_finali'=>$motivo
			]);
			echo $atualizado;
			
		}


		header("location:../view/pedidos.php?info=$atualizado");
	}

	function deletar(){
	// echo filter_input(INPUT_POST, 'txtID');

		$detalhe_pedido = new acme\models\Detalhe_PedidoModel;
		$deletar2 = $detalhe_pedido->delete('pedido',filter_input(INPUT_POST, 'txtID'));


		echo $deletar2;
		

		$pedido = new acme\models\PedidosModel;
		$deletar = $pedido->delete('id',filter_input(INPUT_POST, 'txtID'));


		echo $deletar;

		header("location:../view/pedidos.php?infoD=$deletar");

		
	}


 ?>
<?php require'../config/config.php'; 

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
		
		if (filter_input(INPUT_POST, 'action') == 'editar') {

			filter_input(INPUT_POST, 'idNotaUsoConsumo');
			filter_input(INPUT_POST, 'txtEditStatus');

			$notaU = new acme\models\NotasUsoConsumoModel;
				$atualizar = $notaU->update(filter_input(INPUT_POST, 'idNotaUsoConsumo'),[
				'status'=> filter_input(INPUT_POST, 'txtUsoEditStatus'),
				'observacao'=>filter_input(INPUT_POST, 'txtUsoEditObservacao')

			]);

			header("location:../view/notas_uso_consumo.php?info=$atualizar");
			exit();
		}elseif (filter_input(INPUT_POST, 'action') == 'enviarPrec') {
			$nota = new acme\models\NotasUsoConsumoModel;

			$query = '';

			$query .= "SELECT *,nf.id as idN FROM notas_uso_consumo nf ";
			$query .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";
			$query .= 'WHERE chave_acesso LIKE "%'.filter_input(INPUT_POST, 'chave').'%" ';
			$query .= 'and numero_nota LIKE "%'.filter_input(INPUT_POST, 'numero').'%" ';
			$query .= 'and cnpj LIKE "%'.filter_input(INPUT_POST, 'cnpj').'%" ';
			$query .= 'and nome LIKE "%'.filter_input(INPUT_POST, 'nome').'%" ';
			$query .= 'and status LIKE "%'.filter_input(INPUT_POST, 'status').'%" ';

			$data1 = swap_date(filter_input(INPUT_POST, 'data'));
			$data2 = swap_date(filter_input(INPUT_POST, 'dataVen'));

			if($data1 != "Invalido"){
				$query .= 'and data LIKE "%'.$data1.'%" ';	
			}
			if($data2 != "Invalido"){
				$query .= 'and data_ven LIKE "%'.$data2.'%" ';	
			}

			$notas = $nota->read($query);

			if($notas == true){
				$msg = '';
				foreach($notas as $nota){
					$idNF = $nota->idN;
					$statusAnt= $nota->status;
					$notaU = new acme\models\NotasUsoConsumoModel;
					$atualizar = $notaU->update($idNF,[
					'status'=> '2',
					'status_ant'=>$statusAnt
					

					]);

				if ($atualizar == '1') {
					$msg ='1';
				}
					
				}
				
				echo $msg;
			}
		
			exit();
		}
	
		date_default_timezone_set('America/cuiaba');
		$data = date("Y-m-d");

		session_start();
    	$usuario= $_SESSION['usuario'];

    	$cnpj = $_POST['txtUsoCnpj'];

    	$numeroN = $_POST['txtUsoNumero'];

    	$dataVen = swap_date(filter_input(INPUT_POST, 'txtUsoDataVen'));
    	$status = filter_input(INPUT_POST, 'txtUsoStatus');
    	if ($status == '') {
    		$status = '1';
    	}

    	$cadastrado = '';

    	$nota = new acme\models\NotasUsoConsumoModel;

		$fornecedor = new acme\models\FornecedorModel;
		$fornecedores = $fornecedor->findBy('cnpj',"'$cnpj'");

		if($fornecedores == true){
			$id_forn2 = $fornecedores->id;

			
	    	$query = "SELECT * FROM notas_uso_consumo WHERE numero_nota = '$numeroN' AND fornecedor = $id_forn2";
			$notas = $nota->read($query);

			

			if($notas == true){
				
				foreach ($notas as $nota ) {
					$usuario_nota = $nota->usuario;
					$id_nota = $nota->id;
				}
				if($usuario_nota == $usuario){
					echo 'cadastrado';
				}else{
					$notaU = new acme\models\NotasUsoConsumoModel;
					$atualizar = $notaU->update($id_nota,[
					'usuario_ant'=> $usuario_nota,
					'usuario'=> $usuario

					]);

					// if ($atualizar) {
						echo "alterado";
					// }else{
					// 	echo "erro";
					// }

					
				}
				
				
			}else{

								

				$notac = new acme\models\NotasUsoConsumoModel;

				$cadastrado = $notac->create([
					'chave_acesso' => filter_input(INPUT_POST, 'txtUsoChave'),
					'numero_nota'=> $_POST['txtUsoNumero'],
					'fornecedor'=> $id_forn2,
					'data'=> $data,
					'data_ven'=>$dataVen,
					'usuario'=> $usuario,
					'observacao'=>filter_input(INPUT_POST, 'txtUsoObservacao'),
					'filial'=>filter_input(INPUT_POST, 'txtFilialUso'),
					'status' => $status

				]);

				$atualizar = $fornecedor->update($id_forn2,[
					'nome' => $_POST['txtUsoNomeF']
				]);

			}
		
		}else{
			$notas = false;
		
			$cadastrado = $fornecedor->create([
					'nome' => $_POST['txtUsoNomeF'],
					'cnpj'=> $_POST['txtUsoCnpj'],

			]);

			$fornecedores = $fornecedor->findBy('cnpj',"'$cnpj'");

			$nota = new acme\models\NotasUsoConsumoModel;
			$cadastrado = $nota->create([
				'chave_acesso' => $_POST['txtUsoChave'],
				'numero_nota'=> $_POST['txtUsoNumero'],
				'fornecedor'=> $fornecedores->id,
				'data_ven'=>$dataVen,
				'data'=> $data,
				'usuario'=> $usuario,
				'observacao'=>filter_input(INPUT_POST, 'txtUsoObservacao'),
				'filial'=>filter_input(INPUT_POST, 'txtFilialUso'),
				'status' => $status
			]);			
		
		}



	$retorno = $cadastrado;
		

	echo $retorno;



 ?>
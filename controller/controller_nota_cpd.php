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

	    date_default_timezone_set('America/cuiaba');
		$data = date("Y-m-d");
		
		if (filter_input(INPUT_POST, 'action') == 'editar') {

			$statusEdit = filter_input(INPUT_POST, 'txtEditStatus');

			filter_input(INPUT_POST, 'idNotaCpd');
			filter_input(INPUT_POST, 'txtEditStatus');

			if ($statusEdit == '1') {
				
				$notaU = new acme\models\NotasCpdModel;
					$atualizar = $notaU->update(filter_input(INPUT_POST, 'idNotaCpd'),[
					'status'=> $statusEdit,
					'data_pend' => $data,
					'observacao'=>filter_input(INPUT_POST, 'txtEditObservacao')

				]);

			}elseif ($statusEdit == '3') {

				$notaU = new acme\models\NotasCpdModel;
					$atualizar = $notaU->update(filter_input(INPUT_POST, 'idNotaCpd'),[
					'status'=> $statusEdit,
					'data_fina' => $data,
					'observacao'=>filter_input(INPUT_POST, 'txtEditObservacao')

				]);
			}

			

			header("location:../view/notas_cpd.php?info=$atualizar");
			exit();
		}elseif (filter_input(INPUT_POST, 'action') == 'enviarPrec') {
			$nota = new acme\models\NotasCpdModel;

			$query = '';

			$query .= "SELECT *,nf.id as idN FROM notas_cpd nf ";
			$query .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";
			$query .= 'WHERE chave_acesso LIKE "%'.filter_input(INPUT_POST, 'chave').'%" ';
			$query .= 'and numero_nota LIKE "%'.filter_input(INPUT_POST, 'numero').'%" ';
			$query .= 'and cnpj LIKE "%'.filter_input(INPUT_POST, 'cnpj').'%" ';
			$query .= 'and nome LIKE "%'.filter_input(INPUT_POST, 'nome').'%" ';
			$query .= 'and status LIKE "%'.filter_input(INPUT_POST, 'status').'%" ';
			$query .= 'and filial LIKE "%'.filter_input(INPUT_POST, 'filial').'%" ';

			$data1 = swap_date(filter_input(INPUT_POST, 'data'));
			$data2 = swap_date(filter_input(INPUT_POST, 'dataVen'));
			$data_status = swap_date(filter_input(INPUT_POST, 'dataStatus'));

			if($data1 != "Invalido"){
				$query .= 'and data LIKE "%'.$data1.'%" ';	
			}
			if($data2 != "Invalido"){
				$query .= 'and data_ven LIKE "%'.$data2.'%" ';	
			}

			if($data_status != "Invalido"){

				if (filter_input(INPUT_POST, 'status') == '1') {
					$query .= 'and data_pend LIKE "%'.$data_status.'%" ';
					

				}elseif (filter_input(INPUT_POST, 'status') == '2') {
					$query .= 'and data_env LIKE "%'.$data_status.'%" ';
					
					
				}elseif (filter_input(INPUT_POST, 'status') == '3') {
					$query .= 'and data_fina LIKE "%'.$data_status.'%" ';
					
				
				}
			}

			$notas = $nota->read($query);

			if($notas == true){
				$msg = '';
				foreach($notas as $nota){
					$idNF = $nota->idN;
					$statusAnt= $nota->status;
					$notaU = new acme\models\NotasCpdModel;
					$atualizar = $notaU->update($idNF,[
						'data_env' => $data,
						'status'=> '2',
						
					

					]);

				if ($atualizar == '1') {
					$msg ='1';
				}
					
				}
				
				echo $msg;
			}
		
			exit();
		}
	
		

		session_start();
    	$usuario= $_SESSION['usuario'];
    	$usuario_filial = $_SESSION['filial'];
    	$usuario_setor = $_SESSION['setor'];
    	
    	if ($usuario_filial == '') {
    		echo "0";
    		exit();
    	}



    	$cnpj = $_POST['txtCnpj'];

    	$numeroN = $_POST['txtNumero'];

    	$dataVen = swap_date(filter_input(INPUT_POST, 'txtDataVen'));
    	$status = filter_input(INPUT_POST, 'txtStatus');
    	if ($status == '') {
    		$status = '1';
    	}

    	$cadastrado = '';

    	$nota = new acme\models\NotasCpdModel;

		$fornecedor = new acme\models\FornecedorModel;
		$fornecedores = $fornecedor->findBy('cnpj',"'$cnpj'");

		if($fornecedores == true){
			$id_forn2 = $fornecedores->id;

			
	    	$query = "SELECT * FROM notas_cpd WHERE numero_nota = '$numeroN' AND fornecedor = $id_forn2";
			$notas = $nota->read($query);



			

			if($notas == true){
				
				foreach ($notas as $nota ) {
					$usuario_nota = $nota->usuario;
					$id_nota = $nota->id;
					$status_antigo = $nota->status;
				}
				if($usuario_nota == $usuario){
					echo 'cadastrado';
				}else{		
					if ($usuario_setor == 'Horth_Fruth') {
						$status_horth = '4';
						$status_antigo = '4';
						$data_horth = $data;
							 		
					}else{
						if ($status_antigo == '4') {
							$status_antigo == '4';
						}
						$status_horth = $status;
						$data_horth = '';
					}	

					$notaU = new acme\models\NotasCpdModel;
					$atualizar = $notaU->update($id_nota,[
					'usuario_ant'=> $usuario_nota,
					'usuario'=> $usuario,
					'status' => $status_horth,
					'status_ant' => $status_antigo,
					'data_horth' => $data_horth,

					]);

					// if ($atualizar) {
						echo "alterado";
					// }else{
					// 	echo "erro";
					// }

					
				}
				
				
			}else{
				
								
				$notac = new acme\models\NotasCpdModel;
				if ($status == '1') {

					$cadastrado = $notac->create([
						'chave_acesso' => filter_input(INPUT_POST, 'txtChave'),
						'numero_nota'=> $_POST['txtNumero'],
						'fornecedor'=> $id_forn2,
						'data'=> $data,
						'data_pend'=> $data,
						'data_ven'=>$dataVen,
						'usuario'=> $usuario,
						'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
						'status' => $status,
						'filial' =>$usuario_filial
 
					]);

				}elseif ($status == '2') {
					$cadastrado = $notac->create([
						'chave_acesso' => filter_input(INPUT_POST, 'txtChave'),
						'numero_nota'=> $_POST['txtNumero'],
						'fornecedor'=> $id_forn2,
						'data'=> $data,
						'data_env'=> $data,
						'data_ven'=>$dataVen,
						'usuario'=> $usuario,
						'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
						'status' => $status,
						'filial' =>$usuario_filial

					]);

				}elseif ($status == '3') {
					$cadastrado = $notac->create([
						'chave_acesso' => filter_input(INPUT_POST, 'txtChave'),
						'numero_nota'=> $_POST['txtNumero'],
						'fornecedor'=> $id_forn2,
						'data'=> $data,
						'data_fina'=> $data,
						'data_ven'=>$dataVen,
						'usuario'=> $usuario,
						'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
						'status' => $status,
						'filial' =>$usuario_filial

					]);

				}elseif ($status == '4') {
					$cadastrado = $notac->create([
						'chave_acesso' => filter_input(INPUT_POST, 'txtChave'),
						'numero_nota'=> $_POST['txtNumero'],
						'fornecedor'=> $id_forn2,
						'data'=> $data,						
						'data_horth'=>$data,
						'data_ven'=>$dataVen,
						'usuario'=> $usuario,
						'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
						'status' => $status,
						'status_ant' =>'4',
						'filial' =>filter_input(INPUT_POST, 'txtFilialCpd')

					]);

				}

				

				$atualizar = $fornecedor->update($id_forn2,[
					'nome' => $_POST['txtNomeF']
				]);

			}
		
		}else{
			

			$notas = false;
		
			$cadastrado = $fornecedor->create([
					'nome' => $_POST['txtNomeF'],
					'cnpj'=> $_POST['txtCnpj'],

			]);

			$fornecedores = $fornecedor->findBy('cnpj',"'$cnpj'");


			$nota = new acme\models\NotasCpdModel;

			if ($status == '1') {

					$cadastrado = $nota->create([
						'chave_acesso' => $_POST['txtChave'],
						'numero_nota'=> $_POST['txtNumero'],
						'fornecedor'=> $fornecedores->id,
						'data_ven'=>$dataVen,
						'data'=> $data,
						'data_pend'=> $data,
						'usuario'=> $usuario,
						'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
						'status' => $status,
						'filial' =>$usuario_filial
					]);		

				}elseif ($status == '2') {
						$cadastrado = $nota->create([
							'chave_acesso' => $_POST['txtChave'],
							'numero_nota'=> $_POST['txtNumero'],
							'fornecedor'=> $fornecedores->id,
							'data_ven'=>$dataVen,
							'data'=> $data,
							'data_env'=> $data,
							'usuario'=> $usuario,
							'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
							'status' => $status,
							'filial' =>$usuario_filial
						]);		

				}elseif ($status == '3') {
					$cadastrado = $nota->create([
						'chave_acesso' => $_POST['txtChave'],
						'numero_nota'=> $_POST['txtNumero'],
						'fornecedor'=> $fornecedores->id,
						'data_ven'=>$dataVen,
						'data'=> $data,
						'data_fina'=> $data,
						'usuario'=> $usuario,
						'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
						'status' => $status,
						'filial' =>$usuario_filial
					]);		

				}elseif ($status == '4') {
					$cadastrado = $nota->create([
						'chave_acesso' => $_POST['txtChave'],
						'numero_nota'=> $_POST['txtNumero'],
						'fornecedor'=> $fornecedores->id,
						'data_ven'=>$dataVen,
						'data'=> $data,
						'data_horth'=> $data,
						'usuario'=> $usuario,
						'observacao'=>filter_input(INPUT_POST, 'txtObservacao'),
						'status' => $status,
						'status_ant' => '4',
						'filial' =>filter_input(INPUT_POST, 'txtFilialCpd')
					]);		

				}
				
		
		}



	$retorno = $cadastrado;
		

	echo $retorno;



 ?>
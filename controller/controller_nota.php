<?php require'../config/config.php'; 
	
		date_default_timezone_set('America/cuiaba');
		$data = date("Y-m-d");

		session_start();
    	$usuario= $_SESSION['usuario'];

    	$cnpj = $_POST['txtCnpj'];

    	$numeroN = $_POST['txtNumero'];

    	$cadastrado = '';

    	$nota = new acme\models\NotasModel;
    	$nota_cpd = new acme\models\NotasCpdModel;

		$fornecedor = new acme\models\FornecedorModel;
		$fornecedores = $fornecedor->findBy('cnpj',"'$cnpj'");

		if($fornecedores == true){
			$id_forn2 = $fornecedores->id;

			
	    	$query = "SELECT * FROM notas WHERE numero_nota = '$numeroN' AND fornecedor = $id_forn2";
	    	$query_cpd = "SELECT * FROM notas_cpd WHERE numero_nota = '$numeroN' AND fornecedor = $id_forn2";
			$notas = $nota->read($query);


			$notas_cpd = $nota_cpd->read($query_cpd);

			if($notas_cpd == true){
				foreach ($notas_cpd as $nota_cpd ) {
					$usuario_nota = $nota_cpd->usuario;
					$id_nota = $nota_cpd->id;
					$status_antigo = $nota_cpd->status;
				}

				$notaU = new acme\models\NotasCpdModel;
				$atualizar = $notaU->update($id_nota,[
					'usuario_ant'=> $usuario_nota,
					'usuario'=> $usuario,
					'status' => '5',
					'status_ant' => $status_antigo,
					'data_finan' => $data,

				]);

				
			}
			

			if($notas == true){
				
				foreach ($notas as $nota ) {
					$usuario_nota = $nota->usuario;
					$id_nota = $nota->id;
				}
				if($usuario_nota == $usuario){
					echo 'cadastrado';
				}else{
					$notaU = new acme\models\NotasModel;
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
								

				$notac = new acme\models\NotasModel;

				$cadastrado = $notac->create([
					'chave_acesso' => filter_input(INPUT_POST, 'txtChave'),
					'numero_nota'=> $_POST['txtNumero'],
					'fornecedor'=> $id_forn2,
					'data'=> $data,
					'usuario'=> $usuario,

				]);

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

			$nota = new acme\models\NotasModel;
			$cadastrado = $nota->create([
				'chave_acesso' => $_POST['txtChave'],
				'numero_nota'=> $_POST['txtNumero'],
				'fornecedor'=> $fornecedores->id,
				'data'=> $data,
				'usuario'=> $usuario,
			]);			
		
		}



	$retorno = $cadastrado;
		

	echo $retorno;



 ?>
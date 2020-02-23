<?php require'../config/config.php';

	$action = filter_input(INPUT_POST, 'txtContasAction');


	if ($action == 'cadastrar') {
		cadastrar();
	}elseif ($action == 'editar') {
		editar();
	}

	

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

     // Converte Formato brasileiro para o Americano
    function moeda($get_valor) {
      $source = array('.', ',');
      $replace = array('', '.');
      $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
      return $valor; //retorna o valor formatado para gravar no banco
    }

	


   function cadastrar(){
   	date_default_timezone_set('America/cuiaba');
	$data = date('Y-m-d');

	session_start();
    $usuario= $_SESSION['usuario'];

 	// echo filter_input(INPUT_POST, "txtContasNf");
	// echo filter_input(INPUT_POST, "txtContasEmpresa");
	// echo filter_input(INPUT_POST, "txtContasLoja");
	// echo filter_input(INPUT_POST, "txtContasValor");
	// echo filter_input(INPUT_POST, "txtContasDataVen");
	// echo filter_input(INPUT_POST, "txtContasStatus");

	$conta = new acme\models\ContasModel;
	$contas = $conta->create([
		'nf' => filter_input(INPUT_POST, "txtContasNf"),
		'empresa' => filter_input(INPUT_POST, "txtContasEmpresa"),
		'loja' => filter_input(INPUT_POST, "txtContasLoja"),
		'valor' => moeda(filter_input(INPUT_POST, "txtContasValor")),
		'dataVen' => swap_date(filter_input(INPUT_POST, "txtContasDataVen")),
		'status' => filter_input(INPUT_POST, "txtContasStatus"),
		'data' => $data,
		'usuario' => $usuario
	]);

	echo $contas;

   }

   function editar(){
   	$info = '';
   	$conta = new acme\models\ContasModel;
	$contas = $conta->findBy('id',filter_input(INPUT_POST, 'idConta'));

	function verificaImg($contas){

		if($contas == true){
			$fotoAntiga = $contas->comprovante;
			if ($fotoAntiga == '') {
				return false;
			}else{

				return true;

				// $fotoAntiga;
				// // Excluir a imagem antiga
	   			// unlink("../public/assets/img/img_contas/$fotoAntiga");
	   			
	   			

			}
		}

		
	}
	
   

   	$foto = $_FILES['txtContaEditComp'];
   	// var_dump($foto);

			if (!empty($foto["name"])) {
				//largura máxima em pixels
				$largura = 5000;

				//Altura máxima em pixels
				$altura = 4000;

				// Tamanho máximo em pixels
				$tamanho = 30000000;

				$error =  array();

				// Verifique se o arquivo é uma imagem
				if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
					$error[1] = "Isso não é uma imagem.";
				}
				//Pega as dimensões da imagem
				$dimensoes = getimagesize($foto["tmp_name"]);

				//Veriica se a largura da imagem é maior que a largura permitida
				if ($dimensoes[0] >$largura) {
					$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
				}

				//Verifica se a altura da imagem é maior que a altura permitida
				if ($dimensoes[1] > $tamanho) {
					$error[3] = "A altura da imagem não deve ultrapassar ".$altura." pixels"; 
				}

				//Verifica se o tamanho da imagem é maior que o tamanho permitido
				if ($foto["size"] > $tamanho) {
					$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
				}

				//Se não houver nenhum erro
				if (count($error) == 0) {
					//Pega a extensão da imagem
					preg_match('/\.(gif|bmp|png|jpg|jpeg|){1}$/i', $foto["name"],$ext);

					//Gera um nome único para a imagem
					$nome_imagem = md5(uniqid(time())).".".$ext[1];

					//Caminho onde ficará a imagem
					$caminho_imagem = "../public/assets/img/img_contas/".$nome_imagem;

					//Faz o uploads da imgem para seu respctivo caminho
					move_uploaded_file($foto["tmp_name"], $caminho_imagem);		
				

					//criando a variável que vai armazenar a instrução SQL para inserção dos dados
					// $insere = "INSERT INTO funcionarios (nome, cargo,departamento, salario, idade,foto) VALUES ('$nome', '$cargo',$departamento,
					// '$salario', '$idade','$nome_imagem')";
					$verifica = verificaImg($contas);

					if ($verifica) {
						$fotoAntiga = $contas->comprovante;
						// // Excluir a imagem antiga
	   					unlink("../public/assets/img/img_contas/$fotoAntiga");
					}

					$conta = new acme\models\ContasModel;
					$contas = $conta->update(filter_input(INPUT_POST, 'idConta'),[
						'comprovante'=> $nome_imagem,
						'status'=>'Pago',
						'numcomprovante' => filter_input(INPUT_POST, 'txtEditContasComprovante'),
						'fpagamento' => filter_input(INPUT_POST, 'txtEditContasFPag'),
						'banco' => filter_input(INPUT_POST, 'txtEditContasBanco'),
					]);

					$info = $contas;
					header("location:../view/contas.php?info=$info");

					
				}

					//Se houver mensagens de erro, exibe-as
					if (count($error) != 0) {
						foreach ($error as  $erro) {
							echo "<p align='center' class='erro'>".$erro."</p>";
						}
					}
			}else{
				echo 'continuar imagem';
				$conta = new acme\models\ContasModel;
					$contas = $conta->update(filter_input(INPUT_POST, 'idConta'),[
						'status'=>'Pago',
						'numcomprovante' => filter_input(INPUT_POST, 'txtEditContasComprovante'),
						'fpagamento' => filter_input(INPUT_POST, 'txtEditContasFPag'),
						'banco' => filter_input(INPUT_POST, 'txtEditContasBanco'),
					]);

					$info = $contas;
					header("location:../view/contas.php?info=$info");
			}
   }
	
	


	

?>
<?php require'../config/config.php'; ?>
<?php 
	include("function.php");

	session_start();
	$usuario_S = '';



	if ($_SESSION['setor'] == 'FINANCEIROS') {
		$usuario_S = $_SESSION['usuario'];
	}else{
		$usuario_S = $_POST['columns']['5']['search']['value'];
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
    
	$data = array();
	$query='';

	$query2='';
	$query3='';
	$output= array();

	$query .= "SELECT * FROM notas nf ";
	$query .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";

	$query3 .= "SELECT * FROM notas nf ";
	
	if(isset($_POST["search"]["value"])){

		$query2 .= "SELECT * FROM notas nf ";
		$query2 .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";

		$data3 = $_POST['data'];

		
		$query .= 'WHERE chave_acesso LIKE "%'.$_POST['chave'].'%" ';
		$query .= 'and numero_nota LIKE "%'.$_POST['numero'].'%" ';
		$query .= 'and cnpj LIKE "%'.$_POST['cnpj'].'%" ';
		$query .= 'and nome LIKE "%'.$_POST['nome'].'%" ';
		$query .= 'and usuario LIKE "%'.$usuario_S.'%" ';

		
		$query2 .= 'WHERE chave_acesso LIKE "%'.$_POST['chave'].'%" ';
		$query2 .= 'and numero_nota LIKE "%'.$_POST['numero'].'%" ';
		$query2 .= 'and cnpj LIKE "%'.$_POST['cnpj'].'%" ';
		$query2 .= 'and nome LIKE "%'.$_POST['nome'].'%" ';
		$query2 .= 'and usuario LIKE "%'.$usuario_S.'%" ';

		$data4 = swap_date($data3);

		if($data4 != "Invalido"){

			$data4 = swap_date($data3);
			$query .= 'and data LIKE "%'.$data4.'%" ';
			$query2.= 'and data LIKE "%'.$data4.'%" ';
		}
	
	}

	if(isset($_POST["order"])){

		if($_POST['order']['0']['column'] == 0 ){
			$order = 'chave_acesso';
			$query .= 'ORDER BY '.$order.' ';
		}else{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		}

	}else{
		$query .= 'ORDER BY data desc ';

	}

	if($_POST["length"] != -1){
		$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];

	}
										
	$fornecedor = new acme\models\FornecedorModel;

	$nota = new acme\models\NotasModel;
    $notas = $nota->read($query);

  	$num_linhas = $nota->numeros_linhas($query2);
  	$num_linhas2 = $nota->numeros_linhas($query3);
    foreach($notas as $nota){
    	
    	$fornecedores = $fornecedor->findBy('id',$nota->fornecedor);
                  
        $sub_array=array();
                   
	    $sub_array[]=$nota->chave_acesso;
		$sub_array[]=$nota->numero_nota;
		$sub_array[]=$nota->cnpj;
		$sub_array[]="<div id= 'ocultar_soli'>".$nota->nome;

		// converter a data para o brasil
		$data2 = swap_date($nota->data);
		$sub_array[]=$data2;

		$sub_array[]=$nota->usuario;

		$sub_array[]= '<a href="#"  data-toggle="modal" data-target="#aditNota" data-chave="'.$nota->chave_acesso.'" data-numero="'.$nota->numero_nota.'" data-cnpj="'.$fornecedores->cnpj.'" data-nomef="'.$fornecedores->nome.'" data-data="'.$data2.'" data-usuario="'.$nota->usuario.'" data-toggle="tooltip" data-toggle=tooltip" data-placement="top" title="Editar" class="btn btn-info"><i class="fa fa-pencil" ></i>';

        $data[]=$sub_array;

	}

	$output=array(
		"draw"				=>intval($_POST["draw"]),
		"recordsTotal"		=>$num_linhas,
		"recordsFiltered"	=>$num_linhas2,	
		"data"				=>$data
		);


	echo json_encode($output);
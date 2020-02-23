<?php 
	include("database.php");
	include("function.php");
	$query='';

	$query2='';

	$output= array();
	$query .= "SELECT * FROM notas ";

	$query2 .= "SELECT * FROM notas ";

	if(isset($_POST["search"]["value"])){
		$query .= 'WHERE chave_acesso LIKE "%'.$_POST["search"]["value"].'%" ';
		$query .= 'OR numero_nota LIKE "%'.$_POST["search"]["value"].'%" ';
		$query .= 'OR usuario LIKE "%'.$_POST["search"]["value"].'%" ';

		$query2 .= 'WHERE chave_acesso LIKE "%'.$_POST["search"]["value"].'%" ';
		$query2 .= 'OR numero_nota LIKE "%'.$_POST["search"]["value"].'%" ';
		$query2 .= 'OR usuario LIKE "%'.$_POST["search"]["value"].'%" ';
	}

	if(isset($_POST["order"])){
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

		//$query2 .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		
		// $nome = $_POST['order']['0']['column'];
	}else{
		$query .= 'ORDER BY chave_acesso ';

		$query2 .= 'ORDER BY chave_acesso ';
	}

	if($_POST["length"] != -1){
		$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];

		//$query2 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}

	$statement = $connection->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();
	
	$filtered_rows = $statement->rowCount();	

	/////////////////////////////////////

 	// $stm = $connection->prepare($query2);   
 	// $stm->execute();   
 	// $valor = $stm->fetch(PDO::FETCH_OBJ);   
   
	 // $total_all_records  = ceil($valor->total_registros); 

	 	$Statement = $connection->prepare($query2);
		$Statement->execute();
		$total_all_records =  $Statement->rowCount();  

   ///////////////////////////////////////////
	$data = array();

	foreach ($result as $row) {
		$sub_array=array();
		$sub_array[] = $row["chave_acesso"];
		$sub_array[] = $row["numero_nota"];
		$sub_array[] = $row["id"];
		$sub_array[] = $row["id"];
		$sub_array[] = $total_all_records;

		$data[]=$sub_array;

	}

	$output=array(
		"draw"				=>intval($_POST["draw"]),
		"recordsTotal"		=>$filtered_rows,
		"recordsFiltered"	=>$total_all_records,	
		"data"				=>$data
		);

	echo json_encode($output);

?>

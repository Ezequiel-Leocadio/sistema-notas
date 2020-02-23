<?php 
	function get_total_all_records($q){
		include("database.php");
			$Statement = $connection->prepare($q);
			$Statement->execute();
			return $Statement->rowCount();
	}

 ?>
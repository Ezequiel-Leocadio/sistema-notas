<?php
namespace Asw\Database;

use acme\interfaces\Imodel;
use Asw\Database\Connection;
use Asw\Database\AttributesCreate;
use Asw\Database\AttributesUpdate;
use PDOException;

class AswModel implements Imodel{


	private $database;

	public function __construct(){
		$database = new Connection;
		$this->database = $database->connection();
	}


	public function create($attributes){
		$pdo1 = $this->database->prepare("set names utf8");
		$pdo2 = $this->database->prepare('SET character_set_connection=utf8');
		$pdo3 = $this->database->prepare('SET character_set_client=utf8');
		$pdo4 = $this->database->prepare('SET character_set_results=utf8');



		$attributesCadastrar = new AttributesCreate;

		$fields = $attributesCadastrar->createFields($attributes);
		$values = $attributesCadastrar->createValues($attributes);

		$query = "insert into $this->table($fields) values($values)";

		$pdo = $this->database->prepare($query);

		$bindParameters = $attributesCadastrar->bindCreateParameters($attributes);


		try{
			$pdo1->execute();
			$pdo2->execute();
			$pdo3->execute();
			$pdo4->execute();


			$pdo->execute($bindParameters);

			//return $this->database->lastInsertId();
			return $pdo->rowCount();

		}catch(PDOException $e){
			dump($e->getMessage());
		}


	}

	public function read($query){

		//$query = "select * from $this->table limit $s,$l";

		$pdo = $this->database->prepare($query);

		$pdo1 = $this->database->prepare("set names utf8");
		$pdo2 = $this->database->prepare('SET character_set_connection=utf8');
		$pdo3 = $this->database->prepare('SET character_set_client=utf8');
		$pdo4 = $this->database->prepare('SET character_set_results=utf8');
		try{

			$pdo1->execute();
			$pdo2->execute();
			$pdo3->execute();
			$pdo4->execute();

			$pdo->execute();

			return $pdo->fetchALL();

		}catch(PDOException $e){
			dump($e->getMessage());
		}

	}

	public function numeros_linhas($query){

		//$query = "select * from $this->table limit $s,$l";

		$pdo = $this->database->prepare($query);
		try{

			$pdo->execute();
			$pdo->fetchALL();
			return $pdo->rowCount();
			

		}catch(PDOException $e){
			dump($e->getMessage());
		}

	}

	public function update($id,$attributes){
		$pdo1 = $this->database->prepare("set names utf8");
		$pdo2 = $this->database->prepare('SET character_set_connection=utf8');
		$pdo3 = $this->database->prepare('SET character_set_client=utf8');
		$pdo4 = $this->database->prepare('SET character_set_results=utf8');

		$attributesUpdate = new AttributesUpdate;
		$fields = $attributesUpdate->updateFields($attributes);
		$query = "update $this->table set $fields where id 	= :id";

		$pdo = $this->database->prepare($query);

		$bindUpdatesParameters = $attributesUpdate->bindUpdateParameters($attributes);

		$bindUpdatesParameters['id'] = 	$id;

		try{
			$pdo1->execute();
			$pdo2->execute();
			$pdo3->execute();
			$pdo4->execute();

			$pdo->execute($bindUpdatesParameters);
			return $pdo->rowCount();

		}catch(PDOException $e){
			//dump($e->getMessage());
		}


	}
	public function delete($name, $value){

		$query = "delete from $this->table where $name = :$name";
		$pdo = $this->database->prepare($query);

		try{

			$pdo->bindParam(":$name",$value);

			$pdo->execute();

			return $pdo->rowCount();

		}catch(PDOException $e){
			dump($e->getMessage());
		}



	}
	public function findBy($name, $value){


		$query = "select * from $this->table where $name = $value";
		$pdo = $this->database->prepare($query);
		$pdo1 = $this->database->prepare("set names utf8");
		$pdo2 = $this->database->prepare('SET character_set_connection=utf8');
		$pdo3 = $this->database->prepare('SET character_set_client=utf8');
		$pdo4 = $this->database->prepare('SET character_set_results=utf8');

		try{
			$pdo1->execute();
			$pdo2->execute();
			$pdo3->execute();
			$pdo4->execute();

			$pdo->execute();

			return $pdo->fetch();

		}catch(PDOException $e){
			dump($e->getMessage());
		}


	}

}
<?php  
namespace acme\interfaces;

interface Imodel{
	public function create($attrbutes);
	public function read($query);
	function numeros_linhas($query);
	public function update($id,$attributes); 
	public function delete($name, $value);
	public function findBy($name, $value);

}
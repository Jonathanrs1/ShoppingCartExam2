<?php
require_once "/../database/ConDB.class.php";
class ShoppingService 
{
    public static function listItens() 
    {
 
		$crud = new CRUD();
		$lista=$crud->select(' * ',' prova2 ',' ',array('')); 

		//grava resultado no vetor
		foreach ($lista as $reg) {
			$vetor[] = array_map('utf8_encode', $reg);
		}



		//Passando vetor em forma de json
		echo json_encode($vetor);
    }
    
    
    public static function add($newItem)
    {
    	$val_description = $_POST[$newItem][0];
    	$val_quantity = $_POST[$newItem][1];
    	$val_price = $_POST[$newItem][2];
    	$crud = new CRUD();
    	$crud->insert(' itens ', ' description=?, qty=?, price=? ', array($val_description,$val_quantity,$val_price));
        
        return $crud;
    }
    
    
    public static function delete($id)
    {
        $id=$_POST[$id];

		$crud=new CRUD();
		$crud->delete('prova2',' WHERE id=? ', array($id));
    }
}

?>
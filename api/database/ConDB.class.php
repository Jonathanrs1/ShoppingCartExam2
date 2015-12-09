<?php

function __autoload($class) {require_once"{$class}.class.php";} //pega todas as classes php

abstract class ConDB{

	private $cnx;  // variavel com dados de conexao com o banco
	private function setConn()
	{
		return
		is_null($this->cnx)?
		        $this->cnx=new PDO("mysql:host=localhost;dbname=prova2","root","root"):
		        $this->cnx;
		
		       
	}			

	public function getConn(){
		return $this->setConn();
	}
}

?>
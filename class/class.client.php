<?php
//class.client.php

class Client
{
	private $errors;
	private $client;
	private $db;
	private $query;
	private $err_client = '';
	
	
	const NAME_SELECT_CLIENT = "client";
	
	function __construct()
	{
		$this->errors=Array();
		$this->con = new dbManager;
		$this->con->getConnect();
		
		
	}
	
	public function addClient($firstname, $surname, $email, $number)
	{	
		$firstname = Functions::correctValue($firstname);
		$surname = Functions::correctValue($surname);
		$email = Functions::correctValue($email);
		$number = Functions::correctValue($number);
		
		$query="INSERT INTO `clients` (`id`, `firstname`, `surname`, `email`, `mobile`) VALUES ('', '$firstname', '$surname', '$email', '$number')";
		$result = $this->con->selectWhere($query);
		
		
		if($result->rowCount()>0) 
		{
			
			return $this->con->last_id;
		}
			
		else  
		{		
			return false;
		}
	}
	
	
	
	public function getErrClient()
	{
		return $this->err_client;
	}
	
	public function removeClient($id)
	{}
	
	public function changeClient($id,$client)
	{}
	
	public function getClient($id)
	{
		
	}
	
	function __destruct()
	{
		$this->con->closeConnection();
	}	
	
	
	
}

?>
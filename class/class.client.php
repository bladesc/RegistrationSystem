<?php
//class.client.php

class Client
{
	private $errors;
	private $client;
	private $db;
	private $query;
	
	const NAME_SELECT_CLIENT = "client";
	
	function __construct()
	{
		$this->errors=Array();
		$this->con = new dbManager;
		$this->con->getConnect();
	}
	
	public function addClient($client)
	{
		
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
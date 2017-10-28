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
		$this->db = new DbManager;
		$this->db->dbConnect();
	}
	
	public function addClient()
	{}
	
	public function removeClient()
	{}
	
	public function changeClient($id,$client)
	{}
	
	public function getClient($id)
	{
		
	}
	
	function __destruct()
	{
		$this->db->dbClose();
	}	
	
	
	
}

?>
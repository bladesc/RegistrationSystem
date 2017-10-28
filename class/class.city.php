<?php
//class.city.php

class City
{
	private $errors;
	private $db;
	private $query;
	private $city;
	
	const NAME_SELECT_CITY = "city";
	
	function __construct()
	{
		$this->errors=Array();
		$this->db = new DbManager;
		$this->db->dbConnect();
	}
	
	public function addCity($city)
	{
		DbManager::filterValue($city);
		$this->query="INSERT INTO cities (cityname) VALUES ($city)"; 
		$this->db->dbSetQuery($this->query);
		if(!$this->db->dbExecute())
			{   	
			$this->db->showErrors();
			die();
			}
	}
	
	public function removeCity($id)
	{}
	
	public function changeCity($id,$city)
	{}
	
	public function getCity($id)
	{}
	
	public function generateList()
	{
		Functions::generateList(NAME_SELECT, );
	}
	
	function __destruct()
	{
		$this->db->dbClose();
	}	
	
}

?>
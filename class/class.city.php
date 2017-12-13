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
		$this->con = new dbManager;
		$this->con->getConnect();
	}
	
	public function getCitiesListSelect()
	{
		
		$query="SELECT * FROM `cities`";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_city[$y]['id_klienta'] = $row['citycame'];
			}
			return $this->info_client;
		}
			
		else  
		{		
			$this->err_client .= "Brak danych w bazie";
		}
	}
	
	public function addCity($city)
	{
		
	}
	
	public function removeCity($id)
	{}
	
	public function changeCity($id,$city)
	{}
	
	public function getCity($id)
	{}
	
	public function generateList()
	{
		
	}
	
	function __destruct()
	{
		$this->con->closeConnection();
	}	
	
}

?>
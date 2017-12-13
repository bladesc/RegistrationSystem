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
				$tab_city[$y]['city'] = $row['citycame'];
				$tab_city[$y]['id'] = $row['id'];
				$y+=1;
			}
			$name = "city";
			$html = "<label for='{$name}'>Wybierz miasto</label>
					<select name='{$name}' id='inp_city'>";
					
					foreach($tab_city as $key=>$value) 
					{
						$html .= "<option value='{$value['id']}'>{$value['city']}</option>";
					}
			$html .="</select>";

			return $html;
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
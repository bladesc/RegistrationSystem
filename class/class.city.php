<?php
//class.city.php

class City
{
	private $errors;
	private $db;
	private $query;
	private $city;
	private $err_client;
	
	
	const NAME_SELECT_CITY = "city";
	
	function __construct()
	{
		$this->errors=Array();
		$this->con = new dbManager;
		$this->con->getConnect();
	}
	
	public function getCitiesListSelect($select)
	{
		
		$query="SELECT * FROM `cities`";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_city[$y]['city'] = $row['cityname'];
				$tab_city[$y]['id'] = $row['id'];
				$y+=1;
			}
			if($select)
			{
				$name = "city";
				$html = "<label for='{$name}'>Wybierz miasto</label>
					<select name='{$name}' id='inp_city'>";
					
					foreach($tab_city as $key=>$value) 
					{
						$html .= "<option value='{$value['id']}'>{$value['city']}</option>";
					}
				$html .="</select>";
			}
			else
			{
				$html = "<div class='list_data'>";
				
					
					foreach($tab_city as $key=>$value) 
					{
						$html .= "<div class='data10'>{$value['id']}</div><div class='data60'>{$value['city']}</div><div class='data30'><form action='administrator.php' method='POST'><input type='hidden' value='{$value['id']}' name=idcity'></input><input type='submit' value='Usuń' name='deletecity'></input></form></div>";
					}
				$html .="<div class='box_footer'></div></div>";
			}
			return $html;
			
		}
			
		else  
		{		
			$this->err_client .= "Brak danych w bazie";
		}
	}
	
	public function addCity($city)
	{
		
		if(empty($city))
		{  
			$_SESSION['communicate']['status'] = true;
			$_SESSION['communicate']['text'] = "<div class='commbad'>Nie wpisałeś żadnej wartości w polu 'miasto'</div>";
		}
		else
		{	
			$city = Functions::correctValue($city);
			$query="SELECT `cityname` FROM `cities` WHERE `cityname`='$city'";
			$result = $this->con->selectWhere($query);
			
			if($result->rowCount()>0) 
			{
				$_SESSION['communicate']['status'] = true;
				$_SESSION['communicate']['text'] = "<div class='commbad'>Takie miasto już istnieje'</div>";
			}
			
			else  
			{		
				
				$query="INSERT INTO `cities` (`id`, `cityname`) VALUES ('', '$city')";
				if($this->con->selectWhere($query))
				{
					$_SESSION['communicate']['status'] = true;
					$_SESSION['communicate']['text'] = "<div class='commgood'>Miasto zostało dodane pomyślnie</div>";
				}
				else
				{
					$_SESSION['communicate']['status'] = true;
					$_SESSION['communicate']['text'] = "<div class='commbad'>Nie udało się dodać miasta</div>";
				}
			}
		}
	}
	
	public function removeCity($id)
	{}
	
	public function changeCity($id,$city)
	{}
	
	public function getCity($id)
	{}
	
	
	
	function __destruct()
	{
		$this->con->closeConnection();
	}	
	
}

?>
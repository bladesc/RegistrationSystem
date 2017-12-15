<?php
//class.clinic.php

class Clinic
{
	private $errors;
	private $clinic;
	private $name;
	private $adress;
	private $db;
	private $query;
	private $err_client;
	
	const NAME_SELECT_CLINIC = "clinic";
	
	function __construct()
	{
		$this->errors=Array();
		$this->con = new dbManager;
		$this->con->getConnect();
	}
	
	public function getClinicsList()
	{
		
		$query="SELECT * FROM `clinics`";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_city[$y]['name'] = $row['name'];
				$tab_city[$y]['id'] = $row['id'];
				$y+=1;
			}
			
			$html = "<div class='list_data'>";	
			foreach($tab_city as $key=>$value) 
			{
				$html .= "<div class='data10'>{$value['id']}</div><div class='data60'>{$value['name']}</div><div class='data30'><form action='administrator.php' methd='POST'><input type='hidden' value='{$value['id']}' name='idcity'></input><input type='submit' value='Usuń' name='deletecity'></input></form></div>";
			}
			$html .="<div class='box_footer'></div>";
			
			return $html;
			
		}
			
		else  
		{		
			$this->err_client .= "Brak danych w bazie";
		}
	}
	
	public function getClinicsListSelect($city)
	{
		$checkcity=Functions::correctValue($city);
		$query="SELECT * FROM `clinics` WHERE `idcities` = $checkcity";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_clinic[$y]['city'] = $row['name'];
				$tab_clinic[$y]['id'] = $row['id'];
				$y+=1;
			}
			$name = "clinic";
			$html = "<label for='{$name}'>Wybierz klinikę</label>
					<select name='{$name}' id='inp_city'>";
					
					foreach($tab_clinic as $key=>$value) 
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
	
	public function getClinicsListSelectAll()
	{
		
		$query="SELECT * FROM `clinics`";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_clinic[$y]['city'] = $row['name'];
				$tab_clinic[$y]['id'] = $row['id'];
				$y+=1;
			}
			$name = "clinic";
			$html = "<label for='{$name}'>Wybierz klinikę</label>
					<select name='{$name}' id='inp_city'>";
					
					foreach($tab_clinic as $key=>$value) 
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
	
	public function addNameClinic($name)
	{
		$this->name=Functions::filter($name);
	}
	
	public function addAdressClinic($adress)
	{
		$this->adress=Functions::filter($adress);
	}
	
	
	public function addClinic($clinic,$idcity, $adress )
	{
		
		if(empty($clinic))
		{  
			$_SESSION['communicate']['status'] = true;
			$_SESSION['communicate']['text'] = "<div class='commbad'>Nie wpisałeś żadnej wartości w polu 'klinika'</div>";
		}
		else
		{	
			$adress	= Functions::correctValue($adres);
			$idcity = Functions::correctValue($idcity);
			$clinic = Functions::correctValue($clinic);
			$query="SELECT `id` FROM `clinics` WHERE `name`='$clinic'";
			$result = $this->con->selectWhere($query);
			
			if($result->rowCount()>0) 
			{
				$_SESSION['communicate']['status'] = true;
				$_SESSION['communicate']['text'] = "<div class='commbad'>Taka klinika już istnieje</div>";
			}
			
			else  
			{		
				
				$query="INSERT INTO `clinics` (`id`, `idcities`,`name`, `adress`) VALUES ('', '$idcity', '$clinic', '$adress')";
				if($this->con->selectWhere($query))
				{
					$_SESSION['communicate']['status'] = true;
					$_SESSION['communicate']['text'] = "<div class='commgood'>Klinika została dodane pomyślnie</div>";
				}
				else
				{
					$_SESSION['communicate']['status'] = true;
					$_SESSION['communicate']['text'] = "<div class='commbad'>Nie udało się dodać kliniki/div>";
				}
			}
		}
	}
	
	public function removeClinic($id)
	{}
	
	public function changeClinic($id,$clinic)
	{}
	
	public function getClinic($id)
	{
		
	}
	
	function __destruct()
	{
		$this->con->closeConnection();
	}	
	

	
	
}

?>
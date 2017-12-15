<?php
//class.doctor.php

class Doctor
{
	private $errors;
	private $db;
	private $query;
	private $doctor;
	private $err_client;
	
	const NAME_SELECT_DOCTOR = "doctor";
	
	function __construct()
	{
		$this->errors=Array();
		$this->con = new dbManager;
		$this->con->getConnect();
	}	
	
	public function getDoctorsList()
	{
		
		$query="SELECT * FROM `doctors`";
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
			$html .="<div class='box_footer'></div></div>";
			
			return $html;
			
		}
			
		else  
		{		
			$this->err_client .= "Brak danych w bazie";
		}
	}
	
	public function getDoctorsListSelect($doctor)
	{
		$checkdoctor=Functions::correctValue($doctor);
		$query="SELECT * FROM `doctors` WHERE `idclinics` = $checkdoctor";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_doctors[$y]['name'] = $row['name'];
				$tab_doctors[$y]['id'] = $row['id'];
				$y+=1;
			}
			$name = "doctor";
			$html = "<label for='{$name}'>Wybierz lekarza</label>
					<select name='{$name}' id='inp_city'>";
					
					foreach($tab_doctors as $key=>$value) 
					{
						$html .= "<option value='{$value['id']}'>{$value['name']}</option>";
					}
			$html .="</select>";

			return $html;
		}
			
		else  
		{		
			$this->err_client .= "Brak danych w bazie";
		}
	}
	
	public function getDoctorsListSelectAll()
	{
		
		$query="SELECT * FROM `doctors`";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_doctors[$y]['name'] = $row['name'];
				$tab_doctors[$y]['id'] = $row['id'];
				$y+=1;
			}
			$name = "doctor";
			$html = "<label for='{$name}'>Wybierz lekarza</label>
					<select name='{$name}' id='inp_city'>";
					
					foreach($tab_doctors as $key=>$value) 
					{
						$html .= "<option value='{$value['id']}'>{$value['name']}</option>";
					}
			$html .="</select>";

			return $html;
		}
			
		else  
		{		
			$this->err_client .= "Brak danych w bazie";
		}
	}
	
	public function addDoctor($doctor,$idclinic, $mobile )
	{
		
		if(empty($doctor))
		{  
			$_SESSION['communicate']['status'] = true;
			$_SESSION['communicate']['text'] = "<div class='commbad'>Nie wpisałeś żadnej wartości w polu 'doktor'</div>";
		}
		else
			
		{	
			$mobile = Functions::correctValue($mobile);
			$idclinic = Functions::correctValue($idclinic);
			$doctor = Functions::correctValue($doctor);
			$query="SELECT `id` FROM `doctors` WHERE `name`='$doctor'";
			$result = $this->con->selectWhere($query);
			
			if($result->rowCount()>0) 
			{
				$_SESSION['communicate']['status'] = true;
				$_SESSION['communicate']['text'] = "<div class='commbad'>Taki doktor już istnieje</div>";
			}
			
			else  
			{		
				
				$query="INSERT INTO `doctors` (`id`, `idclinics`,`name`, `mobile`) VALUES ('', '$idclinic', '$doctor', '$mobile')";
				if($this->con->selectWhere($query))
				{
					$_SESSION['communicate']['status'] = true;
					$_SESSION['communicate']['text'] = "<div class='commgood'>Doktor został dodany pomyślnie</div>";
				}
				else
				{
					$_SESSION['communicate']['status'] = true;
					$_SESSION['communicate']['text'] = "<div class='commbad'>Nie udało się dodać kliniki/div>";
				}
			}
		}
	}
	
	public function removeDoctor($id)
	{}
	
	public function changeDoctor($id)
	{}
	
	public function getDoctor($id)
	{
		
	}
	function __destruct()
	{
		$this->con->closeConnection();
	}	
	
	
	
}

?>
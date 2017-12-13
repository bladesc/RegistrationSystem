<?php
//class.doctor.php

class Doctor
{
	private $errors;
	private $db;
	private $query;
	private $doctor;
	
	const NAME_SELECT_DOCTOR = "doctor";
	
	function __construct()
	{
		$this->errors=Array();
		$this->con = new dbManager;
		$this->con->getConnect();
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
			$name = "clinic";
			$html = "<label for='{$name}'>Wybierz miasto</label>
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
	
	public function addDoctor()
	{}
	
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
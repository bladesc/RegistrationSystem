<?php
//class.date.php

class Date
{
	private $errors;
	private $db;
	private $query;
	private $date;
	private $err_client;
	
	const NAME_SELECT_DATES = "dates";
	
	function __construct()
	{
		$this->errors=Array();
		$this->con = new dbManager;
		$this->con->getConnect();
	}
	
	public function getDatesListSelect($data)
	{
		$datefrom = date("Y-m-d H:i:s");
		$dateto = strtotime($datefrom);
		$dateto = strtotime("+7 day", $dateto);
		echo date('Y-m-d H:i:s', $dateto);
		echo $datefrom;
		
		$query="SELECT * FROM `dates` WHERE `chdate` > '$datefrom' AND `chdate` < '$dateto'";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_date[$y]['id'] = $row['id'];
				$tab_date[$y]['data'] = $row['chdate'];
				$tab_date[$y]['iddoctor'] = $row['chdoctors'];
				
				$y+=1;
			}
			
			$html = "<div class='list_data'>";
				
					
			foreach($tab_date as $key=>$value) 
			{
				$html .= "<div class='data10'>{$value['id']}</div><div class='data60'>{$value['data']}</div><div class='data30'><form action='administrator.php' methd='POST'><input type='hidden' value='{$value['id']}' name=idcity'></input><input type='submit' value='Usuń' name='deletecity'></input</form></div>";
			}
			$html .="<div class='box_footer'></div>";
			
			return $html;
			
		}
			
		else  
		{		
			$this->err_client .= "Brak danych w bazie";
		}
		
	}
	
	public function addDates($date)
	{}
	
	public function removeDates($id)
	{}
	
	public function changeDates($id,$date)
	{}
	
	public function getDates($id)
	{}
	
	function __destruct()
	{
		$this->con->closeConnection();
	}	
	
	
}

?>
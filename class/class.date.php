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
	
	public function generateDateForm()
	{
		$now = date("Y-m-d H:i:s");
		$nownumericdate = strtotime($now);
		$html = "";
		for($i=0; $i<7; $i++)
		{	$dateactual = strtotime("+$i day", $nownumericdate);
			$date_year = date("Y", $dateactual);
			$date_month = date("m", $dateactual);
			$date_day = date("d", $dateactual);
			
			$hours = $this->getDatesFromDate($dateactual);

			$html .= "
				<div class='date_window'>
					<div class='box_day'>{$date_day}</div>
					<div class='box_month'>{$date_month}.{$date_year}</div>
					$hours
				</div>
				
				";
		}
		
		echo $html;		
	}
	
	private function getDatesFromDate($date)
	{
		$datefrom = date("Y-m-d 8:0:0", $date);
		$dateto = date("Y-m-d 16:59:59", $date);
		
		$query="SELECT * FROM `dates` WHERE `chdate` > '$datefrom' AND `chdate` < '$dateto'";
		$result = $this->con->selectWhere($query);
			
		
			$y=0;
			$check_array = array(8,9,10,11,12,13,14,15,16);
			
			foreach ($result as $row) 
			{
				$tab_date[$y] = $row['chdate'];
				$dateH = date("H", strtotime($tab_date[$y]));
				//echo $dateH;
				$index_delete = array_search("$dateH",  $check_array); // $klucz = 2;
				unset($check_array[$index_delete]);
				$y+=1;
				
			}	
			$html = "<div class='box_hours'>";
			for($i=8; $i<17; $i++)
			{
				if(in_array($i, $check_array))
				{
					$html .= "<div class='houractive'>{$i}</div>";
				}
				else
				{
					$html .= "<div class='hourinactive'>{$i}</div>";
				}
				
			}
			$html .= "</div>";
			return $html;
			
		
		
	}
	
	public function getDatesList()
	{
		$datefrom = date("Y-m-d H:i:s");
		$dateto = strtotime($datefrom);
		$dateto = strtotime("+7 day", $dateto);
		$dateto = date('Y-m-d H:i:s', $dateto);
		
		
		$query="SELECT * FROM `dates` WHERE `chdate` > '$datefrom' AND `chdate` < '$dateto'";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_date[$y]['id'] = $row['id'];
				$tab_date[$y]['data'] = $row['chdate'];
				$tab_date[$y]['iddoctor'] = $row['iddoctors'];
				
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
	
	public function getDatesListSelect()
	{
		$datefrom = date("Y-m-d H:i:s");
		$dateto = strtotime($datefrom);
		$dateto = strtotime("+7 day", $dateto);
		$dateto = date('Y-m-d H:i:s', $dateto);
		
		
		$query="SELECT * FROM `dates` WHERE `chdate` > '$datefrom' AND `chdate` < '$dateto'";
		$result = $this->con->selectWhere($query);
			
		if($result->rowCount()>0) 
		{
			$y=0;
			foreach ($result as $row) 
			{
				$tab_date[$y]['id'] = $row['id'];
				$tab_date[$y]['data'] = $row['chdate'];
				$tab_date[$y]['iddoctor'] = $row['iddoctors'];
				
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
		{		echo "brak";
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
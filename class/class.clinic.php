<?php
//class.clinic.php

class Clinic
{
	private $errors;
	private $clinic;
	private $name;
	private $clinic;
	private $adress;
	private $db;
	private $query;
	
	const NAME_SELECT_CLINIC = "clinic";
	
	function __construct()
	{
		$this->errors=Array();
		$this->db = new DbManager;
		$this->db->dbConnect();
	}
	
	public function addNameClinic($name)
	{
		$this->name=Functions::filter($name);
	}
	
	public function addAdressClinic($adress)
	{
		$this->adress=Functions::filter($adress);
	}
	
	
	public function addClinic($clinic)
	{
		$this->query="INSERT INTO ".NAME_SELECT_CLINIC." ('id','idcities','name','adress') VALUES ('','',$this->name,$this->adress)";
		$this->db->dbSetQuery($this->query);
		if(!$this->db->dbExecute())
		{   $this->db->showErrors();
			die('bląd dodawania rekorudy "klinika"');
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
		$this->db->dbClose();
	}	
	

	
	
}

?>
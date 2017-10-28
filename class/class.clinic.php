<?php
//class.clinic.php

class Clinic
{
	private $errors;
	private $clinic;
	private $db;
	private $query;
	
	const NAME_SELECT_CLINIC = "clinic";
	
	function __construct()
	{
		$this->errors=Array();
		$this->db = new DbManager;
		$this->db->dbConnect();
	}
	
	public function addClinic()
	{}
	
	public function removeClinic($id)
	{}
	
	public function changeClinic($id)
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
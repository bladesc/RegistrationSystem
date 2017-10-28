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
		$this->db = new DbManager;
		$this->db->dbConnect();
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
		$this->db->dbClose();
	}	
	
	
	
}

?>
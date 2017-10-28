<?php
//class.date.php

class Date
{
	private $errors;
	private $db;
	private $query;
	private $date;
	
	const NAME_SELECT_DATES = "dates";
	
	function __construct()
	{
		$this->errors=Array();
		$this->db = new DbManager;
		$this->db->dbConnect();
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
		$this->db->dbClose();
	}	
	
	
}

?>
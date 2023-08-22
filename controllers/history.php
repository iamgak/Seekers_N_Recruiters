<?php 
Class ControllerHistory{
	public function __construct($db){
		$this->db=$db;
	}
	public function transfer()
	{	$id=$_SESSION['id'];
		$result=[];
		session_start();
		if ( isset($id) and $_SESSION['type']=="recruiter" ){

		$recruiter=new History(this->$db);
		$result=$recruiter->histry($id);
		}return $result;
	}
}
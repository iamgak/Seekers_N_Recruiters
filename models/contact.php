<?php 
Class Contact{
	public function __construct($db){
		$this->db=$db;
	}
	public function send($details){
		try{

				$result=$this->db->query("INSERT INTO message (id,email ,subject, message,ip) VALUES ('$details[id]','$details[email]', '$details[subject]', '$details[message]', '$details[ip]' )");
		
			if($result){
				return True;
			}else{
				throw new Exception("some thing wrong ");}
			}
			catch(Exception $e){
				return False;
			}
	}
	

}
<?php 
class Post{
	public function __construct($db)
	{
		$this->db=$db;
	}
	public function post($register){
		
			try{

				$result=$this->db->query("INSERT INTO post (course,profile,experience, industry, about,Rid) VALUES ('$register[course]','$register[profile]', '$register[experience]', '$register[industry]', '$register[about]','$register[id]' )");
		
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
?>
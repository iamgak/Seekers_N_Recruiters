<?php
Class Login{
	public $db;
	public function __construct($db) {
        $this->db = $db;
    }
	public function verify($email,$passw,$how){
		
		 $email = $this->db->real_escape_string($email);
        $passw = $this->db->real_escape_string($passw);

        $query = "SELECT * FROM ". $how." WHERE email='$email' AND passw='$passw'";
        echo $query;
        
        	$result = $this->db->query($query);

        	if($result && $result->num_rows > 0){
        		$row = $result->fetch_assoc();
				session_start();
				$_SESSION['email']=$row['email'];
				$_SESSION['id']=$row['id'];
				$_SESSION['name']=$row['name'];
				$_SESSION['type']=$how;
				$_SESSION['login']=true;
				return True;}
				else{
					return False;
				}
			
		}
	}

?>
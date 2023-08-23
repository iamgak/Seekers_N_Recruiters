<?php
include(__DIR__ . '/../controllers/conn.php');
class Register{
	public $db;
	public function __construct($db){
		$this->db=$db;
	}
	public function seeker($register){

			try {
				
    $result = $this->db->query("INSERT INTO seeker (name, email, phone, college, course, experience, industry, about, passw) VALUES ('$register[name]', '$register[email]', '$register[phone]', '$register[college]', '$register[course]', '$register[experience]', '$register[industry]', '$register[about]', '$register[passw]')");

    if ($result) {
        return True;
    } else {
        throw new Exception("Error while inserting");
    }
} catch (Exception $e) {
    return False;
}


	}

	public function recruiter($recruiter){
		try{
			$result = $this->db->query("INSERT INTO seeker (name, email, phone, college, course, experience, industry, about) VALUES ('$recruiter[name]', '$recruiter[email]', '$recruiter[phone]', '$recruiter[college]', '$recruiter[course]', '$recruiter[experience]', '$recruiter[industry]', '$recruiter[about]')");
			if($result){
				return True;}
				else {
					throw new Exception("Error while inserting");}
				} catch (Exception $e) {
    return False;
}

	}

}

?>
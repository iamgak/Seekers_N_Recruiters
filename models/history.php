<?php
class History{
	 
public function __construct($db){
        $this->db=$db;
    }
	 
	public function histry($Rid){
		 $result=$this->db->query("select * from post where Rid='$Rid'");
		 if($result){
		 	while($row=$result->fetch_assoc()){
            $rows[]=$row;}
		 }return $rows;

	}


    //this function triggers after clicking button on Recruiter/History.php
    public function ApplicantHistory($Pid){
    $result=$this->db->query("select Sids from applicant where Pid='$Pid'");
    if($result){
        $row=$result->fetch_assoc();
        $Sids=json_decode($row['Sids'],true);
        if(!empty($Sids)){
            $value = []; // Initialize the $value array
            foreach($Sids as $t){
                $result=$this->db->query("select * from seeker where id='$t'");
                if($result && $result->num_rows>0){
                    while($row1=$result->fetch_assoc()){
                        $value[]=$row1;
                    }
                }
            }
            return $value;}
    }
    return []; // Return an empty array if no results are found or there's an issue
}

}

?>
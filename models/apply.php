<?php include(__DIR__.'/../controllers/conn.php');

class Applicant{
    public function __construct($db){
        $this->db=$db;
    }
    public function apply($Sid, $Pid) {
    try {
        $result = $this->db->query("SELECT Pid FROM applicant WHERE Pid='$Pid'");
        
        if ($result) {
            $updt = $this->db->query("UPDATE applicant SET Sids = json_merge_preserve(Sids, '$Sid') WHERE Pid='$Pid'");
            
            if ($updt) {
                return True;
            } else {
                throw new Exception("Failed to update application.");
            }
        } else {
            $result = $this->db->query("INSERT INTO applicant (id, Pid) VALUES ('$Sid', '$Pid')");
            
            if ($result) {
                return True;
            } else {
                throw new Exception("Failed to insert application.");
            }
        }
    } catch (Exception $e) {
        return False;
    }
}
    //it will give all jobs-post 
    public function all(){
        $result=$this->db->query("select * from post");
        if($result){
            
             while ($row = $result->fetch_assoc()) {
                $rows[] = $row; }

        }
        return $rows;
    }


    //this function triggers Seeker/History.php
    //this will show all the posts applied by Seeker
    public function ApplicantHistory($Sid){
        $value=[];
        $result=$this->db->query("select Pid,Sids from applicant");
        $post=[];
        if($result){
            while($row=$result->fetch_assoc()){
                $Sids=json_decode($row['Sids'],true);
                if(in_array($Sid,$Sids)){
                    $post[]=$row['Pid'];
                }
            }
        }
        if(!empty($post)){
            foreach($post as $t){
                $result=$this->db->query("select * from post where id='$t'");
                
                if($result && $result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                    $value[]=$row;}
                }
            }

    }return $value;


}   
}
?>
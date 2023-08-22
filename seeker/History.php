<?php include(__DIR__.'/../controllers/conn.php');
include(__DIR__.'/../models/apply.php');
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login if user is not logged in
    header("Location: ../Login.php");
    exit();
}
$seek=new Applicant($db);
$result=$seek->ApplicantHistory($_SESSION['id']);
 $output=empty($result)?
        "Your Job History is History. Do something!!!":"";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applicant-history</title>
    <link rel="stylesheet" type="text/css" href="../public/new.css">
    <style type="text/css">
         .output{
            color:darkgreen;
            text-align: center;
            font-size: 3rem;
            font-family: monospace;
        }


    </style>
    <title>Seeker-jobs | HnR</title>
</head>

<body>
    
       <?php include(__DIR__."/../public/navbar.php")?>
       <h3>Applicant-History:-</h3>
   
   <?php echo isset($wrong)? $wrong:"";?>
   <div class="job-list">
        <?php if(!empty($result)){foreach ($result as $row1) { ?>
            <div class="job-post">
            	<div class="a-button">
                <div>Profile:<?php echo $row1['profile'] ?></div>
                <div>Experience:<?php echo $row1['experience'] ?></div>
                <div>Course:<?php echo $row1['course'] ?></div>
                <div>Industry:<?php echo $row1['industry'] ?></div>
                <div><?php echo $row1['about'] ?></div>
            </div>
        
		</div><?php } }?>
    </div>
	

</body>
</html>
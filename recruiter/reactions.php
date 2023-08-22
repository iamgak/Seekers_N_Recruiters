<?php
include(__DIR__.'/../controllers/conn.php');
include(__DIR__.'/../models/history.php');


if (!isset($_GET['Pid']) and !isset($_SESSION['user_id'])) {
    // Redirect to login if user is not logged in
    header("Location: ../Login.php");
    exit();
}

//var_dump($_GET['jobId']);
if (isset($_GET['Pid'])) {
    $job_id = (int)$_GET['Pid'];

    $recruiter = new History($db);
    $result=$recruiter->ApplicantHistory($job_id); 
    if(empty($result)){
        header("refresh:2;History.php");
        exit();
    }
   else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applicants</title>
    <link rel="stylesheet" type="text/css" href="../public/new.css">
    <style type="text/css">
   
    </style>
    <title>Seeker-jobs | HnR</title>
</head>

<body>
    
       <?php include(__DIR__."/../public/RNav.php")?>
       <h3>Recruiter-Applicants:-</h3>
   
   <div class="job-list">
        <?php foreach ($result as $row1) { ?>
            <div class="job-post">
                <div class="a-button">
                <div>Profile:<?php echo $row1['name'] ?></div>
                <div>Experience:<?php echo $row1['experience'] ?></div>
                <div>Course:<?php echo $row1['course'] ?></div>
                <div>Industry:<?php echo $row1['industry'] ?></div>
                <div><?php echo $row1['about'] ?></div>
            </div>
            </div> <?php } ?>
       </div><?php }}?>
    


</body>
</html>

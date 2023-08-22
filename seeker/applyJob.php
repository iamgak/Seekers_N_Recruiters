<?php
include(__DIR__.'/../controllers/conn.php');
include(__DIR__.'/../models/apply.php');


if (!isset($_SESSION['id'])) {
    // Redirect to login if user is not logged in
    header("Location: ../Login.php");
    exit();
}
//var_dump($_GET['jobId']);
if (isset($_GET['jobId'])) {
    $job_id = (int)$_GET['jobId'];

    $user_id = 5; // Use the correct session key
    
    $recruiter = new Applicant($db);
    $result=$recruiter->apply($user_id, $job_id); // Assuming you have an apply method
    if($result){
    	
    	?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            display:flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .message {
            font-size: 24px;
            text-align: center;

        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body><div class="container">
    <div class="message">
        <p>Your form has been successfully submitted.
        Badhai ho!!</p>
    </div>
    <?php header("refresh:5;Jobs.php");
        exit();}
    }
?>
   </div>
</body>
</html>


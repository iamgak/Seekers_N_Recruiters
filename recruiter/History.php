<?php include(__DIR__.'/../controllers/conn.php');
session_start();
if(isset($_SESSION['id']) and $_SESSION['type']=="recruiter"){
include(__DIR__.'/../models/history.php');
$i=3;
$recruiter=new History($db);
$result=$recruiter->histry($i);
}
else{
    header("Location: ../Login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../public/new.css">
    <title>Seeker-jobs | HnR</title>
</head>

<body>
   
       <?php include(__DIR__."/../public/RNav.php")?>
       <h3>History:-</h3>
   <div class="job-list">
        <?php foreach ($result as $row1) { ?>
            <div class="job-post">
             <a href="reactions.php?Pid=<?php echo $row1['id']; ?>" class="a-button">
                <div>Profile:<?php echo $row1['profile'] ?></div>
                <div>ID:<?php echo $row1['id'] ?></div>
                <div>Course:<?php echo $row1['course'] ?></div>
                <div>About:<?php echo $row1['about']?></div>
                <div>Industry:<?php echo $row1['industry'] ?></div>
                <div>Experiece:<?php echo $row1['experience'] ?></div>
                <div>Date:<?php echo $row1['date_time'] ?></div>
                </a>
            </div><?php } ?>
        </div>
        

</body>
</html>
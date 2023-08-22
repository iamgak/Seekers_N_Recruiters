<?php include(__DIR__.'/../controllers/conn.php');
include(__DIR__.'/../models/apply.php');
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login if user is not logged in
    header("Location: ../Login.php");
    exit();
}
$applicant=new Applicant($db);
$result=$applicant->all();
//var_dump($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/new.css">
    <style type="text/css">



    </style>
    <title>Seeker-jobs | HnR</title>
</head>

<body>
    
       <?php include(__DIR__."/../public/navbar.php")?>
   

        <div class="input-box">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input class="input-field" type="text" name="experience" placeholder="Search your Jobs">
                <div class="form-submit">
                <input class="a-button" type="submit" name="Submit" value="Search"></div>
            </form>
        </div>
        <h3>Job-List :- </h3>
        <div class="job-list">
        <?php foreach ($result as $row1) { ?>
            <div class="job-post">
                <a class="a-button" href="applyJob.php?jobId=1">
                <div >Profile:<?php echo $row1['profile'] ?></div>
                <div>Experience:<?php echo $row1['experience'] ?></div>
                <div>Course:<?php echo $row1['course'] ?></div>
                <div>Industry:<?php echo $row1['industry'] ?></div>
                <div>Posted:<?php echo $row1['date_time'] ?></div>
                </a>
            </div><?php }?>
       </div>
    
 
</body>
</html>
</html>
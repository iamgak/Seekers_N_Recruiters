<?php

include(__DIR__.'/public/validate.php');
include(__DIR__.'/controllers/conn.php');
include(__DIR__.'/models/login.php');

if(!isset($_SESSION['login'])){

if (isset($_POST['Login']) and $_SERVER['REQUEST_METHOD'] === 'POST') {     	
    $test = new ErrorCheck();
    $who=$_POST['type'];
     $mail=$test->email;
     $pass=$test->passw;
     if($test->validation()){
        $login=new Login($db);
        
       
        $valid=$login->verify($mail,$pass,$who);
        if($valid){
            
        if($who=='seeker'){
            header("Location:seeker/Jobs.php");
                exit();
        }else{
            header("Location:recruiter/History.php");
            exit();}
        }
        else{
            $wrong="Incorrect Email/Password";
        }

}else{
	$errors=$test->getErrors();
   
        }
    }
}
else{
    header("Location:Home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Submission</title>
    <link rel="stylesheet" type="text/css" href="public/login.css">
      <style>
        
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="center-heading" href="Home.php">Seeker+Recruiter  </a>
    <div class="end inner-nav">
    <h1> Register as : </h1>
    <a  href="seeker/Register.php">Seeker </a>    
    <a  href="recruiter/Register.php">Recruiter</a>
    </div>
    </nav>
	<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h1>Login Page</h1>
	<div class="error"><p><?php echo isset($wrong)?$wrong:"";?></p>	</div>
	<div class="form-group">
    <label for="type">Type: *</label>
    <select name="type" value="seeker">
        <option value="">Select Login</option>
        <option value="recruiter">recruiter</option>
        <option value="seeker" selected="selected">seeker</option>
        </select>
	   </div>	
    <div class="form-group">
	    <input type="email" name="email" placeholder="Enter email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
	    <div class="error"><?php if (isset($errors["email"])) { echo $errors["email"]; } ?></div>

        <div class="form-group">
        <input type="Password" name="passw" placeholder="Enter passw" value="<?php echo isset($_POST['passw']) ? $_POST['passw'] : ''; ?>">
        <div class="error"><?php if (isset($errors["passw"])) { echo $errors["passw"]; } ?></div>
    </div>
    <div class="form-submit">
    <input type="submit" name="Login" value="Login"></div>
    

</form>
</div>
</body>
</html>
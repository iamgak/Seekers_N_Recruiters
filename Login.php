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
      <style>
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            justify-items: center;

        }
        h1{
            text-align: center;
            font-family: monospace ;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #dad7cd;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 400px;
            color:#344e41;
            margin: 30px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            padding-top:20px ;
            display: flex;
            flex-direction: column;
            justify-content: center;

        }
        
        label {
            font-weight: bold;
        }
        
        select, input, textarea {
            width: 350px;
            margin: 5px;
            padding: 10px;
            border: 1px solid #344e41;
            border-radius: 5px;
            color:#344e41;
            outline: none;
            font-weight: bold;
            background-color: white;
            font-size: 1.5rem;
        }
        
        .form-submit{
            display: flex;
            width:;
            flex-direction: row;
            justify-content: center;
            justify-items: center;
            padding-top: 10px;

        }
        .error {
            color: red;
        }
        
        input[type=submit] {

            background-color: #344e41;
            color: white;
            border: none;
            max-width:100% ;
            font-weight: bold;
            border-radius: 5px;
            padding: 15px 15px;
            cursor: pointer;
        }
        label{
            color: #344e41;
        }
        
        fieldset{
            border:none;
        }
        .heading{
            font-family: monospace;
            font-size: 2rem;
            color: #344e41;
        }
    </style>
</head>
<body>
    <div class="heading">Seekeers+Recruiters</div>
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
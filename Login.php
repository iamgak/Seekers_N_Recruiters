<?php

include(__DIR__.'/public/validate.php');
include(__DIR__.'/controllers/conn.php');
include(__DIR__.'/models/login.php');

if (isset($_POST['Login']) and $_SERVER['REQUEST_METHOD'] === 'POST') {     	
    $test = new ErrorCheck();
    $who=$_POST['type'];
    if($test->validation()){
        $login=new Login($db);
        $mail=$test->email;
        $pass=$test->passw;
        $login->verify($mail,$pass,$who);

}else{
	$errors=$test->getErrors();
   
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Submission</title>
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 50%;
            color:#007bff;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            font-weight: bold;
        }
        
        select, input, textarea {
            width: 90%;
            margin: 5px;
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            color:#3c7d7b;
            outline: none;
            font-weight: bold;
            background-color: white;
        }
        
        
        .error {
            color: red;
        }
        
        input[type=submit] {
            background-color: #007bff;
            color: white;
            border: none;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        label{
            color: #007bff;
        }
        legend{
            color:#6C3428;
        }
        fieldset{
            border:2px solid #007bff;
        }
    </style>
</head>
<body>
	<div class="container">
	<h1>Recruiter N Seeker</h1>
	
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<fieldset>
	<legend>Login-form</legend>
	<div class="form-group">
    <label for="type">Type: *</label>
    <select name="type" value="seeker">
        <option value="">Select Login</option>
        <option value="recruiter">recruiter</option>
        <option value="seeker" selected="selected">seeker</option>
        </select>
	   </div>	
    <div class="form-group">

	    <label for ="email">Email: *</label>
	    <input type="email" name="email" placeholder="Enter email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
	    <div class="error"><?php if (isset($errors["email"])) { echo $errors["email"]; } ?></div>

        <div class="form-group">
        <label for ="passw">Password: *</label> 
        <input type="Password" name="passw" placeholder="Enter passw" value="<?php echo isset($_POST['passw']) ? $_POST['passw'] : ''; ?>">
        <div class="error"><?php if (isset($errors["passw"])) { echo $errors["passw"]; } ?></div>
    </div>
    <input type="submit" name="Login" value="Login">
    
</fieldset>
</form>
</div>
</body>
</html>
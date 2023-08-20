<?php 
include('validate.php');
include('models/conn.php');
include('controllers/registration.php');

if (isset($_POST['register']) and $_SERVER['REQUEST_METHOD'] === 'POST') {         
    $test = new ErrorCheck();
    
    if($test->validation()){
        $register=new Register($db);
        $registerD=$test->getDataArray();
        $value=$register->seeker($registerD);
        
        if($value){
            header("Location:Home.php");
            exit();
        }
        else{
            $wrong= "Oops!! something went wrong";
        }

}else{
    $errors=$test->getErrors();}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        
        .container {
            width: 40%;
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
        
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        
        .error {
            color: red;
        }
        
        input[type=submit] {
            background-color: #007bff;
            color: white;
            border: none;
            width: 100%;
            font-size: 5vh;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include 'navbar.html'?>;
	<div class="container">
	<h1>Register</h1>
	<h2> Fill the following Details Carefully.</h2>
	<h2>* Marks should be filled carefully.</h2>
	<div class="error"><?php echo isset($wrong)?$wrong:"";?></div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<fieldset>
	<legend>User Details</legend>
    	<div class="form-group">
		<label for ="name">Name: *</label> 
		<input type="text" name="name" placeholder="Enter name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
		<div class="error"><?php if (isset($errors["name"])) { echo $errors["name"]; } ?></div>
	</div>
	<div class="form-group">
	    <label for ="phone">Phone: *</label>
	    <input type="text" name="phone" placeholder="Enter phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
	    <div class="error"><?php if (isset($errors["phone"])) { echo $errors["phone"]; } ?></div>
	</div>
    	
    <div class="form-group">
	    <label for ="email">Email: *</label>
	    <input type="email" name="email" placeholder="Enter email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
	    <div class="error"><?php if (isset($errors["email"])) { echo $errors["email"]; } ?></div>
    </div>
    	<div class="form-group">
    		<label for ="college">
            College: * </label>
    		<input type="text" name="college" value='<?php echo isset($_POST['college'])?$_POST['college']: "";?>'>
		<div class="error"><?php echo isset($errors['college']) ? $errors['college']:"";  ?></div>
	</div><div class="form-group">
    		<label for ="course">Course: * </label>
    		<input type="text" name="course" value='<?php echo isset($_POST['course'])?$_POST['course']: "";?>'>
		<div class="error"><?php echo isset($errors['course']) ? $errors['course']:"";  ?></div>
	</div>
	<div class="form-group">
    		<label for ="experience">Experience:  </label>
    		<input type="text" name="experience" value='<?php echo isset($_POST['experience'])?$_POST['experience']: "";?>'>
	</div>
	<div class="form-group">
    		<label for ="industry">industry: * </label>
    		<input type="text" name="industry" value='<?php echo isset($_POST['industry'])?$_POST['industry']: "";?>'>
		<div class="error"><?php echo isset($errors['industry']) ? $errors['industry']:"";  ?></div>
	</div>
    <div class="form-group">
            <label for ="passw">passw: * </label>
            <input type="Password" name="passw" value='<?php echo isset($_POST['passw'])?$_POST['passw']: "";?>'>
        <div class="error"><?php echo isset($errors['passw']) ? $errors['passw']:"";  ?></div>
    </div>
   
    	<div class="form-group">
    		<label for ="about">about: *</label>
    		<textarea name="about" placeholder="Enter about "><?php if (isset($_POST['about'])){ echo $_POST['about'] ;} ?></textarea>
		<div class="error"><?php  if (isset($errors['about'])){ echo $errors['about'] ;}  ?></div>
	</div>
    <input type="submit" name="register" value="register"></div>
</fieldset>
</form>
</div>
</body>
</html>
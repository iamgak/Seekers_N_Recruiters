<?php 
include(__DIR__.'/../public/validate.php');
include(__DIR__.'/../controllers/conn.php');
include(__DIR__.'/../models/registration.php');

if (isset($_POST['register']) and $_SERVER['REQUEST_METHOD'] === 'POST') {         
    $test = new ErrorCheck();
    if($test->validation()){
        $register=new Register($db);
        $data=$test->getDataArray();
        $valid=$register->seeker($data);
        if($valid){
            header("Location:seeker/Jobs.php");
                exit();
        }else{
            $wrong="Incorrect Email/Password";
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
    <link rel="stylesheet" type="text/css" href="../public/login.css">
      <style>
        
    </style>
</head>
<body>
   <nav class="navbar">
    <a class="center-heading" href="Home.php">Seeker+Recruiter  </a>
    <div class="inner-nav">
    <h1> login here : </h1>
    <a href="../Login.php">Login </a>    
    </div>
    </nav>
	<div class="container">

	
	
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="error"><?php echo isset($wrong)?$wrong:"";?></div>
	<h1>Seeker Registration-Page</h1>
    <div class="error"><p><?php echo isset($wrong)?$wrong:"";?></p> </div>
    
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
    <div class="form-submit">
    <input type="submit" name="register" value="register"></div></div>

</form>
</div>
</body>
</html>
<?php 
include(__DIR__.'/../public/validate.php');
include(__DIR__.'/../controllers/conn.php');
include(__DIR__.'/../models/post.php');
session_start();
if (!isset($_SESSION['id']) or $_SESSION['type']!="recruiter") {
    // Redirect to login if user is not logged in
    header("Location: ../Login.php");
    exit();
}
if (isset($_POST['jobs']) and $_SERVER['REQUEST_METHOD'] === 'POST') {         
    $test = new ErrorCheck();
    
    if($test->validation()){
        $job=new Post($db);
        $details=$test->getDataArray();
        $result=$job->post($details);
        if($result){
        	header("Location:submitPost.php");
        	exit();
        }else{
        	$wrong="Oops!! Something happen Try again later";
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
      
    
      <style type="text/css">
        :root {
    --primary-color: #588157; /* Green */
    --secondary-color: #3a5a40; /* Dark Green */
    --background-color: #dad7cd; /* Light Gray */
    --text-color: #344e41; /* Dark Gray */
}

      	body {
            font-family: Arial, sans-serif;
            background-color: #dad7cd;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            height: 100%;
            width: 100%;
        }
        
        .container {
            width: 50%;
            min-width: 400px;
            color:#344e41;
            margin: 30px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 100%;
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
            width: 90%;
            margin: 5px;
            padding: 10px;
            border: 1px solid #344e41;
            border-radius: 5px;
            color:#344e41;
            outline: none;
            font-weight: bold;
            background-color: white;
            font-size: 1.2rem;
        }
        
        .form-submit{
            display: flex;
            justify-content: center;
            padding-top: 10px;

        }
        .error {
            color: red;
        }
        
        input[type=submit] {

            background-color: #344e41;
            color: white;
            border: none;
            max-width:30% ;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        label{
            color: #344e41;
        }
        
        fieldset{
            border:none;
        }
        
/* Center Content Styling */
.center-content {
    display: flex;
    flex-direction: row;
    align-items: space-around;
    justify-content: flex-start;
    min-width: 100%;
}

.center-heading {
    text-align: center;
    max-height: 20px;
    color: white;
}

/* Navbar Styling */
.navbar {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: var(--primary-color);
}

.navbar a, .navbar .inner-nav a {
    text-decoration: none;
    color: white;
    display: block;
    margin: 0;
    padding: 5px;
    font-weight: bold;
}

.navbar a:hover, .navbar .inner-nav a:hover {
    background-color: white;
    color: var(--primary-color);
}

/* Inner Nav Styling */
.navbar .inner-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-right: 20px;
}

/* Input Box Styling */
.input-box {
    padding-top: 5px;
    min-width: 90vw;
    display: flex;
    justify-content: center;
    align-items: center;
}

    </style>   
</head>
<body>
	
        
       <?php include(__DIR__."/../public/RNav.php")?>
   
	<div class="container">
        <h1>Post your Job Here!!!</h1>
	<div class="error"><?php echo isset($wrong)?$wrong:"";?></div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	<legend></legend><p>* Marks should be filled carefully.</p>
    <div class="form-group">
        <label for ="id">Recruiter ID: *</label> 
        <input type="text" name="id" placeholder="Enter recruiterID" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>">
        <div class="error"><?php if (isset($errors["id"])) { echo $errors["id"]; } ?></div>
    </div>
    <div class="form-group">
		<label for ="profile">Profile: *</label> 
		<input type="text" name="profile" placeholder="Enter profile" value="<?php echo isset($_POST['profile']) ? $_POST['profile'] : ''; ?>">
		<div class="error"><?php if (isset($errors["profile"])) { echo $errors["profile"]; } ?></div>
	</div>
	<div class="form-group">
    		<label for ="course">Course: * </label>
    		<input type="text" name="course" placeholder="Enter Course Needed for this Job"  value='<?php echo isset($_POST['course'])?$_POST['course']: "";?>'>
		<div class="error"><?php echo isset($errors['course']) ? $errors['course']:"";  ?></div>
	</div>
	<div class="form-group">
    		<label for ="experience">Experience:  </label>
    		<input type="text" name="experience" placeholder="Required Experience"  value='<?php echo isset($_POST['experience'])?$_POST['experience']: "";?>'>
    		<div class="error"><?php echo isset($errors['experience']) ? $errors['experience']:"";  ?></div>

	</div>
	<div class="form-group">
    		<label for ="industry">industry: * </label>
    		<input type="text" name="industry" placeholder="Enter industry" value='<?php echo isset($_POST['industry'])?$_POST['industry']: "";?>'>
		<div class="error"><?php echo isset($errors['industry']) ? $errors['industry']:"";  ?></div>
	</div>
    	<div class="form-group">
    		<label for ="about">about: *</label>
    		<textarea name="about" placeholder="Summarise Requirement or other thing regarding job profile" placeholder="Enter about "><?php if (isset($_POST['about'])){ echo $_POST['about'] ;} ?></textarea>
		<div class="error"><?php  if (isset($errors['about'])){ echo $errors['about'] ;}  ?></div>
	</div>
    <div class="form-submit">
    <input type="submit" name="jobs" value="POST"></div>

</form>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>

</head>
<style type="text/css">
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
        
        .center-heading {
    text-align: center;
    max-height: 20px ;
    color: white;
}

.navbar {

    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 10px;
    background-color: #79155B;
    
    

}
.navbar a{

    text-decoration: none;
    width:30%;
    color: white;
    display: block;
    margin:0;
    padding:5px;
    font-weight: bold;
    left:10%;

}
.navbar a:hover{
    background-color: white;
    color: #F6635C;
}

h3{
    color: #344e41;
    text-align: center;
    font-family: monospace;
    font-size: 3em;
}
.navbar .inner-nav{
    width:40%;
    display: flex;
    text-align: center;


}
</style>
<body>
<?php/*

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "gak.gak@hotmail.com"; // Replace with the recipient's email address
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: " . "gak.gak.gak@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.". error_get_last();
    }
}*/
?>
<?php include(__DIR__."/public/navbar.php")?>
   <?php echo isset($wrong)? $wrong:"";?>
    <div class="container">
    <h1>We are eager to listen !!!</h1>
    <p> * marks are compulsory </p>
    
    <div class="error"><?php echo isset($wrong)?$wrong:"";?></div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <label for ="Email">Email: *</label>
            <textarea name="Email" placeholder="Enter Email "><?php if (isset($_POST['Email'])){ echo $_POST['Email'] ;} ?></textarea>
        <div class="error"><?php  if (isset($errors['Email'])){ echo $errors['Email'] ;}  ?></div>
    </div>
</form> <div class="form-group">
            <label for ="subject">subject: *</label>
            <textarea name="subject" placeholder="Enter subject "><?php if (isset($_POST['subject'])){ echo $_POST['subject'] ;} ?></textarea>
        <div class="error"><?php  if (isset($errors['subject'])){ echo $errors['subject'] ;}  ?></div>
    </div>

</form>
    <div class="form-group">
            <label for ="message">message: *</label>
            <textarea name="message" placeholder="Enter message "><?php if (isset($_POST['message'])){ echo $_POST['message'] ;} ?></textarea>
        <div class="error"><?php  if (isset($errors['message'])){ echo $errors['message'] ;}  ?></div>
    </div>
    <div class="form-submit">
    <input type="submit" name="register" value="submit"></div></div>

</form>

</body>
</html>

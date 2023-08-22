<?php
header("refresh:2;post.php");
exit();
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
        <p>Your Post has been successfully submitted Successfully.
        Badhai ho!!</p>
    </div>
    
</div>
</body>
</html>


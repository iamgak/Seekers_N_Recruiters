<?php 
session_start();
if(!isset($_SESSION['id']) or $_SESSION['type']!="seeker"){
    header("Location: ../Login.php");
    exit();
}?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Portal</title>
    <style type="text/css">
    /* Color Scheme */
:root {
    --primary-color: #588157; /* Green */
    --secondary-color: #3a5a40; /* Dark Green */
    --background-color: #dad7cd; /* Light Gray */
    --text-color: #344e41; /* Dark Gray */
}

/* General Styling */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: var(--background-color);
    color: var(--text-color);
}
        .content{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width:100%;
            height:100% ;
        }

.navbar {

    min-width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 10px;
    background-color: #3a5a40;
    
    

}
.navbar a{

    text-decoration: none;
    color: white;
    display: block;
    margin:0;
    padding:5px;
    font-weight: bold;


}

.navbar .end {
    display: flex;
    width:40%;
    justify-content: flex-end;
    
    justify-content: space-between;
    align-items: center;
}

.end a{
    width:15%;
}


        
        .container {
            width: 50%;
            color:#344e41;
            margin: 30px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            
            height: 70%;
            display: flex;
            flex-direction: row;
            justify-items: center;
            justify-content: center;

        }
        
        .form-group, form{
            height: 100%;
            width:100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            justify-items: center;
        }
       
        select, input, textarea {
            width: 100%;
            margin: 5px;
            padding: 10px;
            border: 1px solid #344e41;
            border-radius: 5px;
            color:#344e41;
            outline: none;
            font-weight: bold;
            background-color: white;
        }
        
       
        .error {
            color: red;
        }
        
        input[type=submit] {

            background-color: #344e41;
            color: white;
            border: none;
            max-width:20% ;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        
    </style>
</head>
<body>
    <div class="content">
           <?php include(__DIR__."/../public/navbar.php")?>

    </nav>
    <div class="container">
        <div class="form-group">
            <form method="post" action="Jobs/Register.php">
                <input type="text" name="search">
                <input type="submit" name="submit" value="search">
            </form>
        </div>
    </div>
</div>
</body>
</html>
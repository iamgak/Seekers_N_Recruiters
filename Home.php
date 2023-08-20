<?php  include('Login.php');
if(!isset($_SESSION['name'])){
	header("Location: Login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home | Portal</title>
</head>
<body>

</body>
</html>
<?php 
$name=isset($_SESSION['name'])?$_SESSION['name']:" ";
 $value= empty($name) ? "../Register": "signout"?>

<nav class="navbar">
	<a class="center-heading" href="Home.php">Seeker+Recruiter | </a>
	<div class="end inner-nav">
	<a href="History.php">History</a>
	<a  href="Jobs.php">Jobs</a>	
	<a  href="contact.php">Contact-Us</a>
	<a  href='<?php echo $value.".php"	?>'><?php echo $value ?></a>
	<a  href=""><?php echo $name?></a>
	</div>
</nav>
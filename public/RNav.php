<?php 
$name=isset($_SESSION['name'])?$_SESSION['name']:" ";
 $value= empty($name) ? "../Register": "signout"?>


	
<nav class="navbar">

	<a href="Home.php">Recruiters+Seeker  | </a>
	<div class="end inner-nav">
	<a href="History.php">History</a>
	<a href="post.php">Post !!!</a>
	<a href="contact.php">Contact-Us</a>
	<a  href='<?php echo $value.".php"	?>'><?php echo $value ?></a>
	<a  href=""><?php echo $name?></a>
</div>
</nav>

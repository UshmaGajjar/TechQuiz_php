<?php
	session_start();
	
	if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		
		session_destroy();
		header("location:index.php");
		exit;	
	}	
?>